<?php

$servername = "localhost";
$username = "root";
$password = "0852009988";
$dbname = "db_vantickets2";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$paymentId = $_POST['payment_id'];

$sql = "UPDATE tb_payment SET status = '0' WHERE payment_id = $paymentId";
$sql2 = "INSERT INTO tb_cancel (cancel_date,payment_id) VALUES (now(),'$paymentId')";

if ($conn->query($sql) === TRUE) {
    if ($conn->query($sql2) === TRUE) { 
        echo "อัปเดตข้อมูลสำเร็จ";
    } else {
        echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูลลงใน tb_cancel: " . $conn->error;
    }
} else {
    echo "เกิดข้อผิดพลาดในการอัปเดต: " . $conn->error;
} 
$conn->close();
header("Location:show_cancel.php ")
?>
