<?php include('header.php');
$id = $_GET['tickets_id'];
// var_dump($id);
$check_st = "SELECT 
tbp.payment_type, 
tbp.payment_fname, 
tbp.payment_lname, 
tbp.payment_no, 
tbb.bank_name, 
tbp.payment_pay, 
tbp.payment_tel, 
tbp.payment_date_time, 
tbp.payment_pic, 
tbc.company_name, 
tbs.station_departuretime
FROM tb_payment AS tbp
INNER JOIN tb_company AS tbc ON tbc.company_id = tbp.company_id
INNER JOIN tb_bank AS tbb ON tbb.bank_id = tbp.payment_bank
INNER JOIN tb_station AS tbs ON tbs.station_id = tbp.station_id
WHERE tbp.payment_id = '$id'";
$result_st = $cls_conn->select_base($check_st);
$row_st = $result_st->fetch_assoc();


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
        
        cursor: default;
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
                    <h4 style="color:white;">ประวัติการชำระเงิน</h4>
                </div>
                <div class="main">
                    <div class="grid-box">
                        <p>
                            ประเภทการจอง:
                            <input type="text" class="form-control" value="<?= $row_st['payment_type'] ?>" readonly>
                        </p>
                        <p>
                            บริษัทที่ทำการจอง:
                            <input type="text" class="form-control" value="<?= $row_st['company_name'] ?>" readonly>
                        </p>
                    </div>

                    <div class="grid-box">
                        <p>
                            ชื่อ:
                            <input type="text" class="form-control" value="<?= $row_st['payment_fname'] ?>" readonly>
                        </p>
                        <p>
                            นามสกุล:
                            <input type="text" class="form-control" value="<?= $row_st['payment_lname'] ?>" readonly>
                        </p>
                    </div>
                    <div class="grid-box">
                        <p>
                            หมายเลขจอง:
                            <input type="text" class="form-control" value="<?= $row_st['payment_no'] ?>" readonly>
                        </p>
                        <p>
                            ชำระเข้าธนาคาร:
                            <input type="text" class="form-control" value="<?= $row_st['bank_name'] ?>" readonly>
                        </p>
                    </div>
                    <div class="grid-box">
                        <p>
                            จำนวนเงิน:
                            <input type="text" class="form-control" value="<?= $row_st['payment_pay'] ?>" readonly>
                        </p>
                        <p>
                            เบอร์โทร:
                            <input type="text" class="form-control" value="<?= $row_st['payment_tel'] ?>" readonly>
                        </p>
                    </div>
                    <div class="grid-box">
                        <p>
                            เวลาที่รถออก:
                            <input type="text" class="form-control" value="<?= $row_st['station_departuretime'] ?>" readonly>
                        </p>
                        <p>
                            วันเวลาที่ชำระ:
                            <input type="text" class="form-control" value="<?= $row_st['payment_date_time'] ?>" readonly>
                        </p>
                    </div>
                    <div class="grid-box">
                        <p style="display:flex; flex-direction: column; margin: 12px 0">
                            รูปแนบ:
                            <img src="../../upload/<?= $row_st['payment_pic'] ?>" alt="" width="100px" id="img" style="margin-top:10px;">
                        </p>

                    </div>
                    <input type="submit" value="ย้อนกลับ" name="submit">
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        echo $cls_conn->goto_page(1, 'history_payment.php');
    }
    ?>

</div>
<br />
<?php include('footer.php'); ?>