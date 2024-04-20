<?php include('class_conn.php'); 
session_start();  
$cls_conn=new class_conn;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="template_login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="template_login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="template_login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="template_login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('template_login/images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" method="post">
				<span class="login100-form-title p-b-37">
					เข้าสู่ระบบผู้จัดการ
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input class="input100" type="text" name="username" placeholder="username">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="password" placeholder="password">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" name="login" type="submit">
						เข้าสู่ระบบ
					</button>
				</div>

			<br>
				<div class="text-center">
					<a href="login_employee.php" class="txt2 hov1">
						เข้าสู่ระบบพนักงาน
					</a>
				</div>
			 
				<div class="text-center p-t-57 p-b-20">
					<span class="txt1">
						คุณยังไม่เป็นสมาชิกผู้ดูแลระบบ?
					</span>
				</div>

				
			</form>
				<?php
					if(isset($_POST['login']))
					{
					  		 $username=$_POST['username'];
                             $password=$_POST['password'];
							 
							 $sql_admin=" select * from tb_admin";
							 $sql_admin.=" where";
							 $sql_admin.=" admin_username='$username'";
							 $sql_admin.=" and";
							 $sql_admin.=" admin_password='$password'";
							 $num_admin=$cls_conn->select_numrows($sql_admin);
							
							 if ($num_admin >= 1) {
								$rs = $cls_conn->select_base($sql_admin);
								while ($row = mysqli_fetch_array($rs)) {
									$admin_id = $row['admin_id'];
									$admin_fname = $row['admin_fname'];
									$admin_lname = $row['admin_lname'];
									$admin_image = $row['admin_image'];
									$type_id = $row['type_id'];

									$_SESSION['admin_id'] = $admin_id;
									$_SESSION['admin_fname'] = $admin_fname;
									$_SESSION['admin_lname'] = $admin_fname;
									$_SESSION['admin_image'] = $admin_image;
									$_SESSION['type_id'] = $type_id;
									
								}
								if ($_SESSION['admin_id']) {
									echo $cls_conn->show_message('เข้าสู่ระบบแอดมิน'); 
									echo $cls_conn->goto_page(1, 'backend/admin/index.php');
								}
								
							} else {
								echo $cls_conn->show_message('Login Fail');
							}
							 
					}
								
					?>
				


			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="template_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="template_login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="template_login/vendor/bootstrap/js/popper.js"></script>
	<script src="template_login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="template_login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="template_login/vendor/daterangepicker/moment.min.js"></script>
	<script src="template_login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="template_login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="template_login/js/main.js"></script>

</body>
</html>
 