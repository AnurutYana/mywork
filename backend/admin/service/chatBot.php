<?php
include("../../../class_conn.php");
$cls_conn = new class_conn();


$LINEData = file_get_contents('php://input');
$jsonData = json_decode($LINEData, true);

$replyToken = $jsonData["events"][0]["replyToken"];
$userID = $jsonData["events"][0]["source"]["userId"];
$text = $jsonData["events"][0]["message"]["text"];
$timestamp = $jsonData["events"][0]["timestamp"];

function sendMessage($replyJson, $sendInfo)
{
  $ch = curl_init($sendInfo["URL"]);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLINFO_HEADER_OUT, true);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
      'Content-Type: application/json',
      'Authorization: Bearer ' . $sendInfo["AccessToken"]
    )
  );
  curl_setopt($ch, CURLOPT_POSTFIELDS, $replyJson);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}

if (isset($text)) {

  $getUser = $cls_conn->select_base("SELECT * FROM `tb_payment` WHERE `payment_tel` ='$text'");
  $getuserNum = $getUser->num_rows;
  $replyText["type"] = "text";
  if ($getuserNum == "0") {
    $message = '{
          "type" : "text",
          "type" : "ไม่มีข้อมูลที่ต้องการ",
      }';
    $replyText["text"] = "ไม่พบหมายเลขที่ลงทะเบียนการจอง";
    $replymsg = json_decode($message, true);
  } else {
    while ($row = $getUser->fetch_assoc()) {

      $Name = $row['payment_fname'];
      $Surname = $row['payment_lname'];
      $CustomerID = $row['payment_type'];
      $payment_no = $row['payment_no'];
      $company_id = $row["company_id"];

      $sql_o =  $cls_conn->select_base("SELECT s.station_origin_name,s.station_terminal_name,s.station_ortime,s.station_destime,o.origin_name,t.terminal_name 
      FROM tb_station s 
      join tb_station_origin o on o.origin_id = s.station_origin_name 
      join tb_station_terminal t on t.terminal_id = station_terminal_name 
      WHERE s.company_id= '$company_id'");
      while ($row_o = $sql_o->fetch_assoc()) {
        $origin = $row_o['origin_name'];
        $terminal = $row_o['terminal_name'];
        $station_ortime = $row_o['station_ortime'];
        $station_destime = $row_o['station_destime'];
      }

      $Status = $row['payment_status'];
      if ($Status == 0) {

        echo $Status = "กำลังดำเนินการตรวจสอบ";

      } else if ($Status == 1) {
        echo $Status = "ยืนยันการจองเรียบร้อยแล้วครับ";
       
        
      }
        
    }
    $replyText["text"] = "สวัสดีคุณ $Name $Surname ประเภทการจอง(#$CustomerID) 
    หมายเลขการจอง $payment_no
    สถานะการจอง: $Status 
    สถานีต้นทาง: 
      $origin เวลา: $station_ortime
    สถานีปลายทาง: 
      $terminal เวลา: $station_destime
    
    ";
  }
}




$lineData['URL'] = "https://api.line.me/v2/bot/message/reply";
$lineData['AccessToken'] = "8dXUOowKF4i00IMKDLLAsDmDsGuV5P0W3ug5GTvYvBa3IkJZKHBYAERK8/JFBM9uog/hJcBP/KOhZMrRGCbXFTIozEdztLIzd3O7qHLQw5HLb/tpkqvjQNsRPseZSyINYD0mbRD8avbgxkF+RPKL1gdB04t89/1O/w1cDnyilFU=";

$replyJson["replyToken"] = $replyToken;
$replyJson["messages"][0] = $replyText;

$encodeJson = json_encode($replyJson);

$results = sendMessage($encodeJson, $lineData);
echo $results;
http_response_code(200);
