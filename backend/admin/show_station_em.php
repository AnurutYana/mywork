<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>แสดงข้อมูลสถานีต้นทาง-ปลายทาง</h2>
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
                    <a href="insert_station.php">
                        <button>เพิ่มข้อมูล</button>
                    </a>
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                          
                            <th>ชื่อสถานีต้นทาง</th>
                            <th>เวลาต้นทาง</th>
                            <th>ชื่อสถานีปลายทาง</th>
                            <th>เวลาปลายทาง</th>
                            <th>เวลารถออก</th>
                            <th>ราคาตั๋วรถตู้</th>
                            <th>จำนวนที่นั่ง</th>
                            <th>ราคาฝากพัสดุ</th>
                            <th>ทะเบียนรถ</th> 
                            <th>ชื่อบริษัท</th>
                           


                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        $company_id = $_SESSION['company_id'];
                        $sql = "select *,o.origin_name origin,t.terminal_name terminal,c.company_name ,r.carservice_number car from tb_station s 
                        join tb_station_origin o on o.origin_id = s.station_origin_name 
                        join tb_station_terminal t on t.terminal_id = s.station_terminal_name 
                        join tb_company c on c.company_id = s.company_id
                        join tb_carservice r on r.carservice_id = s.station_registration 
                        where s.company_id = $company_id";
                        
                        $result = $cls_conn->select_base($sql);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                               
                                <td>
                                    <?= $row['origin']; ?>
                                </td>
                                
                                <td>
                                    <?= $row['station_ortime']; ?>
                                </td>
                               
                                <td>
                                    <?= $row['terminal']; ?>
                                </td>
                                <td>
                                    <?= $row['station_destime']; ?>
                                </td>
                                <td>
                                    <?= $row['station_departuretime']; ?>
                                </td>
                                <td>
                                    <?= $row['station_price_tickets']; ?>
                                </td>
                                <td>
                                    <?php if($row['tickets_amount'] > 0){
                                        echo $row['tickets_amount'];
                                    }else if ($row['tickets_amount'] == 0){
                                        echo '<span style="color:red;font-weight:bold;">เต็มแล้ว</span>';
                                    } ?>
                                </td>
                                <td>
                                    <?= $row['station_price_package']; ?>
                                </td>
                                <td>
                                    <?= $row['car']; ?>
                                </td>
                                <td>
                                    <?= $row['company_name']; ?>
                                </td>
                                <td>
                                    <a href="update_station.php?id=<?= $row['station_id']; ?>" onclick="return confirm('คุณต้องการแก้ไขหรือไม่?')"><img src="../../frontend/image/edit.png" /></a>
                                </td>
                                <td>
                                    <a href="delete_station.php?id=<?= $row['station_id']; ?>" onclick="return confirm('คุณต้องการลบหรือไม่?')"><img src="../../frontend/image/delete.png" /></a>
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



