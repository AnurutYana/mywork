<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แก้ไขข้อมูลรถตู้</h2>
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
                        $sqlu = " select * from tb_carservice";
                        $sqlu .= " where";
                        $sqlu .= " carservice_id='$id'";
                        $resultu = $cls_conn->select_base($sqlu);
                        while ($rowu = mysqli_fetch_array($resultu)) {
                            $carservice_id = $rowu['carservice_id'];
                            $carservice_vehicle = $rowu['carservice_vehicle'];
                            $carservice_fname = $rowu['carservice_fname'];
                            $carservice_lname = $rowu['carservice_lname'];
                            $carservice_number= $rowu['carservice_number'];
                            
                            $carservice_brand = $rowu['carservice_brand'];
                            $company_id = $rowu['company_id'];
                        }
                    }
                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="carservice_id" value="<?= $carservice_id; ?>" />

                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="carservice_vehicle">หมายเลขทะเบียนรถ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="carservice_vehicle" name="carservice_vehicle" value="<?= $carservice_vehicle; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="carservice_user">ชื่อพนักงานขับรถ<span class="required">:</span> </label>
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <input type="text" id="carservice_fname" name="carservice_fname" required="required" value="<?= $carservice_fname; ?>" class="form-control col-md-7 col-xs-12">
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <input type="text" id="carservice_lname" name="carservice_lname" required="required" value="<?= $carservice_lname; ?>"  class="form-control col-md-7 col-xs-12">
                                </div>

                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="carservice_brand">ยี่ห้อ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="carservice_brand" name="carservice_brand" value="<?= $carservice_brand; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="carservice_number">หมายเลขรถ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="carservice_number" name="carservice_number" value="<?= $carservice_number; ?>" class="form-control col-md-7 col-xs-12">
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
                        $carservice_id = $_POST['carservice_id'];
                        $carservice_fname = $_POST['carservice_fname'];
                        $carservice_lname = $_POST['carservice_lname'];
                        $carservice_brand = $_POST['carservice_brand'];
                        $carservice_vehicle = $_POST['carservice_vehicle'];
                        $carservice_number = $_POST['carservice_number'];
                       



                        
                        $sql = " update tb_carservice";
                        $sql .= " set";
                        $sql .= " carservice_fname='$carservice_fname'";
                        $sql .= " ,carservice_lname='$carservice_lname'";
                        $sql .= " ,carservice_brand='$carservice_brand'";
                        $sql .= " ,carservice_vehicle='$carservice_vehicle'";
                        $sql .= " ,carservice_number='$carservice_number'";
                        $sql .= " where";
                        $sql .= " carservice_id='$carservice_id'";

                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
                            echo $cls_conn->goto_page(1, 'show_carservice.php');
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