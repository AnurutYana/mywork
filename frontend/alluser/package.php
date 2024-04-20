<?php include('header.php');
if (isset($_GET['id'])) {
    $user_idcard = $_SESSION['user_idcard'];

    $id = $_GET['id'];
    $sql = "select * from tb_station where station_id ='$id'";
    $result = $cls_conn->select_base($sql);
    while ($row = $result->fetch_assoc()) {
        $station_id = $row['station_id'];
        $station_price_package = $row['station_price_package'];
    }
}

?>

<style>
    #package_no {
        color: red;
        font-weight: bold;

    }
</style>


<!--content-->

<link href="style/package.css" rel="stylesheet">
</link>
</head>
<body>

    <div class="hero-image">
        <div class="hero-text">
            <div id="example2">
                <article class="tabs">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="station_id" value="<?= $station_id; ?>">
                        <div class="mb">
                            <h4 style="font-weight: bold;text-align:center; margin-bottom:15px;">ฝากพัสดุ</h4>
                        </div>
                        <div class="mp"><span>หมายเลขฝาก</span><input type="text" id="package_no" name="package_no" readonly class="form-control" required></input></div>

                    
                        <div class="grid-form">
                            <div class="">
                                <label for="package_name">ชื่อผู้รับ</label>
                                <div class="grid-input">
                                    <div class="">
                                        <input type="text" class="form-control" placeholder="ชื่อ" name="package_fname" required>
                                    </div>
                                    <div class="">
                                        <input type="text" class="form-control" placeholder="นามสกุล" name="package_lname" required>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid-form">
                            <div class="">
                                <label for="">วันเวลาที่ฝาก</label>
                                <input type="datetime-local" class="form-control" name="package_date_time" required>
                            </div>
                            <div class="">
                                <label for="">จำนวนพัสดุ</label>
                                <input type="number" class="form-control" name="package_amount" id="package_amount" min="1" value="1" required>
                            </div>
                        </div>

                        <div class="grid-form">
                            <div class="">
                                <label for="">น้ำหนัก/กก.</label>
                                <input type="number" min="1" value="1" name="package_weight" id="package_weight" class="form-control" required>
                            </div>
                            <div class="">
                                <label for="">ราคา</label>
                                <input type="number" class="form-control" min="1" value="<?= number_format((intval($station_price_package)),2,".",","); ?>" id="package_price" name="package_price" required>
                            </div>
                        </div>


                        <div class="grid-form">
                            <div class="">
                                <label for="">เบอร์โทรผู้รับ</label>
                                <input type="text" class="form-control" style="width: 425px;" name="package_tel" required>
                            </div>
                        </div>

                        <div class="grid-form">
                            <div class="">
                                <label for="">รูปกล่องพัสดุ</label>
                                <input type="file" class="form-control" name="package_pic" id="package_pic" style="width: 425px;" required>
                            </div>
                            <div class="">
                                <img src="../../upload/" alt="" width="100px" id="img" style="margin-top:10px;">
                                <script>
                                    package_pic.onchange = evt => {
                                        const [file] = package_pic.files
                                        if (file) {
                                            img.src = URL.createObjectURL(file)
                                        }
                                    }
                                </script>
                            </div>
                        </div>

                        <div class="grid-btn">
                            <div class="">
                                <button type="submit" class="btn_ok" name="btn_ok" id="btn_ok">ยืนยันการฝาก</button>
                            </div>
                            <div class="" style=" margin-top:9px ;">
                                <a class="btn_cancle" id="btn_cancle" style="cursor: pointer;">ยกเลิกการจอง</a>
                            </div>
                        </div>

                        <input type="hidden" name="user_idcard" value="<?= $user_idcard; ?>">
                        <input type="hidden" name="station_id" value="<?= $station_id; ?>">
                    </form>
            </div>
            </article>
            <?php
            if (isset($_POST['btn_ok'])) {
                $package_no = $_POST['package_no'];
                $package_fname = $_POST['package_fname'];
                $package_lname = $_POST['package_lname'];
                $package_date_time = $_POST['package_date_time'];
                $package_amount = $_POST['package_amount'];
                $package_weight = $_POST['package_weight'];
                $package_price = $_POST['package_price'];
                $package_tel = $_POST['package_tel'];
                $package_pic = "";
                if ($_FILES['package_pic']['name'] != "") {
                    $datetime = date("dmYHis");
                    $file_name = substr($_FILES['package_pic']['name'], -4);
                    $package_pic = $datetime . '_p1' . $file_name;
                    $target = "../../upload/" . $package_pic;
                    move_uploaded_file($_FILES['package_pic']['tmp_name'], $target);
                }

                $user_idcard = $_POST['user_idcard'];
                $station_id = $_POST['station_id'];

                $select_company_id = "select company_id from tb_station where station_id = '$station_id'";
                $rsd = $cls_conn->select_base($select_company_id);
                $row = $rsd->fetch_array();
                $company_id = $row['company_id'];



                $sql = "INSERT INTO `tb_package`(`package_no`,`package_fname`, `package_lname`, `package_date_time`,
                     `package_amount`, `package_weight`, `package_price`, `package_tel`, `package_pic`, `user_idcard`, `station_id`, `company_id`)
                     VALUES ('$package_no','$package_fname','$package_lname','$package_date_time','$package_amount',
                     '$package_weight','$package_price','$package_tel','$package_pic','$user_idcard','$station_id','$company_id')";
                // die($sql);

                if ($cls_conn->write_base($sql) == TRUE) {
                    echo $cls_conn->show_message('จองสำเร็จ');

                    $check = "SELECT * FROM tb_package WHERE package_no = '$package_no'";
                    $result = $cls_conn->select_base($check);
                    $row = $result->fetch_assoc();
                    $id = $row['package_id'];
                    echo $cls_conn->goto_page(1, 'pay_package.php?id=' . $id);
                } else {
                    echo $cls_conn->show_message('จองไม่สำเร็จ');
                    echo $sql;
                }
            }


            ?>


        </div>
    </div>
    </div>


    <br><br><br>

    <div id="row-items">
        <img src="../../image/bangkok.png" width="240" height="240">
        <img src="../../image/chiangmai.png" width="290" height="290">
        <img src="../../image/Phi Phi Island.png" width="350" height="350">
        <img src="../../image/phuket.png" width="290" height="290">
        <img src="../../image/Songkhla.png" width="240" height="240">
    </div>



    </div>
</body>
<script src="js/openCity.js"></script>


<script>
    $(document).ready(function() {
        let price = $("#package_price").val();

        $("#package_weight").on("keyup keydown change", function(event) {
            let weight = $("#package_weight").val();
            let test = price * weight;
            $('#package_price').val(test);
        });

    });



    const random = Math.floor(Math.random() * 1000000).toString();
    let no = $('#package_no').html("หมายเลขตั๋ว:" + random);
    console.log(random);
    let no_2 = $('#package_no').val(random);
    console.log(no_2);


    $('#btn_cancle').click(function() {
        Swal.fire({
            title: 'คุณต้องการยกเลิกการฝาก?',
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