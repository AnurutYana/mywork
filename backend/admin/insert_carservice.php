<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>เพิ่มข้อมูลรถตู้</h2>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="carservice_vehicle">หมายเลขทะเบียนรถ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="carservice_vehicle" name="carservice_vehicle" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="carservice_user">ชื่อพนักงานขับรถ<span class="required">:</span> </label>
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <input type="text" name="carservice_fname" required="required" placeholder="ชื่อ" class="form-control col-md-7 col-xs-12">
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <input type="text" name="carservice_lname" required="required" placeholder="นามสกุล"  class="form-control col-md-7 col-xs-12">
                                </div>

                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="carservice_brand">ยี่ห้อ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="carservice_brand" name="carservice_brand" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="carservice_number">หมายเลขรถ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="carservice_number" name="carservice_number" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                    
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
                                <a onclick="gotoBack()" class="btn btn-danger">ยกเลิก</a>
                                <script>
                                    function gotoBack() {
                                        window.location.href = "show_carservice.php";

                                    }
                                </script>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        $carservice_vehicle = $_POST['carservice_vehicle'];
                        $carservice_fname = $_POST['carservice_fname'];
                        $carservice_lname = $_POST['carservice_lname'];
                        $carservice_brand = $_POST['carservice_brand'];
                        $carservice_number = $_POST['carservice_number'];
                       


                        $check = "select * from tb_carservice where carservice_fname = '$carservice_fname' and carservice_lname = '$carservice_lname'";
                        $result = $cls_conn->select_base($check);
                        if($result->num_rows>=1){
                            echo $cls_conn->show_message('มีข้อมูลพนักงานแล้ว กรุณากรอกข้อมูลใหม่');
                        }else{
                            $sql = " insert into tb_carservice(carservice_vehicle,carservice_fname,carservice_lname,carservice_brand,carservice_number)";
                            $sql .= " values ('$carservice_vehicle','$carservice_fname','$carservice_lname','$carservice_brand','$carservice_number')";
                            if ($cls_conn->write_base($sql) == true) {
                                echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(1, 'show_carservice.php');
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