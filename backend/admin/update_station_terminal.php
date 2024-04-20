<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แก้ข้อมูลสถานีต้นทาง</h2>
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
                        $sqlu = "select * from tb_station_terminal";
                        $sqlu .= " where";
                        $sqlu .= " terminal_id='$id'";
                        $resultu = $cls_conn->select_base($sqlu);
                        while ($rowu = mysqli_fetch_array($resultu)) {
                            $terminal_id = $rowu['terminal_id'];
                            $terminal_name = $rowu['terminal_name'];
                        }
                    }
                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                        <input type="hidden" value="<?= $terminal_id; ?>" name="terminal_id">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_name">ชื่อสถานีปลายทาง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="terminal_name" name="terminal_name" required="required" value="<?= $terminal_name; ?>" class="form-control col-md-7 col-xs-12">
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
                    $terminal_id = $_POST['terminal_id'];
                    $terminal_name = $_POST['terminal_name'];

                    $sql = "UPDATE `tb_station_terminal` SET `terminal_name`='$terminal_name' WHERE terminal_id = '$terminal_id'";
                    // die($sql);
                    if ($cls_conn->write_base($sql) == true) {
                        echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
                        echo $cls_conn->goto_page(1, 'show_station_terminal.php');
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