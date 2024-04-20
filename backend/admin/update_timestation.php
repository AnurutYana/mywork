<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แก้ไขข้อมูลตารางเวลาเดินรถ</h2>
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
                        $sqlu = " select * from tb_timestation";
                        $sqlu .= " where";
                        $sqlu .= " tb_timeid='$id'";
                        $resultu = $cls_conn->select_base($sqlu);
                        while ($rowu = mysqli_fetch_array($resultu)) {
                            $tb_timeid = $rowu['tb_timeid'];
                            $tb_timeout = $rowu['tb_timeout'];
                            $tb_timewill = $rowu['tb_timewill'];
                            $tb_timewill2 = $rowu['tb_timewill2'];
                            $carservice_vehicle = $rowu['carservice_vehicle'];
                        }
                    }

                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="tb_timeid" value="<?= $tb_timeid; ?>" />
                       
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tb_timeout">เวลารถออก<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="time" id="tb_timeout" name="tb_timeout" required="required" value="<?= $tb_timeout; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tb_timewill">เวลารถออก<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="time" id="tb_timewill" name="tb_timewill" required="required" value="<?= $tb_timewill; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tb_timewill2">เวลารถออก<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="time" id="tb_timewill2" name="tb_timewill2" required="required" value="<?= $tb_timewill2; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="carservice_vehicle">หมายเลขทะเบียนรถ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="carservice_vehicle" name="carservice_vehicle" required="required" class="form-control col-md-7 col-xs-12">
                                <?php
                                    $sqld = "SELECT * FROM `tb_carservice`";
                                    $rsd = $cls_conn->select_base($sqld);
                                    while ($rowd = mysqli_fetch_array($rsd)) {
                                    ?>
                                        <option <?php if ($carservice_vehicle == $rowd['carservice_vehicle']) { ?> selected="selected" <?php } ?> value='<?php echo $rowd['carservice_vehicle']; ?>'>
                                            <?php echo $rowd['carservice_vehicle'];  ?>
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
                        $tb_timeout = $_POST['tb_timeout'];
                        $tb_timewill = $_POST['tb_timewill'];
                        $tb_timewill2 = $_POST['tb_timewill2'];
                        $carservice_vehicle = $_POST['carservice_vehicle'];
                        


                        $sql = " update tb_timestation";
                        $sql .= " set";
                        $sql .= " tb_timeout='$tb_timeout'";
                        $sql .= " ,tb_timewill='$tb_timewill'";
                        $sql .= " ,tb_timewill2='$tb_timewill2'";
                        $sql .= " ,carservice_vehicle='$carservice_vehicle'";
                        $sql .= " where";
                        $sql .= " tb_timeid='$tb_timeid'";
                        // die( $sql );

                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
                            echo $cls_conn->goto_page(1, 'show_timestaion.php');
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