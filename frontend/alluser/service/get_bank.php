<?php
    include("../../../class_conn.php");
    $cls_conn = new class_conn();

    if(isset($_POST['act']) && $_POST['act'] == "select"){
        $sql = "select * from tb_company";
        $result = $cls_conn->select_base($sql);
        $re = $result->fetch_all(MYSQLI_ASSOC);
        foreach ($re as $key => $a):
            $data[] = [
                'company_id' => $a['company_id'],
                'company_name' => $a['company_name'],
            ];
        endforeach;
    
        echo json_encode($data);
        exit();
    }

    if(isset($_POST['act']) && $_POST['act'] == "bank"){
        $company_id = $_POST['id'];
        $sql = "select * from tb_bank where company_id='$company_id'";
        $result = $cls_conn->select_base($sql);
        $re = $result->fetch_all(MYSQLI_ASSOC);
        foreach ($re as $key => $a):
            $data[] = [
                'bank_id' => $a['bank_id'],
                'bank_name' => $a['bank_name'],
                'bank_number' => $a['bank_number'],
            ];
        endforeach;
    
        echo json_encode($data);
        exit();
    }


?>