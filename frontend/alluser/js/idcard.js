$(document).ready(function(){
    $('#user_idcard').on('keyup',function(){
      if($.trim($(this).val()) != '' && $(this).val().length == 13){
        id = $(this).val().replace(/-/g,"");
        var result = Script_checkID(id);
        if(result === false){
          $('span.error').removeClass('true').text('เลขบัตรผิด');
        }else{
          $('span.error').addClass('true').text('เลขบัตรถูกต้อง');
        }
      }else{
        $('span.error').removeClass('true').text('หมายเลขบัตรประชาชน');
      
      }
    })
  });
  
  function Script_checkID(id){
      if(id.substring(0,1)== 0) return false;
      if(id.length != 13) return false;
      for(i=0, sum=0; i < 12; i++)
          sum += parseFloat(id.charAt(i))*(13-i);
      if((11-sum%11)%10!=parseFloat(id.charAt(12))) return false;
      return true;
  }