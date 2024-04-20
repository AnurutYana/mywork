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
					เข้าสู่ระบบพนักงาน
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
					<a onclick="goback()" class="txt2 hov1" style="cursor: pointer">กลับหน้าแรก</a>		
					</a>
                    
                        <script>
                          function goback() {
                            window.history.back();
                          }
                        </script>
				</div>
			 
			</form>
				<?php
					if(isset($_POST['login']))
					{
					  		 $username=$_POST['username'];
                             $password=$_POST['password'];
							 
							 $sql_employee=" select * from tb_employee";
							 $sql_employee.=" where";
							 $sql_employee.=" employee_user='$username'";
							 $sql_employee.=" and";
							 $sql_employee.=" employee_pass='$password'";
							 $num_employee=$cls_conn->select_numrows($sql_employee);
							 
							 if ($num_employee >= 1) {
								$rs = $cls_conn->select_base($sql_employee);
								while ($row = mysqli_fetch_array($rs)) {
									$employee_id = $row['employee_id'];
									$employee_fname = $row['employee_fname'];
									$employee_lname = $row['employee_lname'];
									$employee_image = $row['employee_image'];
									$type_id = $row['type_id'];
									$company_id = $row['company_id'];
									

									$_SESSION['employee_id'] = $employee_id;
									$_SESSION['employee_fname'] = $employee_fname;
									$_SESSION['employee_lname'] = $employee_fname;
									$_SESSION['employee_image'] = $employee_image;
									$_SESSION['type_id'] = $type_id;
									$_SESSION['company_id'] = $company_id;
									
								}
								if ($_SESSION['employee_id']) {
									echo $cls_conn->show_message('เข้าสู่ระบบพนักงาน'); 
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
 