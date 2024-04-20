<?php
include("../../../class_conn.php");
$cls_conn = new class_conn();

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "select * from tb_payment where payment_id='$id'";
    $result = $cls_conn->select_base($sql);
    $re = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($re);
}

?>