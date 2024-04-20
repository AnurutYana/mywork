<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แก้ไขข้อมูลสถานีต้นทาง-ปลายทาง</h2>
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
                        $sqlu = " select * from tb_station";
                        $sqlu .= " where";
                        $sqlu .= " station_id='$id'";
                        $resultu = $cls_conn->select_base($sqlu);
                        while ($rowu = mysqli_fetch_array($resultu)) {
                            $station_id = $rowu['station_id'];
                            $station_origin_name = $rowu['station_origin_name'];
                            $station_ortime = $rowu['station_ortime'];
                            $station_terminal_name = $rowu['station_terminal_name'];
                            $station_destime = $rowu['station_destime'];
                            $station_departuretime = $rowu['station_departuretime'];
                            $station_price_tickets = $rowu['station_price_tickets'];
                            $station_price_package = $rowu['station_price_package'];
                            $station_registration = $rowu['station_registration'];
                            $tickets_amount = $rowu['tickets_amount'];
                        }
                    }

                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="station_id" value="<?= $station_id; ?>" />
                       
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_origin_name">ชื่อสถานีต้นทาง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="station_origin_name" name="station_origin_name" required="required" class="form-control col-md-7 col-xs-12">
                                    <?php
                                    $sqld = "SELECT * FROM `tb_station_origin`";
                                    $rsd = $cls_conn->select_base($sqld);
                                    while ($rowd = mysqli_fetch_array($rsd)) {
                                    ?>
                                        <option <?php if ($station_origin_name == $rowd['origin_id']) { ?> selected="selected" <?php } ?> value='<?php echo $rowd['origin_id']; ?>'>
                                            <?php echo $rowd['origin_name'];  ?>
                                        </option>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_terminal_name">ชื่อสถานีต้นทาง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="station_terminal_name" name="station_terminal_name" required="required" class="form-control col-md-7 col-xs-12">
                                    <?php
                                    $sqld = "SELECT * FROM `tb_station_terminal`";
                                    $rsd = $cls_conn->select_base($sqld);
                                    while ($rowd = mysqli_fetch_array($rsd)) {
                                    ?>
                                        <option <?php if ($station_terminal_name == $rowd['terminal_id']) { ?> selected="selected" <?php } ?> value='<?php echo $rowd['terminal_id']; ?>'>
                                            <?php echo $rowd['terminal_name'];  ?>
                                        </option>
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
                                <input type="time" id="station_departuretime" name="station_departuretime" required="required" value="<?= $station_departuretime; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_price_tickets">ราคาตั๋วรถตู้<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" min="1" id="station_price_tickets" name="station_price_tickets" required="required" value="<?= $station_price_tickets; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tickets_amount">จำนวนที่นั่งรถ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" min="0" id="tickets_amount" name="tickets_amount" value="<?=$tickets_amount;?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_price_package">ราคาฝากพัสดุ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" min="1" id="station_price_package" name="station_price_package" required="required" value="<?= $station_price_package; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                    
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_registration">หมายเลขทะเบียนรถ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="station_registration" name="station_registration" required="required" class="form-control col-md-7 col-xs-12">
                                <?php
                                    $sqld = "SELECT * FROM `tb_carservice`";
                                    $rsd = $cls_conn->select_base($sqld);
                                    while ($rowd = mysqli_fetch_array($rsd)) {
                                    ?>
                                        <option <?php if ($station_registration == $rowd['carservice_id']) { ?> selected="selected" <?php } ?> value='<?php echo $rowd['carservice_id']; ?>'>
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
                        $station_origin_name = $_POST['station_origin_name'];
                        $station_ortime = $_POST['station_ortime'];
                        $station_terminal_name = $_POST['station_terminal_name'];
                        $station_destime = $_POST['station_destime'];
                        $station_departuretime = $_POST['station_departuretime'];
                        $station_price_tickets = $_POST['station_price_tickets'];
                        $station_price_package = $_POST['station_price_package'];
                        $station_registration = $_POST['station_registration'];
                        $tickets_amount = $_POST['tickets_amount'];


                        $sql = " update tb_station";
                        $sql .= " set";
                        $sql .= " station_origin_name='$station_origin_name'";
                        $sql .= " ,station_ortime='$station_ortime'";
                        $sql .= " ,station_terminal_name='$station_terminal_name'";
                        $sql .= " ,station_destime='$station_destime'";
                        $sql .= " ,station_departuretime='$station_departuretime'";
                        $sql .= " ,station_price_tickets='$station_price_tickets'";
                        $sql .= " ,station_price_package='$station_price_package'";
                        $sql .= " ,station_registration='$station_registration'";
                        $sql .= " ,tickets_amount='$tickets_amount'";
                        $sql .= " where";
                        $sql .= " station_id='$station_id'";
                        // die( $sql );

                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
                            echo $cls_conn->goto_page(1, 'show_station.php');
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