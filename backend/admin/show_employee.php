
<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แสดงข้อมูลพนักงาน</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        <div align="right">
                            <a href="insert_employee.php">
                                <button>เพิ่มข้อมูล</button>
                            </a>
                        </div>
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>รหัสบัตรประชาชนผู้ใช้งาน</th>
                                    <th>รหัสผู้ใช้งาน</th>
                                    <th>ชื่อผู้ใช้</th>
                                    <th>รหัสผ่าน</th>
                                    <th>ชื่อ</th>
                                    <th>นามสกุล</th>
                                    <th>ที่อยู่</th>
                                    <th>เบอร์โทร</th>
                                    <th>วันเกิด</th>
                                    <th>อายุ</th>
                                    <th>เพศ</th>
                                    <th>ตำแหน่ง</th>
                                    <th>รูปประจำตัว</th>
                                    <th>บริษัท</th>
                                    
                                    
                                    
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                             $sql="SELECT *,t.type_name FROM tb_employee p join tb_type t on t.type_id = p.type_id WHERE p.employee_idcard" ;
                             $result=$cls_conn->select_base($sql);
                             while($row=mysqli_fetch_array($result))
                             {
                                 ?>
                                <td>
                                    <?= $row['employee_idcard']; ?>
                                </td>
                                <td>
                                    <?= $row['employee_id']; ?>
                                </td>           
                                <td>
                                    <?= $row['employee_user']; ?>
                                </td>       
                                <td>
                                    <?= $row['employee_pass']; ?>
                                </td>                        
                                <td>
                                    <?= $row['employee_fname']; ?>
                                </td>
                                <td>
                                    <?= $row['employee_lname']; ?>
                                </td>
                                <td>
                                    <?= $row['employee_add']; ?>
                                </td>
                                <td>
                                    <?= $row['employee_tel']; ?>
                                </td>
                                <td>
                                    <?= $row['employee_bird']; ?>
                                </td>
                                <td>
                                    <?= $row['employee_age']; ?>
                                </td>

                                <td>
                                    <?= $row['employee_sex']; ?>
                                </td>
                                
                                <td>
                                    <?= $row['type_name']; ?>
                                </td>

                                <td>
                                <img src="../../upload/<?= $row['employee_image'];?>" style="width:50px;height:50px;border-radius: 50%;">
                                </td>
                                <td>
                                    <?= $row['company_id']; ?>
                                </td>

                                        <td>
                                            <a href="update_employee.php?id=<?=$row['employee_idcard'];?>" onclick="return confirm('คุณต้องการแก้ไขหรือไม่?')"><img src="../../frontend/image/edit.png" /></a>
                                        </td>
                                        <td>
                                            <a href="delete_employee.php?id=<?=$row['employee_idcard'];?>" onclick="return confirm('คุณต้องการลบหรือไม่?')"><img src="../../frontend/image/delete.png" /></a>
                                        </td>
                                    </tr>
                                    <?php
                             }
                          ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>

    </div>


    <?php include('footer.php');?>

