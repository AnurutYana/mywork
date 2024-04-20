<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>แสดงข้อมูลชำระเงิน </h2>
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
                            <th>รหัสชำระเงิน</th>
                            <th>ประเภท</th>
                            <th>รหัสบัตรประชาชนสมาชิก</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>หมายเลขจอง</th>
                            <th>เลขบัญชีธนาคาร</th>
                            <th>จำนวนเงิน</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>วันเวลาที่ชำระเงิน</th>
                            <th>บริษัทที่ทำการจอง</th>
                            <th>สถานะ</th>
                            <th>รหัสตารางเวลาเดินรถ</th>
                            <th>รหัสจองตั๋ว</th>
                            <th>ภาพหลักฐานการโอน</th>
                            <th>ยืนยันชำระเงิน</th>

                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        $status = 0;
                        $sql = " select *,c.company_name c_name,b.bank_name b_name,b.bank_number b_number from tb_payment p 
                        join tb_company c on p.company_id = c.company_id 
                        join tb_bank b on b.bank_id = p.payment_bank 
                        where p.payment_status = '$status' order by p.payment_id";
                        $result = $cls_conn->select_base($sql);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td>
                                    <?= $row['payment_id']; ?>
                                </td>
                                <td>
                                    <?= $row['payment_type']; ?>
                                </td>
                                <td>
                                    <?= $row['user_idcard']; ?>
                                </td>
                                <td>
                                    <?= $row['payment_fname']; ?>
                                </td>

                                <td>
                                    <?= $row['payment_lname']; ?>
                                </td>

                                <td>
                                    <?= $row['payment_no']; ?>
                                </td>
                                <td>
                                    <?= $row['b_name'] . "(" . $row['b_number'] . ")"; ?>
                                </td>
                                <td>
                                    <?= number_format((intval($row['payment_pay'])), 2, ".", ","); ?>
                                </td>

                                <td>
                                    <?= $row['payment_tel']; ?>
                                </td>
                                <td>
                                    <?= $row['payment_date_time']; ?>
                                </td>
                                <td>
                                    <?= $row['c_name']; ?>
                                </td>

                                <td style="width: 80px;">
                                    <?php switch ($row['payment_status']) {
                                        case '0':
                                            echo "<span style='color:#55C11E ;font-weight:bold;'>รอยืนยัน</span>";
                                    } ?>
                                </td>
                                <td>
                                    <?= $row['station_id']; ?>
                                </td>
                                <td>
                                    <?= $row['tickets_id']; ?>
                                </td>

                                <td>
                                    <input id="btn_img" value="ดู" onclick="img(<?= $row['payment_id']; ?>)" class="btn btn-success" style="width: 50px;">
                                </td>

                                <td>
                                    <input type="submit" value="ยืนยัน" onclick="btn_submit(<?= $row['payment_id']; ?>)" class="btn btn-danger">
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
    function img(id) {
        // alert(id);
        $.ajax({
            url: "service/get_img.php",
            data: {
                id: id
            },
            method: "POST",
            cache: false, // ไม่นำเอาข้อมูลลง cache เพื่อปกกันเอาข้อมูลเก่ามาใช้งาน
            success: function(data) {
                row = JSON.parse(data);
                console.log(row);
                let img = row[0].payment_pic;
                Swal.fire({
                    title: 'Slip',
                    text: 'หลักฐานการโอน',
                    imageUrl: `../../upload/${img}`,
                    imageWidth: 600,
                    imageHeight: 500,
                    imageAlt: 'Custom image',
                    width: 500,
                });
            }
        })
    }

    function btn_submit(id) {
        // console.log(id);

        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
                    icon: 'success',
                    title: 'Successfully...'
                });
                
        $.ajax({
            url: "service/update_payment.php",
            data: {
                id: id
            },
            method: "POST",
            cache: false, // ไม่นำเอาข้อมูลลง cache เพื่อปกกันเอาข้อมูลเก่ามาใช้งาน
            success: function(data) {
                row = JSON.parse(data);
                console.log(row);        
                setTimeout(function() {        
                    location.reload();
                }, 3000)
            },
        })

    }
</script>

<?php include('footer.php'); ?>