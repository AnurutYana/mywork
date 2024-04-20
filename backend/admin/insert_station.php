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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_origin_name">ชื่อสถานีต้นทาง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="station_origin_name" id="station_origin_name" class="form-control col-md-7 col-xs-12">
                                <option value="" selected disabled>เลือกสถานีต้นทาง</option>

                                <?php
                                    $sqld = "SELECT * FROM `tb_station_origin`";
                                    $rsd = $cls_conn->select_base($sqld);
                                    while ($rowd = mysqli_fetch_array($rsd)) {
                                    ?>
                                        <option value="<?= $rowd['origin_id']; ?>"><?= $rowd['origin_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_ortime">เวลาต้นทาง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="station_ortime" id="station_ortime" class="form-control col-md-7 col-xs-12">
                                <option time="" selected disabled>เวลาต้นทาง</option>
                                
                                <?php
                                    $sqld = "SELECT * FROM `tb_timestation` ORDER BY tb_timeid  ";
                                    $rsd = $cls_conn->select_base($sqld);
                                    while ($rowd = mysqli_fetch_array($rsd)) {
                                    ?>
                                        <option time="<?= $rowd['tb_timeid']; ?>"><?= $rowd['tb_timeout']; ?></option>
                                        <option time="<?= $rowd['tb_timeid']; ?>"><?= $rowd['tb_timewill']?> </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_terminal_name">ชื่อสถานีปลายทาง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="station_terminal_name" id="station_terminal_name" class="form-control col-md-7 col-xs-12">
                                <option value="" selected disabled>เลือกสถานีปลายทาง</option>
                                <?php
                                    $sqld = "SELECT * FROM `tb_station_terminal`";
                                    $rsd = $cls_conn->select_base($sqld);
                                    while ($rowd = mysqli_fetch_array($rsd)) {
                                    ?>
                                        <option value="<?= $rowd['terminal_id']; ?>"><?= $rowd['terminal_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_destime">เวลาปลายทาง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="station_destime" id="station_destime" class="form-control col-md-7 col-xs-12">
                                <option time="" selected disabled>เวลาปลายทาง</option>
                                <?php
                                    $sqld = "SELECT * FROM `tb_timestation` ORDER BY tb_timeid ";
                                    $rsd = $cls_conn->select_base($sqld);
                                    while ($rowd = mysqli_fetch_array($rsd)) {
                                    ?>
                                        <option time="<?= $rowd['tb_timeid']; ?>"><?= $rowd['tb_timewill']?> </option>
                                        <option time="<?= $rowd['tb_timeid']; ?>"><?= $rowd['tb_timewill2']?> </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_departuretime">เวลารถออก<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="time" id="station_departuretime" name="station_departuretime" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_price_tickets">ราคาตั๋วรถตู้<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" min="1" id="station_price_tickets" name="station_price_tickets" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tickets_amount">จำนวนที่นั่งรถ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" min="0" id="tickets_amount" name="tickets_amount" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_price_package">ราคาฝากพัสดุ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" min="1" id="station_price_package" name="station_price_package" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_registration">ทะเบียนรถ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="station_registration" id="station_registration" required="required" class="form-control col-md-7 col-xs-12">
                                    <option value="" selected disabled>เลือกทะเบียนรถ</option>
                                <?php
                                    $sqld = "SELECT * FROM `tb_carservice`";
                                    $rsd = $cls_conn->select_base($sqld);
                                    while ($rowd = mysqli_fetch_array($rsd)) {
                                    ?>
                                        <option value="<?= $rowd['carservice_id']; ?>"><?= $rowd['carservice_vehicle']; ?></option>
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

                    $station_origin_name = $_POST['station_origin_name'];
                    $station_ortime = $_POST['station_ortime'];
                    $station_terminal_name = $_POST['station_terminal_name'];
                    $station_destime = $_POST['station_destime'];
                    $station_departuretime = $_POST['station_departuretime'];
                    $station_price_tickets = $_POST['station_price_tickets'];
                    $station_price_package = $_POST['station_price_package'];
                    $station_registration = $_POST['station_registration'];
                    $tickets_amount = $_POST['tickets_amount'];
					
					$sql_check=" select * from tb_station where station_origin_name='$station_origin_name' and station_ortime='$station_ortime' and station_terminal_name='$station_terminal_name' and station_destime='$station_destime' and station_departuretime='$station_departuretime' and station_price_tickets='$station_price_tickets' and station_price_package='$station_price_package' and station_registration='$station_registration' and tickets_amount='$tickets_amount'";
					//echo $sql_check;
                    
                    $numrows=$cls_conn->select_numrows($sql_check);
					if($numrows>=1)
					{
						echo $cls_conn->show_message('บันทึกข้อมูลซ้ำ');
					}
					else
					{

                    $sql = " insert into tb_station(station_origin_name,station_ortime,
                    station_terminal_name,station_destime,station_departuretime,station_price_tickets,station_price_package,station_registration,tickets_amount)";
                    $sql .= " values ('$station_origin_name','$station_ortime','$station_terminal_name',
                    '$station_destime','$station_departuretime','$station_price_tickets','$station_price_package','$station_registration','$tickets_amount')";

                    // die($sql);
                    if ($cls_conn->write_base($sql) == true) {
                        echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                        echo $cls_conn->goto_page(1, 'show_station.php');
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

<script src="js/get_ve.js"></script>
<?php include('footer.php'); ?>