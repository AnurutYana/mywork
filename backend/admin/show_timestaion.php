<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h1>แสดงข้อมูลตารางเวลาเดินรถขาไป</h1>   
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
                    <a href="insert_timestation.php">
                        <button>เพิ่มข้อมูล</button>
                    </a>
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <th><span style="color:red"></span></th>
                        <th><span style="color:red">รถออกจากภูเขียวไปขอนแก่น</span></th>
                        <th><span style="color:red">รถถึงชุมแพ</span></th>
                        <th><span style="color:red">รถถึงขอนแก่น</span></th>
                        <th></th>
                        <th></th>
                        <tr>
                          
                            <th>ลำดับ</th>
                            <th>เวลาออกรถ</th>
                            <th>เวลาที่จะถึง</th>
                            <th>เวลาที่จะถึง</th>
                            <th>หมายเลขทะเบียนรถ</th> 
 
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>


                    <tbody>
                    <?php
                            //$sql = "SELECT TOP 5 * FROM tb_timestation order by tb_timeid asc";
                             $sql="SELECT * FROM tb_timestation ORDER BY tb_timeid  LIMIT 0,25" ;
                             //$result = mysqli_query($con,$sql);
                             $result=$cls_conn->select_base($sql);
                             while($row=mysqli_fetch_array($result))
                             {
                                 ?>
                            <tr>
                            <td>
                                    <?= $row['tb_timeid']; ?>
                                </td>
                                <td>
                                    <?= $row['tb_timeout']; ?>
                                </td>
                                
                                <td>
                                    <?= $row['tb_timewill']; ?>
                                </td>
                                <td>
                                    <?= $row['tb_timewill2']; ?>
                                </td>
                                <td>
                                    <?= $row['carservice_vehicle']; ?>
                                </td>
                
                                <td>
                                    <a href="update_timestation.php?id=<?= $row['tb_timeid']; ?>" onclick="return confirm('คุณต้องการแก้ไขหรือไม่?')"><img src="../../frontend/image/edit.png" /></a>
                                </td>
                                <td>
                                    <a href="delete_station.php?id=<?= $row['tb_timeid']; ?>" onclick="return confirm('คุณต้องการลบหรือไม่?')"><img src="../../frontend/image/delete.png" /></a>
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


    
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h1>แสดงข้อมูลตารางเวลาเดินรถขากลับ</h1>
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
                    <a href="insert_timestation.php">
                        <button>เพิ่มข้อมูล</button>
                    </a>
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <th><span style="color:red"></span></th>
                        <th><span style="color:red">รถออกจากขอนแก่นไปภูเขียว</span></th>
                        <th><span style="color:red">รถถึงชุมแพ</span></th>
                        <th><span style="color:red">รถถึงภูเขียว</span></th>
                        <th></th>
                        <th></th>
                        <tr>
                          
                            <th>ลำดับ</th>
                            <th>เวลาออกรถ</th>
                            <th>เวลาที่จะถึง</th>
                            <th>เวลาที่จะถึง</th>
                            <th>หมายเลขทะเบียนรถ</th> 
 
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>


                    <tbody>
                    <?php
                             $sql="SELECT * FROM tb_timestation ORDER BY tb_timeid  ASC LIMIT 25,52" ;
                             $result=$cls_conn->select_base($sql);
                             while($row=mysqli_fetch_array($result))
                             {
                                 ?>
                            <tr>
                            <td>
                                    <?= $row['tb_timeid']; ?>
                                </td>
                                <td>
                                    <?= $row['tb_timeout']; ?>
                                </td>
                                
                                <td>
                                    <?= $row['tb_timewill']; ?>
                                </td>
                                <td>
                                    <?= $row['tb_timewill2']; ?>
                                </td>
                                <td>
                                    <?= $row['carservice_vehicle']; ?>
                                </td>
                
                                <td>
                                    <a href="update_timestation.php?id=<?= $row['tb_timeid']; ?>" onclick="return confirm('คุณต้องการแก้ไขหรือไม่?')"><img src="../../frontend/image/edit.png" /></a>
                                </td>
                                <td>
                                    <a href="delete_timestation.php?id=<?= $row['tb_timeid']; ?>" onclick="return confirm('คุณต้องการลบหรือไม่?')"><img src="../../frontend/image/delete.png" /></a>
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