<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>เพิ่มข้อมูลการจองตั๋วรถ </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reserve_date">วันที่จอง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="reserve_date" name="reserve_date" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reserve_seat">จำนวนที่นั่ง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="reserve_seat" name="reserve_seat" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reserve_status">สถานะการจองตั๋วรถ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="reserve_status" name="reserve_status" value="<?= $reserve_status; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                    <option value="รอตรวจสอบ">รอตรวจสอบ </option>
                                    <option value="ชำระเงินแล้ว  ">ชำระเงินแล้ว  </option>
                                    <option value="ยกเลิกการจอง ">ยกเลิกการจอง</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reserve_payment">สถานะการชำระเงิน  <span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="reserve_payment" name="reserve_payment" value="<?= $reserve_payment; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                    <option value="รอตรวจสอบ ">รอตรวจสอบ </option>
                                    <option value="ตรวจสอบแล้ว ">ตรวจสอบแล้ว</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="timeable_id">รหัสตารางเวลาเดินรถ <span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="timeable_id" name="timeable_id" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_id">หมายเลขประจำตัวประชาชนสมาชิก<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="user_id" name="user_id" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_id">หมายเลขประจำตัวประชาชนผู้ใช้งาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="employee_id" name="employee_id" required="required" class="form-control col-md-7 col-xs-12">
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
                        $reserve_date = $_POST['reserve_date'];
                        $reserve_seat = $_POST['reserve_seat'];
                        $reserve_status = $_POST['reserve_status'];
                        $reserve_payment = $_POST['reserve_payment'];
                        $timeable_id = $_POST['timeable_id'];
                        $user_id = $_POST['user_id'];
                        $employee_id = $_POST['employee_id'];
                        


                        $sql = " insert into tb_reserve(reserve_date,reserve_seat, reserve_status,reserve_payment,timeable_id,user_id,employee_id)";
                        $sql .= " values ('$reserve_date','$reserve_seat','$reserve_status','$reserve_payment','$timeable_id','$user_id','$employee_id')";
                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                            echo $cls_conn->goto_page(1, 'show_reserve.php');
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
</div>
<?php include('footer.php'); ?>