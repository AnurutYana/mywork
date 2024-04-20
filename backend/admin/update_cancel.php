<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แก้ไขยกเลิกจองตั๋วเที่ยวรถ </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <?php
                    if (isset($_GET['id'])) {

                        $id = $_GET['id'];
                        $sqlu = " select * from tb_cancel";
                        $sqlu .= " where";
                        $sqlu .= " cancel_id='$id'";
                        $resultu = $cls_conn->select_base($sqlu);
                        while ($rowu = mysqli_fetch_array($resultu)) {
                            $cancel_id = $rowu['cancel_id'];
                            $cancel_date = $rowu['cancel_date']; 
                            $payment_id = $rowu['payment_id'];
                        }
                    }
                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="cancel_id" value="<?= $cancel_id; ?>" />

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cancel_date">เวลาที่ยกเลิกการจองตั๋วรถ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="datetime-local" id="cancel_date" name="cancel_date" value="<?= $cancel_date; ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gold_datetime">รหัสชำระเงิน <span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="payment_id" name="payment_id" value="<?= $payment_id; ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
                                <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        $cancel_id = $_POST['cancel_id'];
                        $cancel_date = $_POST['cancel_date']; 
                        $payment_id = $_POST['payment_id'];

                        $sql = "UPDATE tb_cancel SET cancel_date = '$cancel_date', payment_id='$payment_id' WHERE cancel_id='$cancel_id'";

                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
                            echo $cls_conn->goto_page(1, 'show_cancel.php');
                        } else {
                            echo $cls_conn->show_message('แก้ไขข้อมูลไม่สำเร็จ');
                            echo $sql;
                        }
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>