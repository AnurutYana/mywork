<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>เพิ่มข้อมูลสถานีต้นทาง</h2>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tb_timeout">เวลาออกรถ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="time" id="tb_timeout" name="tb_timeout" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tb_timewill">เวลาที่จะถึง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="time" id="tb_timewill" name="tb_timewill" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tb_timewill2">เวลาที่จะถึง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="time" id="tb_timewill2" name="tb_timewill2" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="carservice_vehicle">ทะเบียนรถ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="carservice_vehicle" id="carservice_vehicle" required="required" class="form-control col-md-7 col-xs-12">
                                    <option value="" selected disabled>เลือกทะเบียนรถ</option>
                                <?php
                                    $sqld = "SELECT * FROM `tb_carservice`";
                                    $rsd = $cls_conn->select_base($sqld);
                                    while ($rowd = mysqli_fetch_array($rsd)) {
                                    ?>
                                        <option value="<?= $rowd['carservice_vehicle']; ?>"><?= $rowd['carservice_vehicle']; ?></option>
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
                                <button class="btn btn-danger" onclick="gotopage()" class="btn btn-danger">ยกเลิก</button>
                                <script>
                                    function gotopage() {
                                        window.location.href = "show_timestation.php";
                                    }
                                </script>
                            </div>
                        </div>
                    </form>
                </div>

                <?php
                if (isset($_POST['submit'])) {

                    $tb_timeout = $_POST['tb_timeout'];
                    $tb_timewill = $_POST['tb_timewill'];
                    $tb_timewill2 = $_POST['tb_timewill2'];
                    $carservice_vehicle = $_POST['carservice_vehicle'];
                    
					
					$sql_check=" select * from tb_timestation where tb_timeout='$tb_timeout' and tb_timewill='$tb_timewill' and tb_timewill2='$tb_timewill2'and carservice_vehicle='$carservice_vehicle'";
					//echo $sql_check;
                    
                    $numrows=$cls_conn->select_numrows($sql_check);
					if($numrows>=1)
					{
						echo $cls_conn->show_message('บันทึกข้อมูลซ้ำ');
					}
					else
					{

                    $sql = " insert into tb_timestation(tb_timeout,tb_timewill,tb_timewill2,carservice_vehicle)";
                    $sql .= " values ('$tb_timeout','$tb_timewill','$tb_timewill2','$carservice_vehicle')";

                    // die($sql);
                    if ($cls_conn->write_base($sql) == true) {
                        echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                        echo $cls_conn->goto_page(1, 'show_timestaion.php');
                    } else {
                        echo $cls_conn->show_message('บันทึกข้อมูลไม่สำเร็จ');
                        echo $sql;
                    }
					}
                }

                ?>
            </div>
        </div>
    </div>
</div>
</div>

<?php include('footer.php'); ?>