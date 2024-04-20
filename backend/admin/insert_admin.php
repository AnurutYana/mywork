<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>ข้อมูลผู้ดูแลระบบ</h2>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="flname">ชื่อผู้ดูแลระบบ<span class="required">:</span> </label>
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <input type="text" name="admin_fname" required="required" placeholder="ชื่อ" class="form-control col-md-7 col-xs-12">
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <input type="text" name="admin_lname" required="required" placeholder="นามสกุล" class="form-control col-md-7 col-xs-12">
                                </div>

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_email">อีเมลดูแลระบบ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="admin_email" name="admin_email" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_tel">เบอร์โทรศัพท์ผู้ดูแลระบบ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="tel" id="admin_tel" name="admin_tel" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_username">ชื่อผู้ใช้งาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="admin_username" name="admin_username" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_password">รหัสผ่าน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="admin_password" name="admin_password" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_image">รูปประจำตัว<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" id="admin_image" name="admin_image" required="required" class="form-control col-md-7 col-xs-12">
                                <img src="../../upload/" alt="" width="100px" id="img" style="margin-top:10px;">
                                <script>
                                    admin_image.onchange = evt => {
                                        const [file] = admin_image.files
                                        if (file) {
                                            img.src = URL.createObjectURL(file)
                                        }
                                    }
                                </script>
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
                        $admin_fname = $_POST['admin_fname'];
                        $admin_lname = $_POST['admin_lname'];
                        $admin_email = $_POST['admin_email'];
                        $admin_tel = $_POST['admin_tel'];
                        $admin_username = $_POST['admin_username'];
                        $admin_password = $_POST['admin_password'];

                        if ($_FILES['admin_image']['name'] != "") {
                            $datetime = date("dmYHis");
                            $file_name = substr($_FILES['admin_image']['name'], -4);
                            $admin_image = $datetime . '_p1' . $file_name;
                            $target = "../../upload/" . $admin_image;
                            move_uploaded_file($_FILES['admin_image']['tmp_name'], $target);
                        }

                        $type = "แอดมิน";
                        $sql_type = "SELECT `type_id` FROM `tb_type` WHERE `type_name` = '$type'";
                        $result = $cls_conn->select_base($sql_type);
                        $row = $result->fetch_assoc();
                        $type_admin = $row['type_id'];

                        $check = "select * from tb_admin where admin_email = '$admin_email' and admin_username = '$admin_username'";
                        $res = $cls_conn->select_base($check);
                        if ($res->num_rows >= 1) {
                            echo $cls_conn->show_message('มีผู้ใช้งานอีเมลหรือยูสเซอร์เนมนี้แล้ว กรุณาสมัครสมาชิกใหม่');
                        } else {

                            $sql = " insert into `tb_admin`(`admin_fname`, `admin_lname`, `admin_email`, `admin_tel`, `admin_username`, `admin_password`, `admin_image`,`type_id`)";
                            $sql .= " values ('$admin_fname','$admin_lname','$admin_email','$admin_tel','$admin_username','$admin_password','$admin_image','$type_admin')";
                            // die($sql);

                            if ($cls_conn->write_base($sql) == true) {
                                echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(1, 'show_admin.php');
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