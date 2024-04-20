let link = "service/get_bank.php";
$(function () {
    let bankObj = $("#payment_bank");
    displayCompany();

    $('#company_id').change(function () {
        let bank = $(this).val();
        console.log(bank);

        bankObj.html('<option value="">เลือกธนาคาร</option>');

        $.ajax({
            url: link,
            method: "POST",
            data:{
                act:"bank",
                id:bank
            },
            success: function (data) {
                row = JSON.parse(data);
                console.log(row);
              $.each(row, function (key, item) {
                bankObj.append(
                    $("<option value=" + item.bank_id + ">" + item.bank_name + "("+ item.bank_number + ")" +"</option>")
                );
              });

            },

        });
    });
});

function displayCompany() {
    let company = $('#company_id');

    $.ajax({
        url: link,
        method: "post",
        data: { 
            act: "select" 
        },
        success: function (data) {
          row = JSON.parse(data);
          console.log(row);
          $.each(row, function (key, item) {
        company.append(
              $("<option value=" + item.company_id + ">" + item.company_name +  "</option>")
            );
          });
        },
      });

}

