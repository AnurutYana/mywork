<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>แสดงข้อมูลสมาชิก </h2>
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
                    <!-- <a href="insert_user.php">
                        <button>เพิ่มข้อมูล</button>
                    </a> -->
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>เลขประจำตัวประชาชน</th>
                            <th>รหัสสมาชิก</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>เพศ</th>
                            <th>วันเกิด</th>
                            <th>เบอร์โทร</th>
                            <th>ID Line</th>
                            <th>ชื่อผู้ใช้สมาชิก</th>
                            <th>รหัสผู้ใช้สมาชิก</th>

                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        $sql = " select * from tb_user";
                        $result = $cls_conn->select_base($sql);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                 <td>
                                    <?= $row['user_idcard']; ?>
                                </td>
                                <td>
                                    <?= $row['user_id']; ?>
                                </td>
                                <td>
                                    <?= $row['user_fname']; ?>
                                </td>
                                <td>
                                    <?= $row['user_surname']; ?>
                                </td>
                                <td>
                                    <?= $row['user_sex']; ?>
                                </td>
                                <td>
                                    <?= $row['user_birthday']; ?>
                                </td>
                                <td>
                                    <?= $row['user_tel']; ?>
                                </td>
                                <td>
                                    <?= $row['user_line']; ?>
                                </td>
                                <td>
                                    <?= $row['user_email']; ?>
                                </td>
                                <td>
                                    <?= $row['user_pass']; ?>
                                </td>
                                <td>
                                    <a href="update_user.php?id=<?= $row['user_id']; ?>" onclick="return confirm('คุณต้องการแก้ไขหรือไม่?')"><img src="../../frontend/image/edit.png" /></a>
                                </td>
                                <td>
                                    <a href="delete_user.php?id=<?= $row['user_id']; ?>" onclick="return confirm('คุณต้องการลบหรือไม่?')"><img src="../../frontend/image/delete.png" /></a>
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


<?php include('footer.php'); ?>