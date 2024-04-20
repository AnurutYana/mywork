<?php include('header.php');


session_destroy();
session_unset();
echo $cls_conn->goto_page(0,'index.php');


include('footer.php');?>




