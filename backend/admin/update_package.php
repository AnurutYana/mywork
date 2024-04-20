<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แก้ไขข้อมูลฝากพัสดุ</h2>
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
                        $sqlu = " select * from tb_package";
                        $sqlu .= " where";
                        $sqlu .= " package_id='$id'";
                        $resultu = $cls_conn->select_base($sqlu);
                        while ($rowu = mysqli_fetch_array($resultu)) {
                            $package_id = $rowu['package_id'];
                            $package_count = $rowu['package_count'];
                            $package_sentname = $rowu['package_sentname'];
                            $package_senttel = $rowu['package_senttel'];
                            $package_rename = $rowu['package_rename'];
                            $package_img = $rowu['package_img'];
                            $package_payment = $rowu['package_payment'];
                            $package_status= $rowu['package_status'];
                            $employee_id = $rowu['employee_id'];
                            $timeable_id = $rowu['timeable_id'];
                        }
                    }
                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="package_id" value="<?= $package_id; ?>" />

                        

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="package_count">จำนวนพัสดุ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="txet" id="package_count" name="package_count" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="package_sentname">ชื่อผู้ส่ง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="package_sentname" name="package_sentname" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="package_senttelt">ชื่อผู้รับ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="package_senttel" name="package_senttel" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="package_rename">เบอร์โทรผู้รับ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input tel="datetime-local" id="package_rename" name="package_rename" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="package_img">รูปกล่องพัสดุ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="datetime-local" id="package_img" name="package_img" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="package_payment">สถานะการชำระเงิน  <span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="package_payment" name="package_payment" value="<?= $package_payment; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                    <option value="รอตรวจสอบ">รอตรวจสอบ</option>
                                    <option value="ถึงสถานีแล้ว">ถึงสถานีแล้ว</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="package_status">สถานะพัสดุ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="package_status" name="package_status" value="<?= $package_status; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                    <option value="อยู่ระหว่างจัดส่ง">อยู่ระหว่างจัดส่ง</option>
                                    <option value="ถึงสถานีแล้ว">ถึงสถานีแล้ว</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_id">หมายเลขประจำตัวประชาชนผู้ใช้งาน <span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="employee_id" name="employee_id" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                       
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gtimeable_id">รหัสตารางเวลาเดินรถ <span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="timeable_id" name="timeable_id" required="required" class="form-control col-md-7 col-xs-12">
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
                        $package_id = $_POST['package_id'];
                        $package_count = $_POST['package_count'];
                        $package_sentname= $_POST['package_sentname'];
                        $package_senttel= $_POST['package_senttel'];
                        $package_rename= $_POST['package_rename'];
                        $package_img = $_POST['package_img'];
                        $package_payment = $_POST['package_payment'];
                        $package_status = $_POST['package_status'];
                        $employee_id = $_POST['employee_id'];
                        $timeable_id  = $_POST['timeable_id '];


                        $sql = " update tb_package";
                        $sql .= " set";
                        $sql .= " package_count='$package_count'";
                        $sql .= " ,package_sentname='$package_sentname'";
                        $sql .= " ,package_senttel='$package_senttel'";
                        $sql .= " ,package_rename='$package_rename'";
                        $sql .= " ,package_img='$package_img'";
                        $sql .= " ,package_payment='$package_payment'";
                        $sql .= " ,package_status ='$package_status '";
                        $sql .= " ,employee_id='$employee_id'";
                        $sql .= " ,timeable_id ='$timeable_id '";

                        $sql .= " where";
                        $sql .= " package_id='$package_id'";

                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
                            echo $cls_conn->goto_page(1, 'show_package.php');
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