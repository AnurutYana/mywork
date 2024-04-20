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
                <form action="reports_day1.php" method="POST">
                    <div>
                        <label for="start_date">ตั้งแต่วันที่:</label>
                        <input type="date" name="start_date" class="btn btn-light" style="border: 0.1rem solid #adadad;"
                            required>
                        <label for="end_date">ถึงวันที่:</label>
                        <input type="date" name="end_date" class="btn btn-light" style="border: 0.1rem solid #adadad;"
                            required>

                        <!-- Dropdown สำหรับป้ายทะเบียน -->
                        <select name="search_plate" class="btn btn-light" style="border: 0.1rem solid #adadad;">
                            <option value="">เลือกป้ายทะเบียน</option>
                            <?php
                            // ดึงข้อมูลป้ายทะเบียนจากฐานข้อมูลและเติมข้อมูลแบบเลื่อนลง
                            $sql = "SELECT DISTINCT carservice_vehicle FROM tb_carservice";
                            $result = $cls_conn->select_base($sql);
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<option value='" . $row['carservice_vehicle'] . "'>" . $row['carservice_vehicle'] . "</option>";
                            }
                            ?>
                        </select>
                        <!-- End of Dropdown -->

                        <button type="submit" name="submit" class="btn btn-primary">ค้นหา</button>
                        <a href="reports_car.php" class="btn btn-primary">ดูทั้งหมด</a>
                    </div>
                </form>
                <table id="expenseTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>วันเวลา</th>
                            <th>ป้ายทะเบียน</th>
                            <th>จำนวนคน</th>
                            <th>จำนวนเงิน</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
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
                            WHERE p.payment_status = '$status'";

                        // ตรวจสอบว่ามีการส่งค่า search_plate ผ่าน POST หรือไม่
                        if (isset($_POST['submit']) && !empty($_POST['search_plate'])) {
                            $search_plate = $_POST['search_plate'];
                            // เพิ่มเงื่อนไขการค้นหาป้ายทะเบียน
                            $sql .= " AND carservice_vehicle = '$search_plate'";
                        }

                        // Execute SQL query
                        $result = $cls_conn->select_base($sql);

                        // วนซ้ำผลลัพธ์เพื่อแสดงข้อมูล
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
                        ?>
                    </tbody>
                </table>
                <label style="display: flex; align-items: center;">
                    <h4 style="margin-right: 10px;">รายได้รวม</h4>
                    <h4 style="margin-left: auto;">
                        <?php
                        $totalRevenue = 0; // ปรับ SQL query เพื่อรวมรายได้รวม
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
                        // ปรับ SQL query เพื่อรวมจำนวนผู้โดยสาร
                        $totalPassengers = 0;
                        mysqli_data_seek($result, 0); // รีเซ็ตตัวชี้กลับไปที่แถวแรก
                        while ($row = mysqli_fetch_array($result)) {
                            $totalPassengers += $row['amount'];
                        }
                        echo number_format($totalPassengers) . ' คน';
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
<?php
// รับค่าจากฟอร์ม
if (isset($_POST['submit']) && !empty($_POST['search_plate'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $search_plate = $_POST['search_plate'];

    // ตรวจสอบว่ามีค่าว่างหรือไม่
    if (!empty($start_date) && !empty($end_date)) {
        // สร้างคำสั่ง SQL
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

        // ถ้ามีการค้นหาป้ายทะเบียนเพิ่มเติม
        if (!empty($search_plate)) {
            // เพิ่มเงื่อนไขการค้นหาชื่อป้ายทะเบียน
            $sql .= " AND p.carservice_vehicle = '$search_plate'";
        }



        // Execute SQL query
        $result = $cls_conn->select_base($sql);

        // วนซ้ำผลลัพธ์เพื่อแสดงข้อมูล
        while ($row = mysqli_fetch_array($result)) {
            // แสดงแถวของตาราง
        }
    }
}



?>

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

        // เริ่มนับจาก -1
        typeCountElement.innerText = totalUniqueTypes - 1;
    });
</script>

<?php include('footer.php'); ?>