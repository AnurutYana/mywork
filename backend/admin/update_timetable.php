<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แก้ไขข้อมูลตารางรายการตารางเวลาเดินรถ</h2>
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
                        $sqlu = " select * from tb_timetable";
                        $sqlu .= " where";
                        $sqlu .= " timetable_id='$id'";
                        $resultu = $cls_conn->select_base($sqlu);
                        while ($rowu = mysqli_fetch_array($resultu)) {
                            $timetable_id = $rowu['timetable_id'];
                            $carservice_id  = $rowu['carservice_id '];
                            $timeable_id  = $rowu['timeable_id '];
                            $timetable_date  = $rowu['timetable_date '];
                            $timetable_in = $rowu['timetable_in'];
                            $timetable_out = $rowu['timetable_out'];
                            $timetable_arrive = $rowu['timetable_arrive'];
                            $station_id	 = $rowu['station_id'];
                        }
                    }
                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="timetable_id" value="<?= $timetable_id; ?>" />

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="timeable_id">รหัสตารางเวลาเดินรถ <span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="timeable_id" name="timeable_id" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="timetable_date">เวลาที่เดินรถ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="datetime-local" id="timetable_date" name="timetable_date" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="timetable_in">เวลาที่รถเข้า<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="datetime-local" id="timetable_in" name="timetable_in" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="timetable_out">เวลาที่รถจะออก<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="datetime-local" id="timetable_out" name="timetable_out" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="timetable_arrive">เวลาที่จะถึง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="datetime-local" id="timetable_arrive	" name="timetable_arrive" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_id	">รหัสสถานี<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="station_id	" name="gstation_id	" required="required" class="form-control col-md-7 col-xs-12">
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
                        $timetable_id = $_POST['timetable_id'];
                        $carservice_id = $_POST['carservice_id'];
                        $timeable_id = $_POST['timeable_id'];
                        $timetable_date = $_POST['timetable_date'];
                        $timetable_in  = $_POST['timetable_in '];
                        $timetable_out = $_POST['timetable_out'];
                        $timetable_arrive = $_POST['timetable_arrive'];
                        $station_id	 = $_POST['station_id	'];


                        $sql = " update tb_timetable";
                        $sql .= " set";
                        $sql .= " carservice_id='$carservice_id'";
                        $sql .= " ,timeable_id='$timeable_id'";
                        $sql .= " ,timetable_date='$timetable_date'";
                        $sql .= " ,timetable_in ='$timetable_in '";
                        $sql .= " ,timetable_out='$timetable_out'";
                        $sql .= " ,timetable_arrive='$timetable_arrive'";
                        $sql .= " ,station_id='$station_id	'";
                        $sql .= " where";
                        $sql .= " timetable_id='$timetable_id'";

                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
                            echo $cls_conn->goto_page(1, 'show_timetable.php');
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