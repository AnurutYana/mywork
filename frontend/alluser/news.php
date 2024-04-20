<?php include('header.php');?>
<style>
* {box-sizing: border-box}
 
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 30%;
  height: 100%;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  height: 100%;
}
</style>
	
<!--content-->
<div class="blog">
<div class="container">



<div class="tab">

	<?php
	   $sql=" select * from tb_news order by news_date desc";
                $result=$cls_con->select_base($sql);
				$i=0;
                while($row=mysqli_fetch_array($result))
                {
	?>
					<button class="tablinks" onclick="openCity(event, 'tab<?=$i;?>')" <?php if($i==0){ echo "id='defaultOpen'"; } ?>><?=$row['news_subject'];?><?=$i;?></button>
					
				<?php $i++; } ?>
  
</div>
<?php 
                $sql2=" select * from tb_news";
                $result2=$cls_con->select_base($sql2);
				$j=0;
                while($row2=mysqli_fetch_array($result2))
                {
?>
<div id="tab<?=$j++;?>" class="tabcontent">
  
  <br/>
  <h3><?=$row2['news_subject'];?></h3>
  <hr/>
  <p><img src="../../upload/<?=$row2['news_pic'];?>" width='80%' /></p>
  <p><?=$row2['news_detail'];?></p>
  <hr/>
  <p>วันที่  <?=$row2['news_date'];?></p>
 
</div>
				<?php }?>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>










 
      </div>
</div>
<?php include('footer.php');?>