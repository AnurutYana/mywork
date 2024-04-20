<?php include('header.php'); ?>
<style>
    h4 {
        color: green;
    }
</style>
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <h2>รายได้รวมของการเดินรถ วัน/เดือน/ปี</h2>
            <div class="x_content">
                <p class="text-muted font-13 m-b-30">
                <form action="reports_day.php" method="POST">
                    <div>
                        <label for="start_date">ตั้งแต่วันที่:</label>
                        <input type="date" name="start_date" class="btn btn-light" style="border: 0.1rem solid #adadad;"
                            required>
                        <label for="end_date">ถึงวันที่:</label>
                        <input type="date" name="end_date" class="btn btn-light" style="border: 0.1rem solid #adadad;"
                            required>
                        <button type="submit" name="submit" class="btn btn-primary">ค้นหา</button>
                        <a href="reports_dmy.php" class="btn btn-primary">ดูทั้งหมด</a>
                    </div>
                </form>
                <label for="start_date">ตั้งแต่วันที่:
                    <?= $start_date = $_POST['start_date']; ?>
                </label>
                <label for="end_date">ถึงวันที่:
                    <?= $end_date = $_POST['end_date']; ?>
                </label>
                <table id="expenseTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <tr>
                            <th>วันเวลา</th>
                            <th>ป้ายทะเบียน</th>
                            <th>จำนวนผู้โดยสาร</th>
                            <th>จำนวนเงิน</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
                            // ตรวจสอบว่ามีการส่งข้อมูลมาจากฟอร์มหรือไม่
                            $start_date = $_POST['start_date'];
                            $end_date = $_POST['end_date'];
                            $status = 1;
                            // ปรับ SQL query เพื่อรวมการกรองตามวันที่
                            $sql = "SELECT *, 
                            c.company_name AS c_name, 
                            b.bank_name AS b_name, 
                            b.bank_number AS b_number, 
                            s.station_registration, 
                            t.amount 
                            FROM tb_payment p 
                            JOIN tb_company c ON p.company_id = c.company_id 
                            JOIN tb_bank b ON b.bank_id = p.payment_bank 
                            JOIN tb_station s ON s.station_id = p.station_id
                            JOIN tb_tickets t ON t.tickets_id = p.tickets_id
                            WHERE p.payment_status = '$status' 
                            AND DATE(p.payment_date_time) BETWEEN '$start_date' AND '$end_date'";
                            $result = $cls_conn->select_base($sql);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $row['payment_date_time']; ?>
                                    </td>
                                    <td>
                                        <?= $row['carservice_vehicle']; ?>
                                    </td>
                                    <td>
                                        <?= $row['amount']; ?>
                                    </td>

                                    <td>
                                        <?= number_format((intval($row['payment_pay'])), 2, ".", ","); ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <label style="display: flex; align-items: center;">
                    <h4 style="margin-right: 10px;">รายได้รวม</h4>
                    <h4 style="margin-left: auto;">
                        <?php
                        $totalRevenue = 0;
                        mysqli_data_seek($result, 0); // รีเซ็ตตัวชี้กลับไปที่แถวแรก
                        while ($row = mysqli_fetch_array($result)) {
                            $totalRevenue += $row['payment_pay'];
                        }
                        echo number_format($totalRevenue, 2, ".", ",") . ' บาท';
                        ?>
                    </h4>
                </label>
                <label style="display: flex; align-items: center;">
                    <h4 style="margin-right: 10px;">จำนวนผู้โดยสาร</h4>
                    <h4 style="margin-left: auto;">
                        <?php
                        $totalRevenue = 0;
                        mysqli_data_seek($result, 0); // รีเซ็ตตัวชี้กลับไปที่แถวแรก
                        while ($row = mysqli_fetch_array($result)) {
                            $totalRevenue += $row['amount'];

                        }
                        echo number_format($totalRevenue) . ' คน';
                        ?>
                    </h4>
                </label>
                <?php
                $numRows = mysqli_num_rows($result);
                ?>
                
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var table = document.getElementById('expenseTable');
        var typeColumnIndex = 1;
        var dateColumnIndex = 1;

        var typeByDateMap = new Map();
        for (var i = 1; i < table.rows.length; i++) {
            var currentDate = table.rows[i].cells[dateColumnIndex].innerText;
            var currentType = table.rows[i].cells[typeColumnIndex].innerText;

            if (!typeByDateMap.has(currentDate)) {
                typeByDateMap.set(currentDate, new Set());
            }

            typeByDateMap.get(currentDate).add(currentType);
        }

        var typeCountElement = document.getElementById('typeCount');
        var totalUniqueTypes = 1;

        typeByDateMap.forEach(function (typesSet) {
            totalUniqueTypes += typesSet.size;
        });

        // Start counting from 0
        typeCountElement.innerText = totalUniqueTypes - 1;
    });
</script>
<?php include('footer.php'); ?>