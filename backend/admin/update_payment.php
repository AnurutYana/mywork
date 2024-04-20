<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แก้ไขข้อมูลชำระเงิน</h2>
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
                        $sqlu = " select * from tb_paypayment";
                        $sqlu .= " where";
                        $sqlu .= " paypayment_id='$id'";
                        $resultu = $cls_conn->select_base($sqlu);
                        while ($rowu = mysqli_fetch_array($resultu)) {
                            $paypayment_id = $rowu['paypayment_id'];
                            $paypayment_date = $rowu['paypayment_date'];
                            $paypayment_img = $rowu['paypayment_img'];
                            $user_id = $rowu['user_id'];
                            $reserve_id = $rowu['reserve_id'];
                            $package_id= $rowu['package_id'];
                            
                        }
                    }
                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="paypayment_id" value="<?= $paypayment_id; ?>" />

                        

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="paypayment_date">วันเวลาที่ชำระเงิน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="datetime-local" id="paypayment_date" name="paypayment_date" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="paypayment_img">รูปภาพหลักฐานการโอนเงิน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="paypayment_img" name="paypayment_img" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_id">หมายเลขประจำตัวประชาชนสมาชิก<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="user_id" name="user_id" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reserve_id">รหัสการจองตั๋วรถ <span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="texr" id="	reserve_id" name="reserve_id" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="package_id">รหัสฝากพัสดุ <span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="package_id" name="package_id" required="required" class="form-control col-md-7 col-xs-12">
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
                        $paypayment_id = $_POST['paypayment_id'];
                        $paypayment_date = $_POST['paypayment_date'];
                        $paypayment_img= $_POST['paypayment_img'];
                        $user_id= $_POST['user_id'];
                        $reserve_id= $_POST['reserve_id'];
                        $package_id = $_POST['package_id'];
                        

                        $sql = " update tb_paypayment";
                        $sql .= " set";
                        $sql .= " paypayment_date='$paypayment_date'";
                        $sql .= " ,paypayment_img='$paypayment_img'";
                        $sql .= " ,user_id='$user_id'";
                        $sql .= " ,reserve_id='$reserve_id'";
                        $sql .= " ,package_id='$package_id";
                        

                        $sql .= " where";
                        $sql .= "paypayment_id='$paypayment_id'";

                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
                            echo $cls_conn->goto_page(1, 'show_paypayment.php');
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