<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>ข้อมูลธนาคาร</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">




                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company_id">รหัสบริษัท<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="company_id" name="company_id" required="required" class="form-control col-md-7 col-xs-12">
                                    <?php
                                    $sqld = "select * from tb_company";
                                    $rsd = $cls_conn->select_base($sqld);
                                    while ($rowd = mysqli_fetch_array($rsd)) {
                                    ?>
                                        <option value="<?= $rowd['company_id']; ?>"><?= $rowd['company_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bank_name">ชื่อธนาคาร<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="bank_name" name="bank_name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bank_number">เลขบัญชีธนาคาร<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="bank_number" name="bank_number" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
                                <a class="btn btn-danger" onclick="gotoBack()">ยกเลิก</a>
                                <script>
                                    function gotoBack() {
                                        window.location.href = "show_bank.php";

                                    }
                                </script>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {


                        $company_id = $_POST['company_id'];
                        $bank_name = $_POST['bank_name'];
                        $bank_number = $_POST['bank_number'];

                        $check = "select * from tb_bank where bank_number = '$bank_number'";
                        $result = $cls_conn->select_numrows($check);

                        if($result >= 1){
                            echo $cls_conn->show_message('มีข้อมูลอยู่ในระบบแล้ว กรุณากรอกข้อมูลใหม่');
                        }else{

                            $sql = " insert into `tb_bank`(`company_id`, `bank_name`, `bank_number`)";
                            $sql .= " values ('$company_id','$bank_name','$bank_number')";
                            if ($cls_conn->write_base($sql) == true) {
                                echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(1, 'show_bank.php');
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