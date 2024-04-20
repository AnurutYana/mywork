<?php include('header.php');

session_destroy();
session_unset();
echo $cls_conn->goto_page(0,'../../login.php');


include('footer.php');
?>

