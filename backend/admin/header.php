<?php

include('../../class_conn.php');
session_start();
$cls_conn = new class_conn;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>บริษัทขนส่งภูเขียวจำกัด</title>
    <!-- Bootstrap -->
    <link href="../template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../template/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../template/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../template/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../template/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="../template/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../template/build/css/custom.min.css" rel="stylesheet">


    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js" integrity="sha256-Y16qmk55km4bhE/z6etpTsUnfIHqh95qR4al28kAPEU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css" integrity="sha256-sWZjHQiY9fvheUAOoxrszw9Wphl3zqfVaz1kZKEvot8=" crossorigin="anonymous">

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;" align="center"><img src="../../frontend/image/car.png" width="px" height="70px" /><span></span> </div>
                    <div class="clearfix"></div>
                    <!-- menu profile quick info -->
                    <div class="profile clearfix" style="margin-left:20px;">
                        <!-- <div class="profile_pic"> </div> -->
                        <?php if (!isset($_SESSION['admin_id']) && !isset($_SESSION['employee_id'])) {
                            echo $cls_conn->goto_page(0, '../../login.php')
                        ?>
                        <?php  } else if (isset($_SESSION['admin_id'])) { ?>

                            <div class="profile_info" style="text-align :center;"> <span>
                                    <h2>ยินดีต้อนรับคุณ</h2>
                                    <h4 style="font-weight: bold; color:white;"> <?= $_SESSION['admin_fname'] . " " . $_SESSION['admin_lname']; ?></h4>
                                </span>
                                <h2 style="text-align :center; font-size: 15px;"></h2>
                            </div>
                        <?php   } else if (isset($_SESSION['employee_id'])) { ?>
                            <div class="profile_info" style="text-align :center;"> <span>
                                    <h2>ยินดีต้อนรับคุณ </h2>
                                    <h4 style="font-weight: bold; color:white;"><?= $_SESSION['employee_fname'] . " " . $_SESSION['employee_lname']; ?></h4>
                                    <?php
                                            $company = $_SESSION['company_id'];
                                            $sql = "select company_name from tb_company where company_id = ' $company'";
                                            $rsd = $cls_conn->select_base($sql);
                                            $row = $rsd->fetch_array();
                                            $companyName = $row['company_name'];
                                    ?>
                                    <h5 style="font-weight: bold; color:white;">บริษัท : <?=$companyName;?></h5>
                                </span>
                            </div>
                        <?php  } else { ?>
                            <div class="profile_info" style="text-align :center;"> <span>
                                    <h2>ยินดีต้อนรับคุณ </h2>
                                    <h4 style="font-weight: bold; color:white;">ไม่พบผู้ใช้งาน</h4>
                                </span>
                                <h2 style="text-align :center; font-size: 15px;"></h2>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- /menu profile quick info -->
                    <br />
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">

                            <ul class="nav side-menu">

                                <?php

                                $id = $_SESSION['type_id'];
                                $sql_a = "select type_name from tb_type where type_id = '$id'";
                                $rsd = $cls_conn->select_base($sql_a);
                                $row = $rsd->fetch_assoc();
                                $type_id = $row['type_name'];
                                // echo $type_id;


                                if ($type_id === "ผู้จัดการ") { ?>
                                    <div class="">
                                        <p style="color:white; padding-left:15px;font-weight:bold;">ตำแหน่ง : <?= $type_id; ?></p>
                                    </div>
                                    <li><a><i class="fa fa-user"></i>ข้อมูลผู้จัดการ<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="insert_admin.php"><i class="fa fa-plus"></i>เพิ่มข้อมูลผู้จัดการ</a></li>
                                            <li><a href="show_admin.php"><i class="fa fa-file-text"></i>แสดงข้อมูลผู้จัดการ</a></li>
                                        </ul>
                                    </li>

                                    <li><a><i class="fa fa-male"></i>ข้อมูลพนักงาน<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="insert_employee.php"><i class="fa fa-plus"></i>เพิ่มข้อมูลพนักงาน</a></li>
                                            <li><a href="show_employee.php"><i class="fa fa-file-text"></i>แสดงข้อมูลพนักงาน</a></li>
                                        </ul>
                                    </li>

                                    <li><a><i class="fa fa-group"></i>ข้อมูลสมาชิก<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <!-- <li><a href="insert_user.php"><i class="fa fa-plus"></i>เพิ่มข้อมูลสมาชิก</a></li> -->
                                            <li><a href="show_user.php"><i class="fa fa-file-text"></i>แสดงข้อมูลสมาชิก</a></li>
                                        </ul>
                                    </li>

                                    

                                    <li><a><i class="fa fa-bus"></i>ข้อมูลรถตู้<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="insert_carservice.php"><i class="fa fa-plus"></i>เพิ่มข้อมูลรถตู้</a></li>
                                            <li><a href="show_carservice.php"><i class="fa fa-file-text"></i>แสดงข้อมูลรถตู้</a></li>
                                        </ul>
                                    </li>


                                    <li><a><i class="fa fa-tasks"></i>ข้อมูลบริษัท<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="insert_company.php"><i class="fa fa-plus"></i>เพิ่มข้อมูลบริษัท</a></li>
                                            <li><a href="show_company.php"><i class="fa fa-file-text"></i>แสดงข้อมูลบริษัท</a></li>
                                        </ul>
                                    </li>

                                

                                    <li><a><i class="fa fa-building"></i>ข้อมูลสถานี<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="insert_station_origin.php"><i class="fa fa-plus"></i>เพิ่มข้อมูลสถานี</a></li>
                                            <li><a href="show_station_origin.php"><i class="fa fa-file-text"></i>แสดงข้อมูลสถานี</a></li>
                                            <hr>


                                            <li><a href="insert_station.php"><i class="fa fa-plus"></i>เพิ่มข้อมูลตารางเวลาเดินรถ</a></li>

                                            <li><a href="show_timestaion.php"><i class="fa fa-file-text"></i>แสดงข้อมูลตารางเวลาเดินรถ</a></li>
                                            <hr>
                                            <li><a href="insert_station.php"><i class="fa fa-plus"></i>เพิ่มข้อมูลตารางรายการตารางเวลาเดินรถ</a></li>

                                            <li><a href="show_station.php"><i class="fa fa-file-text"></i>แสดงข้อมูลตารางรายการตารางเวลาเดินรถ</a></li>
                                        </ul>
                                    </li>

                                    <!-- <li><a><i class="fa fa-cube"></i>ข้อมูลฝากพัสดุ<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu"> -->
                                            <!-- <li><a href="insert_package.php"><i class="fa fa-plus"></i>เพิ่มข้อมูลฝากพัสดุ</a></li> -->
                                            <!-- <li><a href="show_package.php"><i class="fa fa-file-text"></i>แสดงข้อมูลฝากพัสดุ</a></li>
                                        </ul>
                                    </li> -->


                                    <li><a><i class="fa fa-ticket"></i>ข้อมูลการจองตั๋วรถ<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <!-- <li><a href="insert_reserve.php"><i class="fa fa-plus"></i>เพิ่มข้อมูลการจองตั๋วรถ</a></li> -->

                                            <li><a href="show_tickets.php"><i class="fa fa-file-text"></i>แสดงข้อมูลการจองตั๋วรถ</a></li>
                                            <li><a href="show_cancel.php"><i class="fa fa-file-text"></i>แสดงข้อมูลการยกเลิกจองตั๋ว</a></li>
                                        </ul>
                                    </li>

                                    <li><a><i class="fa fa-money"></i>ข้อมูลชำระเงิน<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">


                                            <li><a href="show_payment.php"><i class="fa fa-file-text"></i>แสดงข้อมูลชำระเงิน</a></li>
                                            <li><a href="payment_history_admin.php"><i class="fa fa-file-text"></i>ประวัติข้อมูลชำระเงิน</a></li>


                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-book"></i>รายงานตามเงื่อนไข<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">


                                            <li><a href="reports_dmy.php"><i class="fa fa-file-text"></i>รายได้รวมของการเดินรถ วัน เดือน ปี</a></li>
                                            <li><a href="reports_car.php"><i class="fa fa-file-text"></i>รายได้ของรถตามทะเบียนรถ</a></li>


                                        </ul>
                                    </li>




                                <?php  } else {
                                ?>
                                    <div class="">
                                        <p style="color:white; padding-left:15px;font-weight:bold;">ตำแหน่ง : <?= $type_id; ?></p>
                                    </div>

                                    <li><a><i class="fa fa-male"></i>ข้อมูลผู้ใช้งาน<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="insert_employee_em.php"><i class="fa fa-plus"></i>เพิ่มข้อมูลผู้ใช้งาน</a></li>
                                            <li><a href="show_employee_em.php"><i class="fa fa-file-text"></i>แสดงข้อมูลผู้ใช้งาน</a></li>
                                        </ul>
                                    </li>

                                    <li><a><i class="fa fa-group"></i>ข้อมูลสมาชิก<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <!-- <li><a href="insert_user.php"><i class="fa fa-plus"></i>เพิ่มข้อมูลสมาชิก</a></li> -->
                                            <li><a href="show_user.php"><i class="fa fa-file-text"></i>แสดงข้อมูลสมาชิก</a></li>
                                        </ul>
                                    </li>



                                    <li><a><i class="fa fa-bus"></i>ข้อมูลรถตู้<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="insert_carservice.php"><i class="fa fa-plus"></i>เพิ่มข้อมูลรถตู้</a></li>
                                            <li><a href="show_carservice_em.php"><i class="fa fa-file-text"></i>แสดงข้อมูลรถตู้</a></li>
                                        </ul>
                                    </li>

                                    <li><a><i class="fa fa-building"></i>ข้อมูลสถานี<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="insert_station_origin.php"><i class="fa fa-plus"></i>เพิ่มข้อมูลสถานี</a></li>
                                            <li><a href="show_station_origin.php"><i class="fa fa-file-text"></i>แสดงข้อมูลสถานี</a></li>
                                            <hr>


                                            <li><a href="insert_station.php"><i class="fa fa-plus"></i>เพิ่มข้อมูลตารางเวลาเดินรถ</a></li>

                                            <li><a href="show_timestaion.php"><i class="fa fa-file-text"></i>แสดงข้อมูลตารางเวลาเดินรถ</a></li>
                                            <hr>
                                            <li><a href="insert_station.php"><i class="fa fa-plus"></i>เพิ่มข้อมูลตารางรายการตารางเวลาเดินรถ</a></li>

                                            <li><a href="show_station.php"><i class="fa fa-file-text"></i>แสดงข้อมูลตารางรายการตารางเวลาเดินรถ</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-cube"></i>ข้อมูลฝากพัสดุ<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <!-- <li><a href="insert_package.php"><i class="fa fa-plus"></i>เพิ่มข้อมูลฝากพัสดุ</a></li> -->

                                            <li><a href="show_package_em.php"><i class="fa fa-file-text"></i>แสดงข้อมูลฝากพัสดุ</a></li>


                                        </ul>
                                    </li>


                                    <li><a><i class="fa fa-ticket"></i>ข้อมูลการจองตั๋วรถ<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <!-- <li><a href="insert_reserve.php"><i class="fa fa-plus"></i>เพิ่มข้อมูลการจองตั๋วรถ</a></li> -->

                                            
                                            <li><a href="show_tickets_em.php"><i class="fa fa-file-text"></i>แสดงข้อมูลการจองตั๋วรถ</a></li>
                                            <li><a href="show_cancel.php"><i class="fa fa-file-text"></i>แสดงข้อมูลการยกเลิกจองตั๋ว</a></li>
                                        </ul>
                                    </li>

                                    <li><a><i class="fa fa-money"></i>ข้อมูลชำระเงิน<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="show_payment_em.php"><i class="fa fa-file-text"></i>แสดงข้อมูลชำระเงิน</a></li>
                                            <li><a href="payment_history.php"><i class="fa fa-file-text"></i>ประวัติข้อมูลชำระเงิน</a></li>

                                        </ul>
                                    </li>


                                <?php    } ?>


                                







                            </ul>
                        </div>
                    </div>
                 
                </div>
            </div>
            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle"> <a id="menu_toggle"><i class="fa fa-bars"></i></a> </div>
                        <ul class="nav navbar-nav navbar-right" style="padding: 3px 0 3px 0;">
                            <li class="" style="display: grid;grid-template-columns: 60px 60px;">
                                <?php if (isset($_SESSION['admin_id'])) { ?>
                                    <span><img src="../../upload/<?= $_SESSION['admin_image']; ?>" style="width:50px;height:50px;border-radius: 50%;"></span>
                                    <span style="padding-top: 20px;">
                                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span class=" fa fa-angle-down" style="font-size: 23px;"></span> </a>
                                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                                            <li><a href="editProfile_admin.php">แก้ไขข้อมูลส่วนตัว</a></li>
                                            <li><a href="logout.php"><i class="fa fa-sign-out"></i>ออกจากระบบ</a></li>
                                    </span>
                                <?php } else if (isset($_SESSION['employee_id'])) { ?>
                                    <span><img src="../../upload/<?= $_SESSION['employee_image']; ?>" style="width:50px;height:50px;border-radius: 50%;"></span>
                                    <span style="padding-top: 20px;">
                                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span class=" fa fa-angle-down" style="font-size: 23px;"></span> </a>
                                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                                            <li><a href="editProfile_employee.php">แก้ไขข้อมูลส่วนตัว</a></li>
                                            <li><a href="logout.php"><i class="fa fa-sign-out"></i>ออกจากระบบ</a></li>
                                    </span>
                                <?php } else { ?>
                                    <span>ไม่พบผู้ใช้งาน</span>
                                    <span style="padding-top: 20px;">
                                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span class=" fa fa-angle-down" style="font-size: 23px;"></span> </a>
                                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    </span>
                                <?php } ?>
                            </li>
                        </ul>

                    </nav>
                </div>
            </div>