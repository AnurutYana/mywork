<?php
include("../../../class_conn.php");
$cls_conn = new class_conn();
session_start();

if(isset($_SESSION['user_idcard'])){
        $origin = $_POST['origin'];
        $terminal = $_POST['terminal'];
        $sql = "select * from tb_station where station_origin_name= '$origin' and station_terminal_name= '$terminal'";
        $result = $cls_conn->select_base($sql);
        if($result->num_rows > 0){
            $re = $result->fetch_all(MYSQLI_ASSOC);
            foreach ($re as $key => $value):
                    $data[] = [
                        'station_origin_name' => $value['station_origin_name'],
                        'station_terminal_name' => $value['station_terminal_name'],
                    ];
            endforeach;
            
            $data['status'] = 1;
            $data['message'] = "sussess";
            echo json_encode($data);
        }else{
            $data['status'] = 0;
            $data['message'] = "not data found";
            echo json_encode($data);
        }
}else{
        $data['status'] = 2;
        $data['message'] = "error";
        echo json_encode($data);
}

?>
