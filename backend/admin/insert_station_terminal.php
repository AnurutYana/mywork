<?php include('header.php');

?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>เพิ่มข้อมูลสถานีปลายทาง</h2>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="station_name">ชื่อสถานีต้นปลายทาง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="terminal_name" name="terminal_name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

            
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
                                <a onclick="gotoBack()" class="btn btn-danger">ยกเลิก</a>
                                <script>
                                    function gotoBack() {
                                        window.history.back();

                                    }
                                </script>
                            </div>
                        </div>
                    </form>
                </div>

                <?php
                if (isset($_POST['submit'])) {
                   $terminal_name = $_POST['terminal_name'];
                  
                   $check = "select * from tb_station_terminal where terminal_name='$terminal_name'";
                    $sql_d = $cls_conn->select_base($check);
                    if ($sql_d->num_rows > 0) {
                        echo $cls_conn->show_message("มีข้อมูลอยู่ในระบบแล้ว กรุณากรอกข้อมูลใหม่");
                    }else{
                        $sql = "INSERT INTO `tb_station_terminal`(`terminal_name`) VALUES ('$terminal_name')";
                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                            echo $cls_conn->goto_page(1, 'show_station_terminal.php');
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