<?php include('header.php');
$id = $_GET['tickets_id'];
// var_dump($id);
$check_st = "SELECT * FROM tb_tickets t
             WHERE tickets_id = '$id'";
$result_st = $cls_conn->select_base($check_st);
$row_st = $result_st->fetch_assoc();
$station_id = $row_st['station_id'];
$tickets_no = $row_st['tickets_no'];
$station_price_tickets = $row_st['station_price_tickets'];
$carservice_vehicle = $row_st['carservice_vehicle'];
// $tickets_id = $row_st['$ticket_id'];

?>

<style>
    .main_heding {
        background-color: #FF7C3B;
        padding: 20px 40px;
        border: 1px solid rgb(213, 211, 211);
        border-radius: 2px;
    }

    .main {
        background-color: #FFFBF8;
        padding: 35px 10px;
        border: 1px solid rgb(243, 241, 241);
        border-radius: 2px;
        padding: 20px 40px;
    }

    input[type="text"],
    input[type="email"],
    textarea {
        width: 100%;
        padding: 8px 15px;
        border: 1px solid rgb(243, 241, 241);
        border-radius: 4px;

    }

    input[type="submit"] {
        background-color: #F17B1E;
        color: white;
        padding: 6px 16px;
        border: 1px solid rgb(243, 241, 241);
        border-radius: 5px;
    }

    .grid-box {
        display: grid;
        grid-template-columns: 500px auto;
        grid-gap: 1rem;
    }
</style>
<!--content-->
<div class="">

    <div class="container">
        <div class="" style="display: flex; justify-content:center;">
            <img src="../../image/cover_photo.png">
        </div>
        <br>
        <div class="dot">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="main_heding">
                    <h4 style="color:white;">ชำระเงิน</h4>
                </div>
                <div class="main">
                    <div class="grid-box">
                        <p>
                            ประเภทการจอง:
                            <select name="payment_type" id="payment_type" class="form-control" required>
                                <option value="จองตั๋ว">จองตั๋ว</option>
                        
                            </select>
                        </p>
                        <p>
                            บริษัทที่ทำการจอง:
                            <select name="company_id" id="company_id" class="form-control" required>
                                <option value="" selected disabled>บริษัทที่จอง</option>
                            </select>
                        </p>
                    </div>

                    <div class="grid-box">
                        <p>
                            ชื่อ:
                            <input type="text" name="payment_fname" id="payment_fname" placeholder="ชื่อ" required>
                        </p>
                        <p>
                            นามสกุล:
                            <input type="text" name="payment_lname" id="payment_lname" placeholder="นามสกุล" required>
                        </p>
                    </div>
                    <div class="grid-box">
                        <p>
                            หมายเลขจอง:
                            <input type="text" name="payment_no" id="payment_no" placeholder="หมายเลขจอง"
                                value="<?= $tickets_no; ?>" style="outline:none; cursor:default;" readonly required>
                        </p>
                        <p>
                            ชำระเข้าธนาคาร:
                            <select name="payment_bank" id="payment_bank" class="form-control" required>
                                <option value="" selected disabled>ธนาคาร</option>
                            </select>
                        </p>
                    </div>
                    <div class="grid-box">
                        <p>
                            จำนวนเงิน:
                            <input type="text" name="payment_pay" id="payment_pay" placeholder="จำนวนเงิน"
                                value="<?= $station_price_tickets; ?>" style="outline:none; cursor:default;" readonly
                                required>
                        </p>
                        <p>
                            เบอร์โทร:
                            <input type="text" name="payment_tel" id="payment_tel" placeholder="เบอร์โทร" required
                                maxlength="10">
                        </p>
                    </div>
                    <div class="grid-box">
                        <p>
                            วันเวลาที่ชำระ:
                            <input type="datetime-local" name="payment_date_time" id="payment_date_time"
                                class="form-control" required>
                        </p>
                    </div>
                    <div class="grid-box">
                        <p>
                            แนบรูป:
                            <input type="file" name="payment_pic" id="payment_pic" class="form-control" required>
                        </p>


                        <p>
                            <img src="../../upload/" alt="" width="100px" id="img" style="margin-top:10px;">
                            <script>
                                payment_pic.onchange = evt => {
                                    const [file] = payment_pic.files
                                    if (file) {
                                        img.src = URL.createObjectURL(file)
                                    }
                                }
                            </script>
                        </p>

                    </div>
                    <p>

                    </p>
                    <br>
                    <input type="hidden" name="tickets_id" value="<?= $tickets_id; ?>">
                    <input type="hidden" name="station_id" value="<?= $station_id; ?>">
                    <input type="hidden" name="carservice_vehicle" value="<?= $carservice_vehicle; ?>">
                    <input type="hidden" name="status" value="1">
                    <input type="submit" value="ชำระเงิน" name="submit">
            </form>
            <?php
            if (isset($_POST['submit'])) {
                $payment_type = $_POST['payment_type'];
                $payment_fname = $_POST['payment_fname'];
                $payment_lname = $_POST['payment_lname'];
                $payment_no = $_POST['payment_no'];
                $payment_bank = $_POST['payment_bank'];
                $payment_pay = $_POST['payment_pay'];
                $payment_tel = $_POST['payment_tel'];
                $payment_date_time = $_POST['payment_date_time'];
                $company_id = $_POST['company_id'];
                $station_id = $_POST['station_id'];
                $carservice_vehicle = $_POST['carservice_vehicle'];
                $user_idcard = $_SESSION['user_idcard'];
                $payment_pic = "";
                $id = $_GET['tickets_id'];
                $status = $_POST['status'];
                if ($_FILES['payment_pic']['name'] != "") {
                    $datetime = date("dmYHis");
                    $file_name = substr($_FILES['payment_pic']['name'], -4);
                    $payment_pic = $datetime . '_p1' . $file_name;
                    $target = "../../upload/" . $payment_pic;
                    move_uploaded_file($_FILES['payment_pic']['tmp_name'], $target);
                    
                }

                
                $sql = "INSERT INTO `tb_payment` (
                    `payment_type`,
                    `payment_fname`,
                    `payment_lname`,
                    `payment_no`,
                    `payment_bank`,
                    `payment_pay`,
                    `payment_tel`,
                    `payment_date_time`,
                    `payment_pic`,
                    `company_id`,
                    `user_idcard`,
                    `station_id`,
                    `status`,
                    `tickets_id`,
                    `carservice_vehicle` 
                ) VALUES (
                    '$payment_type',
                    '$payment_fname',
                    '$payment_lname',
                    '$payment_no',
                    '$payment_bank',
                    '$payment_pay',
                    '$payment_tel',
                    '$payment_date_time',
                    '$payment_pic',
                    '$company_id',
                    '$user_idcard',
                    '$station_id',
                    '$status',
                    '$id',
                    '$carservice_vehicle'
                );";

                $sqlupdate = "UPDATE `tb_tickets` SET status = 1 WHERE tickets_id =$id";

                if ($cls_conn->write_base($sql) && $cls_conn->write_base($sqlupdate)) {
                     echo $cls_conn->show_message('ชำระเงินสำเร็จ');
                     echo $cls_conn->goto_page(1, 'show_payment.php');
                    //  echo $sql;
                } else {
                     echo $cls_conn->show_message('ชำระเงินไม่สำเร็จ');
                     echo $sql;
                 }
            }

            ?>
        </div>
    </div>

</div>
<br />
<script src="js/get_bank.js"></script>
<?php include('footer.php'); ?>