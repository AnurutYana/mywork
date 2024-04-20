<?php include('header.php'); ?>

<style>
    .error {
        color: #F00;
    }

    .error.true {
        color: #6bc900;
    }
</style>

<!--content-->
<div class=" container">
    <div class=" register">
        <h1>สมัครสมาชิก</h1>
        <form name="register.php" method="post" action="register.php">
            <div class="col-md-6 register-top-grid">
                <h3>ประวัติส่วนตัว</h3>
                <div>
                    <span class="error">หมายเลขบัตรประชาชน</span>
                    <input type="text" name="user_idcard" id="user_idcard" class="form-control" maxlength="13">
                </div>
                <div>
                    <span>ชื่อ</span>
                    <input type="text" name="user_fname" class="form-control">
                </div>
                <div>
                    <span>นามสกุล</span>
                    <input type="text" name="user_surname" class="form-control">
                </div>
                <div>
                    <span>เพศ</span>
                    <select name="user_sex" id="user_sex" class="form-control">
                        <option value="ชาย">ชาย</option>
                        <option value="หญิง">หญิง</option>
                        <option value="ไม่ระบุ">ไม่ระบุ</option>
                    </select>
                </div>
                <div>
                    <span>วันเกิด</span>
                    <input type="date" name="user_birthday" class="form-control">
                </div>
                <div>
                    <span>เบอร์โทรศัพท์</span>
                    <input type="text" name="user_tel" class="form-control">
                </div>
                <div>
                    <span>line</span>
                    <input type="text" name="user_line" class="form-control">
                </div>


            </div>
            <div class="col-md-6 register-bottom-grid">
                <h3>ข้อมูลเข้าสู่ระบบ</h3>
                <div class="register-top-grid">
                    <span>Email</span>
                    <input type="text" name="user_email" class="form-control">
                </div>
                <div class="register-bottom-grid">
                    <span>Password</span>
                    <input type="password" name="user_pass" class="form-control">
                </div>
                <input type="submit" name="submit" value="Register">
            </div>
            
            
            
            <!-- <div class="clearfix"> </div>
            <div class=""  >
                <p style="padding-top:10px; padding-left:10px;font-size:20px;fotn-weight:bold;">แสกนคิวอาร์โค้ดไลน์ที่นี่ เพื่อรับการแจ้งเตือน</p>
                <img src="../image/qrcode.jpg" alt="" width="200px">
            </div> -->
        </form>
        
        <?php

        if (isset($_POST['submit'])) {

            $user_fname = $_POST['user_fname'];
            $user_surname = $_POST['user_surname'];
            $user_idcard = $_POST['user_idcard'];
            $user_sex = $_POST['user_sex'];
            $user_birthday = $_POST['user_birthday'];
            $user_tel = $_POST['user_tel'];
            $user_line = $_POST['user_line'];
            $user_email = $_POST['user_email'];
            $user_pass = $_POST['user_pass'];

            $error = 0;
            $sql_check_email = " select * from tb_user";
            $sql_check_email .= " where user_email='$user_email'";
            $numrowemail = $cls_conn->select_numrows($sql_check_email);

            if ($numrowemail >= 1) {
                $error = 1;
                echo $cls_conn->show_message('มีผู้ใช้งานนี้แล้ว');
            }

            if ($error == 0) {
               $sql = "INSERT INTO `tb_user`(`user_email`, `user_pass`, `user_fname`, `user_surname`, `user_line`, `user_tel`, `user_birthday`, `user_sex`, `user_idcard`) VALUES 
               ('$user_email','$user_pass','$user_fname','$user_surname','$user_line','$user_tel','$user_birthday','$user_sex','$user_idcard')";
                // die($sql);

                if ($cls_conn->write_base($sql)) {

                    echo $cls_conn->show_message('สมัครสมาชิกเรียบร้อย');
                    echo $cls_conn->goto_page(1, 'login.php');
                }
            }
        }

        ?>
    </div>
</div>
<script src="js/idcard.js"></script>
<?php include('footer.php'); ?>