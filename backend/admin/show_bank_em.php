<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แสดงข้อมูลธนาคาร</h2>
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
                            <a href="insert_bank.php">
                                <button>เพิ่มข้อมูล</button>
                            </a>
                        </div>
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>บริษัท</th>
                                    <th>ชื่อธนาคาร</th>                               
                                    <th>เลขบัญชีธนาคาร</th>
                                   
                                    
                                    
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                            $company_id = $_SESSION['company_id'];
                             $sql=" select * from tb_bank join tb_company on tb_company.company_id = tb_bank.company_id where tb_company.company_id = $company_id";
                             $result=$cls_conn->select_base($sql);
                             while($row=mysqli_fetch_array($result))
                             {
                                 ?>
                                    <tr>
                                        <td>
                                            <?=$row['company_name'];?>
                                        </td>
                                        <td>
                                            <?=$row['bank_name'];?>
                                        </td>
                                        <td>
                                            <?=$row['bank_number'];?>
                                        </td>
                                       

                                        <td>
                                            <a href="update_bank.php?id=<?=$row['bank_id'];?>" onclick="return confirm('คุณต้องการแก้ไขหรือไม่?')"><img src="../../frontend/image/edit.png" /></a>
                                        </td>
                                        <td>
                                            <a href="delete_bank.php?id=<?=$row['bank_id'];?>" onclick="return confirm('คุณต้องการลบหรือไม่?')"><img src="../../frontend/image/delete.png" /></a>
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

