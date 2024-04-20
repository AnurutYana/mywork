<?php include('header.php');


$origin_province = $_POST['origin_province']; //จังหวัดต้นทาง
$terminal_province = $_POST['terminal_province']; //จังหวีดปลายทาง
echo $origin_province;
echo $terminal_province;

?>


<!--content-->
<link rel="stylesheet" href="style/station.css" type="text/css" />

</head>

TODO: ดึงข้อมูลจากตาราง tb_timetable / tb_station แสดงรายการตารางจองตั๋ว

<body>

    <div class="hero-image">
        <div class="hero-text">
            <div id="example2">

                <table>
                    <caption>Projetos</caption>
                    <thead>
                        <tr>
                            <th class="th_btn">สถานีต้นทาง</th>
                            <th class="th_btn">เวลาต้นทาง</th>
                            <th class="th_btn">สถานีปลายทาง</th>
                            <th class="th_btn">เวลาปลายทาง</th>
                            <th class="th_btn">เวลารถออก</th>
                            <th class="th_btn">ราคาตั๋ว</th>
                            <th class="th_btn">ชื่อบริษัท</th>
                            <th class="th_btn">หมายเลขรถ</th>
                            <th class="th_btn">จอง</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Projeto">Restaurante</td>
                            <td data-label="Descrição">Controle de fluxo de um restaurante</td>
                            <td data-label="Administrador">Erick Jacquin</td>
                            <td data-label="Aplicações">4</td>
                            <td data-label="Administrador">Erick Jacquin</td>
                            <td data-label="Aplicações">4</td>
                            <td data-label="Criado">20/04/2018</td>
                        </tr>

                    </tbody>
                </table>
                <!-- <h4><span>จังหวัดต้นทาง: กรุงเตป </span>&nbsp;<span>จังหวัดปลายทาง: กรุงเตป</span></h4><br>
                    <table id="my_table" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th class="th_btn">สถานีต้นทาง</th>
                                <th class="th_btn">เวลาต้นทาง</th>
                                <th class="th_btn">สถานีปลายทาง</th>
                                <th class="th_btn">เวลาปลายทาง</th>
                                <th class="th_btn">เวลารถออก</th>
                                <th class="th_btn">ราคาตั๋ว</th>
                                <th class="th_btn">ชื่อบริษัท</th>
                                <th class="th_btn">หมายเลขรถ</th>
                                <th class="th_btn">จอง</th>
                            </tr>

                        </thead>
                        <tbody>


                        </tbody>
                        
                    </table> -->

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

<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();

    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 3000); // Change image every 2 seconds
    }
</script>


<?php include('footer.php'); ?>