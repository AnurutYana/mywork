<?php include('header.php');

session_start();

if (isset($_GET['id'])) {
    $user_id = $_SESSION['user_id'];
    $user_idcard = $_SESSION['user_idcard'];
    $user_tel = $_SESSION['user_tel'];
    $user_fname = $_SESSION['user_fname'];
    $user_surname = $_SESSION['user_surname'];
    $car = $_SESSION['car_id'];


    $id = $_GET['id'];
    $sql = "SELECT *
    FROM tb_station
    JOIN tb_carservice ON tb_station.station_registration = tb_carservice.carservice_id
    WHERE tb_station.station_id = '$id';
    ";
    $result = $cls_conn->select_base($sql);
    while ($row = $result->fetch_assoc()) {
        $station_id = $row['station_id'];

        $station_origin_name = $row['station_origin_name'];
        $station_ortime = $row['station_ortime'];
        $station_terminal_name = $row['station_terminal_name'];
        $station_destime = $row['station_destime'];
        $station_departuretime = $row['station_departuretime'];
        $station_price_tickets = $row['station_price_tickets'];
        $station_registration = $row['station_registration'];
        $company_id = $row['company_id'];
        $tickets_amount = $row['tickets_amount'];
        $carservice_vehicle = $row['carservice_vehicle'];
    }
}

?>


<style>
    #tickets_no {
        color: red;
        font-weight: bold;

    }
</style>

<!--content-->

<link rel="stylesheet" href="style/tickets.css" type="text/css">
</head>


<body>

    <div class="hero-image">
        <div class="hero-text">
            <div id="example2">
                <article class="tabs">
                    <form action="" method="post">
                        <div class="mb">
                            <h4 style="font-weight: bold;text-align:center; margin-bottom:15px;">จองตั๋ว</h4>
                        </div>
                        <div>
                            ประเภทการจอง:
                            <select name="payment_type" id="payment_type" class="form-control" required>
                                <option value="จองตั๋ว" selected>จองตั๋ว</option>
                                <!-- <option value="ฝาก">ฝาก</option> -->
                            </select>
                        </div>

                        <div class="mp"><span>หมายเลขตั๋ว</span><input type="text" id="tickets_no" name="tickets_no"
                                readonly class="form-control" required></input></div>


                        <div class="mp"><span>เลขทะเบียนรถ</span><input type="text" id="carservice_vehicle" name="carservice_vehicle"
                                class="form-control" readonly
                                value="<?= $carservice_vehicle; ?>"></input></div>

                        <div class="grid-form-pack">
                            <div class="">
                                <label for="">วันเวลาที่จอง</label>
                                <input type="datetime-local" class="form-control" name="tickets_date_time" required>
                            </div>
                            <div class="">
                                <label for="">จำนวนที่นั่ง</label>
                                <input type="number" class="form-control" min="1" id="amount" name="amount" value="1"
                                    required>
                            </div>

                        </div>
                        <div class="">
                            <div class="">
                                <label for="">ราคา</label>
                                <input type="text" class="form-control"
                                    value="<?= number_format((intval($station_price_tickets)), 2, ".", ","); ?>"
                                    id="station_price_tickets" name="station_price_tickets" readonly required>
                            </div>
                        </div>
                        <div class="grid-btn-pack">
                            <div class="">
                                <button type="submit" class="btn_ok" name="btn_ok">ยืนยันการจอง</button>
                            </div>
                            <div class="" style=" margin-top:9px ;">
                                <a class="btn_cancle" id="btn_cancle" style="cursor: pointer;">ยกเลิกการจอง</a>
                            </div>
                        </div>

                        <input type="hidden" name="user_idcard" value="<?= $user_idcard; ?>">
                        <input type="hidden" name="station_id" value="<?= $station_id; ?>">
                        <input type="hidden" name="seat" value="<?= $_GET['seat']; ?>">
                        <input type="hidden" name="tickets_amount" value="<?= $tickets_amount; ?>">
                    </form>

                    <?php
                    if (isset($_POST['btn_ok'])) {
                        $tickets_type = $_POST['payment_type'];
                        $tickets_date_time = $_POST['tickets_date_time'];
                        $amount = $_POST['amount'];
                        $station_price_tickets = $_POST['station_price_tickets'];
                        $tickets_no = $_POST['tickets_no'];
                        $user_idcard = $_POST['user_idcard'];
                        $station_id = $_POST['station_id'];
                        $tickets_amount = $_POST['tickets_amount'];
                        $seat = $_POST['seat'];
                        $carservice_vehicle = $_POST['carservice_vehicle'];

                        if ($amount > $seat) {
                            echo $cls_conn->show_message("จำนวนที่นั่งเต็มแล้วครับ");
                        } else if ($tickets_amount == 0) {
                            echo $cls_conn->show_message("จำนวนที่นั่งเต็มแล้วครับ");
                        } else {
                            $select_company_id = "select company_id from tb_station where station_id = '$station_id'";
                            $rsd = $cls_conn->select_base($select_company_id);
                            $row = $rsd->fetch_array();
                            $company_id = $row['company_id'];

                            $sql = "INSERT INTO `tb_tickets`(`tickets_date_time`, `amount`, `station_price_tickets`, `tickets_no`, `user_idcard`, `station_id`, `company_id`, `tickets_type`, `carservice_vehicle`) 
                                    VALUES ('$tickets_date_time','$amount','$station_price_tickets','$tickets_no','$user_idcard','$station_id','$company_id','$tickets_type','$carservice_vehicle')";
                            // die($sql);
                            if ($cls_conn->write_base($sql) == true) {
                                echo $cls_conn->show_message('จองสำเร็จ');

                                //ลดที่นั่งจากการจอง
                                $update_amount = "UPDATE `tb_station` SET tickets_amount = (tickets_amount- $amount) WHERE station_id='$station_id'";
                                $cls_conn->write_base($update_amount);


                                $check = "SELECT * FROM tb_tickets WHERE tickets_no = '$tickets_no'";
                                $result = $cls_conn->select_base($check);
                                $row = $result->fetch_assoc();
                                $id = $row['tickets_id'];
                                echo $cls_conn->goto_page(1, 'show_payment.php');
                                // echo $sql;
                            } else {
                                echo $cls_conn->show_message('จองไม่สำเร็จ');
                                echo $sql;
                            }
                        }

                    } ?>
            </div>
            </article>
        </div>
    </div>
    </div>


    <br><br><br>

    <!-- <div id="row-items">
        <img src="../../image/bangkok.png" width="240" height="240">
        <img src="../../image/chiangmai.png" width="290" height="290">
        <img src="../../image/Phi Phi Island.png" width="350" height="350">
        <img src="../../image/phuket.png" width="290" height="290">
        <img src="../../image/Songkhla.png" width="240" height="240">
    </div> -->

    </div>
</body>

<script src="js/openCity.js"></script>

<script>
    $(document).ready(function () {
        let price = $("#station_price_tickets").val();

        $("#amount").on("keyup keydown change", function (event) {
            let number = $("#amount").val();
            let test = price * number;
            $('#station_price_tickets').val(test);
        });

        const random = Math.floor(Math.random() * 1000000).toString();
        let no = $('#tickets_no').html("หมายเลขตั๋ว:" + random);
        console.log(random);
        let no_2 = $('#tickets_no').val(random);
        console.log(no_2);

    });

    $('#btn_cancle').click(function () {
        Swal.fire({
            title: 'คุณต้องการยกเลิกการจอง?',
            html: "คุณลูกค้าจะกลับสู่หน้าหลักนะครับ ^^",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ตกลง',
            cancelButtonText: 'ยกเลิก',
            setTimeout: 2000,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "index.php";
            }
        })

    });
</script>

<?php include('footer.php'); ?>