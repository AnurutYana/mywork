<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แก้ไขข้อมูลตารางข้อมูลเวลาเดินรถ

                    </h2>
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
                        $sqlu = " select * from tb_timeable";
                        $sqlu .= " where";
                        $sqlu .= " timeable_id='$id'";
                        $resultu = $cls_conn->select_base($sqlu);
                        while ($rowu = mysqli_fetch_array($resultu)) {
                            $timeable_id = $rowu['timeable_id'];
                            $timeable_stn1  = $rowu['timeable_stn1'];
                            $timeable_stn2  = $rowu['timeable_stn2'];
                            $timeable_stn3 = $rowu['timeable_stn3'];
                            $timeable_start = $rowu['timeable_start'];
                            $timeable_destination1 = $rowu['timeable_destination1'];
                            $timeable_destination2 = $rowu['timeable_destination2'];
                            $timeable_price  = $rowu['timeable_price'];
                            $carservice_id = $rowu['carservice_id'];
                        }
                    }
                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="timeable_id" value="<?= $timeable_id; ?>" />

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="timeable_stn1">สถานีเริ่มต้น<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="timeable_stn1" name="timeable_stn1" required="required" value="<?= $timeable_stn1; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="timeable_stn2">สถานีปลายทาง 1<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="timeable_stn2" name="timeable_stn2" required="required" value="<?= $timeable_stn2; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="timeable_stn3">สถานีปลายทาง 2<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="timeable_stn3" name="timeable_stn3" required="required" value="<?= $timeable_stn3; ?> " class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="timeable_start">เวลาออกรถ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="datetime-local" id="timeable_start" name="timeable_start" required="required" value="<?= $timeable_start; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="timeable_destination1">เวลาปลายทาง 1<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="datetime-local" id="timeable_destination1" name="timeable_destination1" value="<?= $timeable_destination1; ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="timeable_destination2">เวลาปลายทาง 2<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="datetime-local" id="timeable_destination2" name="timeable_destination2" required="required" value="<?= $timeable_destination2 ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="timeable_price">ราคา<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="timeable_price" name="timeable_price" required="required" value="<?= $timeable_price; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="carservice_id">หมายเลขทะเบียนรถ <span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="carservice_id" name="carservice_id" required="required" class="form-control col-md-7 col-xs-12">
                                    <?php
                                    $sqld = "select * from tb_carservice";
                                    $rsd = $cls_conn->select_base($sqld);
                                    while ($rowd = mysqli_fetch_array($rsd)) {
                                    ?>
                                        <option <?php if ($carservice_id == $rowd['carservice_id']) { ?> selected="selected" <?php } ?> value='<?php echo $rowd['carservice_id']; ?>'>
                                            <?php echo $rowd['carservice_number'];  ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
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
                        $timeable_id = $_POST['timeable_id'];
                        $timeable_stn1 = $_POST['timeable_stn1'];
                        $timeable_stn2 = $_POST['timeable_stn2'];
                        $timeable_stn3 = $_POST['timeable_stn3'];
                        $timeable_start = $_POST['timeable_start'];
                        $timeable_destination1 = $_POST['timeable_destination1'];
                        $timeable_destination2 = $_POST['timeable_destination2'];
                        $timeable_price = $_POST['timeable_price'];
                        $carservice_id = $_POST['carservice_id'];




                        $sql = " update tb_timeable";
                        $sql .= " set";
                        $sql .= " timeable_stn1='$timeable_stn1'";
                        $sql .= " ,timeable_stn2='$timeable_stn2'";
                        $sql .= " ,timeable_stn3='$timeable_stn3'";
                        $sql .= " ,timeable_start='$timeable_start'";
                        $sql .= " ,timeable_destination1='$timeable_destination1'";
                        $sql .= " ,timeable_destination2='$timeable_destination2'";
                        $sql .= " ,timeable_price='$timeable_price'";
                        $sql .= " ,carservice_id='$carservice_id'";
                        $sql .= " where";
                        $sql .= " timeable_id='$timeable_id'";

                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
                            echo $cls_conn->goto_page(1, 'show_timeable.php');
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