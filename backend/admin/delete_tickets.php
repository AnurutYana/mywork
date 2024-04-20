<?php include('header.php'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">ลบข้อมูลการจองตั๋วรถ</h4>
                <!-- /.col-lg-12 -->


                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    $sqlst = " select tickets_no,station_id,amount from tb_tickets";
                    $sqlst .= " where";
                    $sqlst .= " tickets_id='$id'";
                    $result_ticket = $cls_conn->select_base($sqlst);
                    $row_ticket = mysqli_fetch_array($result_ticket);
                    $ticket_no = $row_ticket['tickets_no'];
                    $station_id = $row_ticket['station_id'];
                    $amount = $row_ticket['amount'];


                    $sqlp = " select payment_no from tb_payment";
                    $sqlp .= " where";
                    $sqlp .= " tickets_id='$id'";
                    $result = $cls_conn->select_base($sqlp);
                    $row = mysqli_fetch_array($result);
                    if ($row) {
                        $payment_no = $row['payment_no'];

                        $sqlpdel = " delete from tb_tickets";
                        $sqlpdel .= " where";
                        $sqlpdel .= " tickets_id='$id'";
                    } else {
                        $payment_no = "";
                    }

                    $sqlt = " delete from tb_tickets";
                    $sqlt .= " where";
                    $sqlt .= " tickets_id='$id'";

                    $insert_sql = "INSERT INTO tb_cancel (tickets_no,payment_no) VALUES ($ticket_no,'$payment_no')";
                    
                    //เมื่อยกเลิกตั๋วเเล้วจำนวนจะคืนค่าเดิม
                    $up_sql = "UPDATE tb_station SET tickets_amount = tickets_amount + $amount WHERE station_id = '$station_id'";

                    
                    if ($cls_conn->write_base($insert_sql) == true) { 
                        $cls_conn->write_base($sqlt);

                        //ใช้เมธอดคลาส cls_conn และส่งพารามิเตอร์ up_sql เข้าไป เพื่อให้เขียนข้อมูลลงไปในฐานข้อมูล
                        $cls_conn->write_base($up_sql);
                        if ($row) {
                            $cls_conn->write_base($sqlpdel);
                        }
                        echo $cls_conn->show_message('ลบข้อมูลสำเร็จ');
                        echo $cls_conn->goto_page(1, 'show_cancel.php');
                        // echo $insert_sql;
                    } else {
                        echo $cls_conn->show_message('บันทึกข้อมูลไม่สำเร็จ');
                        echo $sql;
                    }
                }

                ?>

            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
</div>
<?php include('footer.php'); ?>