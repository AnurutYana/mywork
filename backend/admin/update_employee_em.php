<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แก้ไขข้อมูลผู้ใช้งาน</h2>
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
                        $sqlu = " select * from tb_employee";
                        $sqlu .= " where";
                        $sqlu .= " employee_idcard='$id'";
                        $resultu = $cls_conn->select_base($sqlu);
                        while ($rowu = mysqli_fetch_array($resultu)) {
                            $employee_idcard = $rowu['employee_idcard'];
                            $employee_user = $rowu['employee_user'];
                            $employee_pass = $rowu['employee_pass'];
                            $employee_fname = $rowu['employee_fname'];
                            $employee_lname = $rowu['employee_lname'];
                            $employee_add = $rowu['employee_add'];
                            $employee_tel = $rowu['employee_tel'];
                            $employee_bird = $rowu['employee_bird'];
                            $employee_age = $rowu['employee_age'];
                            $employee_sex = $rowu['employee_sex'];
                            $type_id = $rowu['type_id'];
                            $employee_image = $rowu['employee_image'];
                            $company_id = $rowu['company_id'];
                        }
                    }
                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="employee_idcard" value="<?= $employee_idcard; ?>" />
                        <div class="form-group">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_user">ชื่อผู้ใช้งาน<span class="required">:</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="employee_user" name="employee_user" value="<?= $employee_user; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_pass">รหัสผ่าน<span class="required">:</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="employee_pass" name="employee_pass" value="<?= $employee_pass; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ชื่อพนักงาน<span class="required">:</span> </label>
                                <div class="row">
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <input type="text" name="employee_fname" required="required" placeholder="ชื่อ" value="<?= $employee_fname; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <input type="text" name="employee_lname" required="required" placeholder="นามสกุล" value="<?= $employee_lname; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company_id">บริษัท<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="company_id" name="company_id" required="required" class="form-control col-md-7 col-xs-12">
                                    <option value="" selected disabled>เลือกชื่อบริษัท</option>

                                    <?php
                                    $sqld = "SELECT * FROM `tb_company`";
                                    $rsd = $cls_conn->select_base($sqld);
                                    while ($rowd = mysqli_fetch_array($rsd)) {
                                    ?>
                                         <option <?php if ($company_id == $rowd['company_id']) { ?> selected="selected" <?php } ?> value='<?php echo $rowd['company_id']; ?>'>
                                                <?php echo $rowd['company_name'];  ?>
                                            </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_add">ที่อยู่<span class="required">:</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="employee_add" name="employee_add" required="required" value="<?= $employee_add; ?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_tel">เบอร์โทรศัพท์<span class="required">:</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="tel" id="employee_tel" name="employee_tel" required="required" value="<?= $employee_tel; ?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_bird">วันเกิด<span class="required">:</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" id="employee_bird" name="employee_bird" required="required" value="<?= $employee_bird; ?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_age">อายุ<span class="required">:</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="employee_age" name="employee_age" required="required" value="<?= $employee_age; ?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_sex">เพศ<span class="required">:</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="employee_sex" name="employee_sex" value="<?= $employee_sex; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                        <option value="หญิง" <?php if ($employee_sex == "หญิง") echo "selected"; ?>>หญิง</option>
                                        <option value="ชาย" <?php if ($employee_sex == "ชาย") echo "selected"; ?>>ชาย</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type_id">สถานะ<span class="required">:</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="type_id" name="type_id" required="required" class="form-control col-md-7 col-xs-12">
                                        <?php
                                        $admin = "แอดมิน";
                                        $sqld = "SELECT * FROM tb_type where type_name NOT LIKE '$admin'";
                                        $rsd = $cls_conn->select_base($sqld);
                                        while ($rowd = mysqli_fetch_array($rsd)) {
                                        ?>
                                            <option <?php if ($type_id == $rowd['type_id']) { ?> selected="selected" <?php } ?> value='<?php echo $rowd['type_id']; ?>'>
                                                <?php echo $rowd['type_name'];  ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_image">รูปประจำตัว<span class="required">:</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" id="employee_image" name="employee_image" value="<?= $employee_image; ?>" class="form-control col-md-7 col-xs-12">
                                    <div class="">
                                        <img src="../../upload/<?= $employee_image; ?>" alt="" width="100px" id="img" style="margin-top:10px;">
                                        <script>
                                            employee_image.onchange = evt => {
                                                const [file] = employee_image.files
                                                if (file) {
                                                    img.src = URL.createObjectURL(file)
                                                }
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
                                    <a onclick="gotoBack()" class="btn btn-danger">ยกเลิก</a>
                                    <script>
                                        function gotoBack() {
                                            window.location.href = "show_employee_em.php";

                                        }
                                    </script>
                                </div>
                            </div>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {

                        $employee_idcard = $_POST['employee_idcard'];
                        $employee_user = $_POST['employee_user'];
                        $employee_pass = $_POST['employee_pass'];
                        $employee_fname = $_POST['employee_fname'];
                        $employee_lname = $_POST['employee_lname'];
                        $employee_add = $_POST['employee_add'];
                        $employee_tel = $_POST['employee_tel'];
                        $employee_bird = $_POST['employee_bird'];
                        $employee_age = $_POST['employee_age'];
                        $employee_sex = $_POST['employee_sex'];
                        $type_id = $_POST['type_id'];
                        $company_id = $_POST['company_id'];


                        $sql = " update tb_employee";
                        $sql .= " set";
                        $sql .= " employee_user='$employee_user'";
                        $sql .= " ,employee_pass='$employee_pass'";
                        $sql .= " ,employee_fname='$employee_fname'";
                        $sql .= " ,employee_lname='$employee_lname'";
                        $sql .= " ,employee_add='$employee_add'";
                        $sql .= " ,employee_tel='$employee_tel'";
                        $sql .= " ,employee_bird ='$employee_bird'";
                        $sql .= " ,employee_age='$employee_age'";
                        $sql .= " ,employee_sex='$employee_sex'";
                        $sql .= " ,type_id='$type_id'";
                        $sql .= " ,company_id='$company_id'";

                        $employee_image = "";
                        if ($_FILES['employee_image']['name'] != "") {
                            $datetime = date("dmYHis");
                            $file_name = substr($_FILES['employee_image']['name'], -4);
                            $employee_image = $datetime . '_p1' . $file_name;
                            $target = "../../upload/" . $employee_image;
                            move_uploaded_file($_FILES['employee_image']['tmp_name'], $target);
                            $sql .= " ,employee_image='$employee_image";
                        }
                       
                        $sql .= " where";
                        $sql .= " employee_idcard='$employee_idcard'";
                        // die($sql);


                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
                            echo $cls_conn->goto_page(1, 'show_employee_em.php');
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