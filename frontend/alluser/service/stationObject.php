<?php
include("../../../class_conn.php");
$cls_conn = new class_conn();

if(isset($_POST['act']) && $_POST['act'] == "getTickets"){
    $id = $_POST['id'];
    $sql = "SELECT * FROM `tb_station` WHERE `station_id` ='$id'";
    $row = $cls_conn->select_base($sql);
    $re = $row->fetch_all(MYSQLI_ASSOC);
    echo json_encode($re);
}else if(isset($_POST['act_2']) && $_POST['act_2'] == "getPackage"){
    $id = $_POST['id'];
    $sql = "SELECT * FROM `tb_station` WHERE `station_id` ='$id'";
    $row = $cls_conn->select_base($sql);
    $re = $row->fetch_all(MYSQLI_ASSOC);
    echo json_encode($re);
}else{
    $p_origin = $_GET['p_origin'];
    $p_terminal = $_GET['p_terminal'];
    $time_current=date('H:i:s');

    $sql = " select *,o.origin_name origin,t.terminal_name terminal,r.carservice_vehicle car from tb_station s 
    join tb_station_origin o on o.origin_id = s.station_origin_name 
    join tb_station_terminal t on t.terminal_id = s.station_terminal_name 
    join tb_carservice r on r.carservice_id = s.station_registration 
    where s.station_origin_name = '$p_origin' and s.station_terminal_name = '$p_terminal' ";
    $sql.=" and     s.station_ortime >='$time_current'";
    
    $sql.=" order by s.station_id";

    $r = $cls_conn->select_base($sql); 
    $re = $r->fetch_all(MYSQLI_ASSOC);
    foreach ($re as $key => $a):
            $row[] = [
                'station_id'=> $a['station_id'],
                'origin' => $a['origin'],
                'terminal' => $a['terminal'],
                'station_ortime' => $a['station_ortime'],
                'station_terminal_name' => $a['station_terminal_name'],
                'station_origin_name' => $a['station_origin_name'],
                'station_destime' => $a['station_destime'],
                'station_departuretime' => $a['station_departuretime'],
                'station_price_tickets' => $a['station_price_tickets'],
                'station_price_package' => $a['station_price_package'],
                'car' => $a['car'],
                'tickets_amount' => $a['tickets_amount'],
            ];
        endforeach;
        echo json_encode($row);
    }

    exit();

   

?>