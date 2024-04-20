<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>แสดงข้อมูลตารางข้อมูลรถตู้  </h2>
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
                    <a href="insert_carservice.php">
                        <button>เพิ่มข้อมูล</button>
                    </a>
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>หมายเลขทะเบียนรถ</th>
                            <th>รหัสรถ</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>ยี่ห้อ</th>
                            <th>หมายเลขรถ</th>
                            
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        $sql = " select * , company_name from tb_carservice c join tb_company  where c.carservice_id";
                        $result = $cls_conn->select_base($sql);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td>
                                    <?= $row['carservice_vehicle']; ?>
                                </td>
                                <td>
                                    CAR<?= $row['carservice_id']; ?>
                                </td>
                                <td>
                                    <?= $row['carservice_fname']." ".$row['carservice_lname']; ?>
                                </td>
                                <td>
                                    <?= $row['carservice_brand']; ?>
                                </td>
                                <td>
                                    <?= $row['carservice_number']; ?>
                                </td>
                                    
                                <td>
                                    <a href="update_carservice.php?id=<?= $row['carservice_id']; ?>" onclick="return confirm('คุณต้องการแก้ไขหรือไม่?')"><img src="../../image/edit.png" /></a>
                                </td>
                                <td>
                                    <a href="delete_carservice.php?id=<?= $row['carservice_id']; ?>" onclick="return confirm('คุณต้องการลบหรือไม่?')"><img src="../../image/delete.png" /></a>
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