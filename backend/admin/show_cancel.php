<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>แสดงข้อมูลยกเลิกจองตั๋วเที่ยวรถ  </h2>
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
                    <a href="insert_cancel.php">
                        <button>เพิ่มข้อมูล</button>
                    </a>
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>เวลาที่ยกเลิกการจองตั๋วรถ</th>
                            <th>รหัสจองตั๋ว </th>
                            
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        $sql = " select * from tb_cancel";
                        $result = $cls_conn->select_base($sql);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td>
                                    <?= $row['cancel_date']; ?>
                                </td>
                                <td>
                                    <?= $row['tickets_no']; ?>
                                </td>
                              
                               
                                <td>
                                    <a href="update_cancel.php?id=<?= $row['cancel_id']; ?>" onclick="return confirm('คุณต้องการแก้ไขหรือไม่?')"><img src="../../frontend/image/edit.png "/></a>
                                </td>
                                <td>
                                    <a href="delete_cancel.php?id=<?= $row['cancel_id']; ?>" onclick="return confirm('คุณต้องการลบหรือไม่?')"><img src="../../frontend/image/delete.png" /></a>
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