<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แก้ไขผู้ดูแลระบบ</h2>
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
                        $sqlu = " select * from tb_admin";
                        $sqlu .= " where";
                        $sqlu .= " admin_id='$id'";
                        $resultu = $cls_conn->select_base($sqlu);
                        while ($rowu = mysqli_fetch_array($resultu)) {
                            $admin_id = $rowu['admin_id'];
                            $admin_fname = $rowu['admin_fname'];
                            $admin_lname = $rowu['admin_lname'];
                            $admin_email = $rowu['admin_email'];
                            $admin_tel = $rowu['admin_tel'];
                            $admin_username = $rowu['admin_username'];
                            $admin_password = $rowu['admin_password'];
                            $admin_image = $rowu['admin_image'];
                            
                        }
                    }
                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="admin_id" value="<?= $admin_id; ?>" />

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="flname">ชื่อผู้ดูแลระบบ<span class="required">:</span> </label>
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <input type="text" name="admin_fname" required="required" placeholder="ชื่อ" value="<?= $admin_fname;?>" class="form-control col-md-7 col-xs-12">
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <input type="text" name="admin_lname" required="required" placeholder="นามสกุล" value="<?= $admin_fname;?>" class="form-control col-md-7 col-xs-12">
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_email">อีเมลดูแลระบบ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="admin_email" name="admin_email" value="<?= $admin_email; ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_tel">เบอร์โทรศัพท์ผู้ดูแลระบบ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="tel" id="admin_tel" name="admin_tel" value="<?= $admin_tel; ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_username">ชื่อผู้ใช้งาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="admin_username" name="admin_username" value="<?= $admin_username; ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_password">รหัสผ่าน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="admin_password" name="admin_password" value="<?= $admin_password; ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_image">รูปประจำตัว<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" id="admin_image" name="admin_image"  value="<?= $admin_image;?>"class="form-control col-md-7 col-xs-12">
                                <img src="../../upload/<?= $admin_image;?>" alt="" width="100px" id="img" style="margin-top:10px;">
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
                                <a onclick="back()" class="btn btn-danger">ยกเลิก</a>
                                <script>
                                    function back() {
                                        window.location.href = "show_admin.php";
                                    }
                                </script>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        $admin_id = $_POST['admin_id'];
                        $admin_fname = $_POST['admin_fname'];
                        $admin_lname = $_POST['admin_lname'];
                        $admin_email = $_POST['admin_email'];
                        $admin_tel = $_POST['admin_tel'];
                        $admin_username = $_POST['admin_username'];
                        $admin_password = $_POST['admin_password'];
                        $sql .= " ,admin_image='$admin_image'";
                        
                        $admin_image="";
                        if ($_FILES["admin_image"]["name"] != "") {
                            $datetime = date("dmYHis");
                            $file_name = substr($_FILES['admin_image']['name'], -4);
                            $admin_image = $datetime . '_p1' . $file_name;
                            move_uploaded_file($_FILES["admin_image"]["tmp_name"], "../../upload/" . $admin_image);
                            $sql .= " ,admin_image='$admin_image'";
                        }


                        $sql = " update tb_admin";
                        $sql .= " set";
                        $sql .= " admin_fname='$admin_fname'";
                        $sql .= " ,admin_lname='$admin_lname'";
                        $sql .= " ,admin_email='$admin_email'";
                        $sql .= " ,admin_tel='$admin_tel'";
                        $sql .= " ,admin_username='$admin_username'";
                        $sql .= " ,admin_password='$admin_password'";
                        $sql .= " ,admin_image='$admin_image'";
                      
                        $sql .= " where";
                        $sql .= " admin_id='$admin_id'";
                       

                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
                            echo $cls_conn->goto_page(1, 'show_admin.php');
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