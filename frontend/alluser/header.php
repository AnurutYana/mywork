<?php include('../../class_conn.php');
session_start();
$cls_conn = new class_conn;

?>

<!DOCTYPE html>
<html>

<head>
    <title>Index</title>
    <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function() {
            null
        };
    </script>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js" integrity="sha256-Y16qmk55km4bhE/z6etpTsUnfIHqh95qR4al28kAPEU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css" integrity="sha256-sWZjHQiY9fvheUAOoxrszw9Wphl3zqfVaz1kZKEvot8=" crossorigin="anonymous">

    <link href="../template/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../template/js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="../template/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="New Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--fonts-->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <!--//fonts-->
    <!-- start menu -->
    <link href="../template/css/memenu.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="../template/js/memenu.js"></script>

    <script src="../template/js/simpleCart.min.js"></script>


</head>

<body>
    <!--header-->
    <div class="header">
        <div class="header-top">
            <div class="container">
                <div class="header-left">
                    <?php

                    if (!isset($_SESSION['user_id'])) {  ?>
                        <ul>
                            <li><a href="login.php">เข้าสู่ระบบ</a></li>
                            <li><a href="register.php">สมัครสมาชิก</a></li>
                            <li>
                            </li>
                        </ul>
                    <?php  } else { ?>
                        <ul>
                            <li><span style="color: #F9843D  ;">ยินดีต้อนรับ</span>&nbsp;<span style="color:#F9843D  ;"><?= $_SESSION['user_fname']; ?>.<?= $_SESSION['user_surname']; ?>&nbsp;</span></li>
                            <li><a href="logout.php" onclick="return confirm('ยืนยันการออกจากระบบ')">ออกจากระบบ</a></li>
                            <li>
                            </li>
                        </ul>
                    <?php  } ?>

                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="container">
            <div class="head-top">
                <div class="logo">
                    <a href="index.php"><img src="../../upload/<?= $company_logo; ?>" alt=""></a>
                </div>
                <div class=" h_menu4">
                    <ul class="memenu skyblue">
                        <li class="active grid"><a class="color8" href="index.php">จองตั๋ว</a></li>

                        <li><a class="color4" href="payment.php">วิธีการชำระเงิน</a></li>
                        <li><a class="color4" href="show_payment.php">รายการจองตั๋ว</a></li>
                        <?php if (!isset($_SESSION['user_id'])) { ?>
                        <?php  } else { ?>
                            
                        <li><a class="color4" href="history_payment.php">ประวัติการชำระเงิน</a></li>
                        <?php  } ?>
                        <li><a class="color6" href="contact.php">ติดต่อเรา</a></li>
                        

                    </ul>
                </div>

                <div class="clearfix"> </div>
            </div>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $(".memenu").memenu();
        });
    </script>