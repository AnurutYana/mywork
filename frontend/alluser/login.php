<?php include('header.php'); ?>


<!--content-->
<div class="container">
    <div class="account">
        <h1>Login</h1>
        <div class="account-pass">
            <div class="col-md-8 account-top">
                <form method="post" action="login.php">

                    <div>
                        <span>Email</span>
                        <input type="text" name="user_email">
                    </div>
                    <div>
                        <span>Password</span>
                        <input type="password" name="user_pass">
                    </div>
                    <input type="submit" name="submit" value="Login">
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    $user_email = $_POST['user_email'];
                    $user_pass = $_POST['user_pass'];

                    $sql_user = " select * from tb_user";
                    $sql_user .= " where user_email='$user_email'";
                    $sql_user .= " and user_pass='$user_pass'";
                    
                    $numrow_user = $cls_conn->select_numrows($sql_user);
                    if ($numrow_user >= 1) {
                        $result_user = $cls_conn->select_base($sql_user);
                        while ($row_user = mysqli_fetch_array($result_user)) {
                            $user_id = $row_user['user_id'];
                            $user_email = $row_user['user_email'];
                            $user_fname = $row_user['user_fname'];
                            $user_surname = $row_user['user_surname'];
                            $user_idcard = $row_user['user_idcard'];
                            $user_tel = $row_user['user_tel'];

                            $_SESSION['user_id'] = $user_id;
                            $_SESSION['user_email'] = $user_email;
                            $_SESSION['user_fname'] = $user_fname;
                            $_SESSION['user_surname'] = $user_surname;
                            $_SESSION['user_idcard'] = $user_idcard;
                            $_SESSION['user_tel'] = $user_tel;

                            if($_SESSION['user_idcard']){
                                echo $cls_conn->show_message("ยินดีต้อนรับ:" . $user_fname . "" . $user_surname . "เข้าสู่ระบบ");
                                echo $cls_conn->goto_page(1, 'index.php');
                            }else{
                                echo $cls_conn->show_message('ไม่พบผู้ใช้งานนี้');
                            }
                        }
                       
                    } else {
                        echo $cls_conn->show_message('ไม่พบผู้ใช้งานนี้');
                    }
                }

                ?>
            </div>
            <div class="col-md-4 left-account ">
                <p>
                    <center><img src="../../image/car.png" </center>
                </p>

                <a href="register.php" class="create">สมัครสมาชิก</a>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

</div>

<!--//content-->
<?php include('footer.php'); ?>