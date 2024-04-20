<?php
include("../../../class_conn.php");
$cls_conn = new class_conn();

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $status = 1;
    $sql = "UPDATE `tb_payment` SET `payment_status`= '$status' WHERE `payment_id` = '$id'";
    if($cls_conn->write_base($sql) == true){
        $resp['status'] = 1;
        $resp['message'] = 'success';
    }else{
        $resp['status'] = 0;
        $resp['message'] = 'error';
    }
    echo json_encode($resp);
}

?>