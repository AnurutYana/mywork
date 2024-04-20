<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แก้ไขข้อมูลบริษัท</h2>
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
                        $sqlu = " select * from tb_company";
                        $sqlu .= " where";
                        $sqlu .= " company_id='$id'";
                        $resultu = $cls_conn->select_base($sqlu);
                        while ($rowu = mysqli_fetch_array($resultu)) {
                            $company_id = $rowu['company_id'];
                            $company_name = $rowu['company_name'];
                            $company_add = $rowu['company_add'];
                            $company_tel = $rowu['company_tel'];
                            
                        }
                    }
                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="company_id" value="<?= $company_id; ?>" />

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company_name">ชื่อบริษัท<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="company_name" name="company_name" value="<?= $company_name; ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company_add">ที่ตั้งสำนักงาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="company_add" name="company_add" value="<?= $company_add; ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company_tel">เบอร์โทรสำนักงาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="tel" id="company_tel" name="company_tel" value="<?= $company_tel; ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                      

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
                                <a onclick="gotoBack()" class="btn btn-danger">ยกเลิก</a>
                                <script>
                                    function gotoBack() {
                                        window.location.href = "show_company.php";

                                    }
                                </script>                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        $company_id = $_POST['company_id'];
                        $company_name = $_POST['company_name'];
                        $company_add = $_POST['company_add'];
                        $company_tel = $_POST['company_tel'];
                       

                        $sql = " update tb_company";
                        $sql .= " set";
                        $sql .= " company_name='$company_name'";
                        $sql .= " ,company_add='$company_add'";
                        $sql .= " ,company_tel='$company_tel'";
                        
                        $sql .= " where";
                        $sql .= " company_id='$company_id'";

                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
                            echo $cls_conn->goto_page(1, 'show_company.php');
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