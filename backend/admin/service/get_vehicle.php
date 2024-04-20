<?php
include("../../../class_conn.php");
$cls_conn = new class_conn();

if(isset($_POST['act']) && isset($_POST['act']) == "get_vehicle"){
    $id = $_POST['id'];
    $sql = "SELECT * FROM `tb_carservice` where company_id = '$id'";
    $result = $cls_conn->select_base($sql);
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}


?>