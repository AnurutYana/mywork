<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>แสดงข้อมูลการจองตั๋วรถ </h2>
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
                    <a href="insert_reserve.php">
                        <button>เพิ่มข้อมูล</button>
                    </a>
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>รหัสจองตั๋ว</th>
                            <th>วันเวลาจอง</th>
                            <th>หมายเลขจอง</th>
                            <th>จำนวนตั๋ว</th>
                            <th>ราคาตั๋ว</th>
                            <th>รหัสประจำตัวประชาชน</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>รหัสตารางเวลาเดินรถ</th>
                            <th>action</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                                               
                        $sql = "SELECT tb_tickets.*, tb_user.user_fname, tb_user.user_surname, tb_user.user_tel, tb_station.station_departuretime
                                 FROM tb_tickets
                                 INNER JOIN tb_user ON tb_user.user_idcard = tb_tickets.user_idcard
                                INNER JOIN tb_station ON tb_station.station_id = tb_tickets.station_id";
                        // $sql = "SELECT * FROM `tb_tickets`";
                        $result = $cls_conn->select_base($sql);
                        //echo $sql;
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                               <td>
                                    <?=$row['tickets_id']?>
                               </td>
                               <td>
                                    <?=$row['tickets_date_time']?>
                               </td>
                               <td>
                                    <?=$row['tickets_no']?>
                               </td>
                               <td>
                                    <?=$row['amount']?>
                               </td>
                               <td>
                                    <?=$row['station_price_tickets']?>
                               </td>
                               <td>
                                    <?=$row['user_idcard']?>
                               </td>
                               <td>
                                    <?=$row['user_fname']?>
                               </td>
                               <td>
                                    <?=$row['user_surname']?>
                               </td>
                               <td>
                                    <?=$row['user_tel']?>
                               </td>
                               <td>
                                    <?=$row['station_departuretime']?>
                               </td>

                             
                               <td>
                                    <a href="delete_tickets.php?id=<?= $row['tickets_id']; ?>" onclick="return confirm('คุณต้องการลบหรือไม่?')"><img src="../../image/delete.png" style="width: 20px;" /></a>
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