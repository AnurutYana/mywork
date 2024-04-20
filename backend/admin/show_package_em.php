<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>แสดงข้อมูลฝากพัสดุ </h2>
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
                  
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>หมายเลขฝาก</th>
                            <th>ชื่อผู้ส่ง</th>
                            <th>ชื่อผู้รับ</th>
                            <th>วันเวลาจอง</th>
                            <th>จำนวนพัสดุ</th>
                            <th>น้ำหนัก</th>
                            <th>ราคาฝาก</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>รูปกล่องพัสดุ</th>
                         
                            <th>action</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        $company_id = $_SESSION['company_id'];

                        $sql = " SELECT *,u.user_fname,u.user_surname from tb_package p join tb_user u on u.user_id = p.user_id where p.company_id = '$company_id'";
                        $result = $cls_conn->select_base($sql);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td>
                                    <?= $row['package_no']; ?>
                                </td>
                                <td>
                                    <?= $row['user_fname']." ".$row['user_surname']; ?>
                                </td>
                                <td>
                                    <?= $row['package_lname']." ".$row['package_fname']; ?>
                                </td>
                                <td>
                                    <?= $row['package_date_time']; ?>
                                </td>
                                <td>
                                    <?= $row['package_amount']; ?>
                                </td>
                                <td>
                                    <?= $row['package_weight']; ?>
                                </td>
                                <td>
                                    <?= number_format((intval($row['package_price'])), 2, ".", ","); ?>
                                </td>
                                <td>
                                    <?= $row['package_tel']; ?>
                                </td>
                               

                                <td>
                                    <input id="btn_img" value="รูปกล่องพัสดุ" onclick="img(<?= $row['package_id']; ?>)" class="btn btn-success" style="width: 130px;">
                                </td>
                                
                                <td>
                                    <a href="delete_package.php?id=<?= $row['package_id']; ?>" onclick="return confirm('คุณต้องการลบหรือไม่?')"><img src="../../image/delete.png" style="width: 20px;" /></a>
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

<script>
   
        function img(id){
            // alert(id);
            $.ajax({
                url: "service/get_img_package.php",
                data:{id:id},
                method: "POST",
                success:function(data){
                    row = JSON.parse(data);
                    console.log(row);
                    let img = row[0].package_pic;
                    Swal.fire({
                      title: 'พัสดุ',
                       text: 'ภาพพัสดุ',
                       imageUrl: `../../upload/${img}`,
                       imageWidth: 600,
                       imageHeight: 400,
                       imageAlt: 'Custom image',
                       width:800,
                   });
                }
            })
        }
      
</script>


<?php include('footer.php'); ?>