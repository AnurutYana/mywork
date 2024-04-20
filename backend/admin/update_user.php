<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แก้ไขข้อมูลสมาชิก</h2>
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
                        $sqlu = " select * from tb_user";
                        $sqlu .= " where";
                        $sqlu .= " user_id='$id'";
                        $resultu = $cls_conn->select_base($sqlu);
                        while ($rowu = mysqli_fetch_array($resultu)) {
                            $user_id = $rowu['user_id'];
                            $user_email  = $rowu['user_email'];
                            $user_fname = $rowu['user_fname'];
                            $user_surname  = $rowu['user_surname'];
                            $user_line  = $rowu['user_line'];
                            $user_tel = $rowu['user_tel'];
                            $user_birthday = $rowu['user_birthday'];
                            $user_sex = $rowu['user_sex'];
                            $user_idcard = $rowu['user_idcard'];
                           
                        }
                    }
                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="user_id" value="<?= $user_id; ?>" />
                        <div class="form-group">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_email">อีเมลล์<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="email" id="user_email" name="user_email" required="required" value="<?=$user_email;?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_user	">ชื่อผู้ใช้<span class="required">:</span> </label>
                            <div class="row">
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <input type="text" name="user_fname" required="required" placeholder="ชื่อ" value="<?= $user_fname; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>

                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <input type="text" name="user_surname" required="required" placeholder="นามสกุล" value="<?= $user_surname; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_line">ID Line<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="user_line" name="user_line" required="required" value="<?=$user_line;?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_tel">เบอร์โทร<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="tel" id="user_tel" name="user_tel" required="required" value="<?=$user_tel;?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_birthday">วันเกิด<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="user_birthday" name="user_birthday" required="required" value="<?=$user_birthday;?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_sex">เพศ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="user_sex" name="user_sex" value="<?= $user_sex; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                    <option value="หญิง" <?php if($user_sex = "หญิง") echo "selected"; ?>>หญิง</option>
                                    <option value="ชาย" <?php if($user_sex = "ชาย") echo "selected"; ?>>ชาย</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_idcard">บัตรประชาชน <span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="txet" id="user_idcard" name="user_idcard" value="<?=$user_idcard;?>" required="required" class="form-control col-md-7 col-xs-12" readonly>
                            </div>
                        </div>




                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
                                <a onclick="gotoBack()" class="btn btn-danger">ยกเลิก</a>
                                    <script>
                                        function gotoBack() {
                                            window.location.href = "show_user.php";

                                        }
                                    </script>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                            $user_id = $_POST['user_id'];
                            $user_email  = $_POST['user_email'];
                            $user_fname = $_POST['user_fname'];
                            $user_surname  = $_POST['user_surname'];
                            $user_line  = $_POST['user_line'];
                            $user_tel = $_POST['user_tel'];
                            $user_birthday = $_POST['user_birthday'];
                            $user_sex = $_POST['user_sex'];
                            $user_idcard = $_POST['user_idcard'];


                        $sql = "UPDATE `tb_user` SET `user_email`='$user_email',`user_fname`='$user_fname',
                        `user_surname`='$user_surname',`user_line`='$user_line',`user_tel`='$user_tel',`user_birthday`='$user_birthday',`user_sex`='$user_sex',
                        `user_idcard`='$user_idcard' WHERE user_id='$user_id'";

                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
                            echo $cls_conn->goto_page(1, 'show_user.php');
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