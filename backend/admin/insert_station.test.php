<?php include('header.php');

$sql = "SELECT * FROM `province`";
$r = $cls_conn->select_base($sql);
$re = $r->fetch_all(MYSQLI_ASSOC);

?>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_origin_province">จังหวัดต้นทาง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="station_origin_province" id="station_origin_province" class="form-control col-md-7 col-xs-12">
                                    <option value="" selected disabled>เลือกจังหวัด</option>
                                    <?php foreach ($re as $key => $value) { ?>
                                        <option value="<?= $value['province_id']; ?>">
                                            <?= $value['province_name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_origin_name">ชื่อสถานีต้นทาง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="station_origin_name" name="station_origin_name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_ortime">เวลาต้นทาง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="time" id="station_ortime" name="station_ortime" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_terminal_province">จังหวัดปลายทาง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="station_terminal_province" id="station_terminal_province" class="form-control col-md-7 col-xs-12">
                                    <option value="" selected disabled>เลือกจังหวัด</option>
                                    <?php foreach ($re as $key => $value) { ?>
                                        <option value="<?= $value['province_id']; ?>">
                                            <?= $value['province_name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_terminal_name">ชื่อสถานีปลายทาง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="station_terminal_name" name="station_terminal_name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_destime">เวลาปลายทาง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="time" id="station_destime" name="station_destime" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_departuretime">เวลารถออก<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="time" id="station_departuretime" name="station_departuretime" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_price">ราคาตั๋ว<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="station_price" name="station_price" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div> 
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_registration">ทะเบียนรถ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="station_registration" name="station_registration" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company_id">ชื่อบริษัท<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="company_id" name="company_id" required="required" class="form-control col-md-7 col-xs-12">
                                <?php
                                                $sqld = "SELECT * FROM `tb_company`";
                                                $rsd=$cls_conn->select_base($sqld);
                                                while($rowd=mysqli_fetch_array($rsd))
                                                {
                                            ?>
                                                <option value="<?=$rowd['company_id'];?>"><?=$rowd['company_name'];?></option>
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
                                        window.location.href = "show_station.php";
                                    }
                                </script>
                            </div>
                        </div>
                    </form>
                </div>

                <?php
                if (isset($_POST['submit'])) {
                    $station_origin_province = $_POST['station_origin_province'];
                    $station_origin_name = $_POST['station_origin_name'];
                    $station_ortime = $_POST['station_ortime'];
                    $station_terminal_province = $_POST['station_terminal_province'];
                    $station_terminal_name = $_POST['station_terminal_name'];
                    $station_destime = $_POST['station_destime'];
                    $station_departuretime = $_POST['station_departuretime'];
                    $station_price = $_POST['station_price'];
                    $station_registration = $_POST['station_registration'];
                    $company_id = $_POST['company_id'];
                    
                    $sql = " insert into tb_station(station_origin_province,station_origin_name,station_ortime,station_terminal_province,station_terminal_name,station_destime,station_departuretime,station_price,station_registration,company_id)";
                    $sql .= " values ('$station_origin_province','$station_origin_name','$station_ortime','$station_terminal_province','$station_terminal_name','$station_destime','$station_departuretime','$station_price','$station_registration','$company_id')";
                 
                    if ($cls_conn->write_base($sql) == true) {
                        echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                        echo $cls_conn->goto_page(1, 'show_station.php');
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