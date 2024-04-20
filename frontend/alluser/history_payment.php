<?php include('header.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showConfirmationModal(paymentId) {
        console.log("paymentId:", paymentId);
        Swal.fire({
            title: 'คุณต้องการยกเลิกการจองหรือไม่?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ตกลง',
            cancelButtonText: 'ยกเลิก',
        }).then((result) => {
            if (result.isConfirmed) {

                canceltickets(paymentId);
            }
        });
    }



    function canceltickets(paymentId) {
        $.ajax({
            type: "POST",
            url: "canceltickets.php",
            data: { payment_id: paymentId },
            success: function (response) {
                console.log(response);
                Swal.fire({
                    title: 'การยกเลิกสำเร็จ',
                    icon: 'success'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "show_payment.php"; // รีเฟรชหน้า
                    }
                });
            },
            error: function (xhr, status, error) {
                console.error(error);
                Swal.fire({
                    title: 'เกิดข้อผิดพลาด',
                    text: 'เกิดข้อผิดพลาดในการยกเลิก',
                    icon: 'error',
                });
            }
        });
    }



</script>


<style>
    table {
        width: 900px;
        border-collapse: collapse;
        margin: 50px auto;
    }

    th {
        background: #FF7C3B;
        color: black;
        font-weight: bold;
    }

    td,
    th {
        padding: 10px;
        border-bottom: 1px solid #ccc;
        text-align: center;
        font-size: 18px;
    }

    .tbl-accordion-header a {
        color: #FF7C3B !important;
    }

    .tbl-accordion-body {
        display: none;
    }

    .tbl-accordion-body td {
        border-bottom: 0px;
    }

    .tbl-accordion-body tr:last-child {
        border-bottom: 1px solid #ccc;
    }
</style>
<!--content-->
<div class="contact">

    <div class="container">
        <div class="" style="text-align: center;">
            <h3 style="color:black;font-weight:bold;">ประวัติการชำระเงิน</h3>
        </div>
        <div class="">

            <table>
                <thead>
                    <tr>
                        <th>หมายเลขจอง</th>
                        <th>ประเภทการจอง</th>
                        <th>ราคา</th>
                        <th>วันและเวลาชำเงิน</th>
                        <th>สถานะ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['user_idcard'])) {
                        $user_idcard = $_SESSION['user_idcard'];

                        $sql = "SELECT * FROM tb_payment WHERE user_idcard = '$user_idcard' ORDER BY payment_id DESC";
                        $result = $cls_conn->select_base($sql);
                        while ($row = $result->fetch_assoc()) {
                            $tickets_id = $row['payment_id'];
                            $price_tickets = $row['payment_pay'];
                            $tickets_no = $row['payment_no'];
                            $status = $row['payment_status'];
                            $ticket_type = $row['payment_type'];
                            $times_tickets = $row['payment_date_time'];
                            ?>



                        <tbody class="tbl-accordion-header">
                            <tr>
                                <td>
                                    <a href="history_tickets.php?tickets_id=<?= $tickets_id ?>"
                                        data-toggle="toggle" style="cursor: pointer"><strong>
                                            <?= $tickets_no ?>
                                        </strong>
                                    </a>
                                </td>


                                <td>
                                    <?= $ticket_type ?>
                                </td>


                                <td>
                                    <?= number_format((intval($price_tickets)), 2, ".", ","); ?>
                                </td>


                                <td>
                                    <?= $times_tickets ?>
                                </td>


                                <?php
                                if ($status == '0') {
                                    echo '<td style="color:#f1d800  ;font-weight:bold;">กำลังดำเนินการตรวจสอบ</td>';

                                } else {
                                    echo '<td style="color:#24B962;font-weight:bold;">ตรวจสอบเสร็จแล้ว</td>';
                                }
                                ?>


                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                <?php } ?>
            </table>
        </div>

    </div>

</div>
<br />

<script>
    $(document).ready(function () {
        $('[data-toggle="toggle"]').click(function () {
            $(this).parents().next(".tbl-accordion-body").toggle();
        });
    });
</script>
<?php include('footer.php'); ?>