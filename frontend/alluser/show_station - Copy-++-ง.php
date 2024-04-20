<?php include('header.php');


?>

<!--content-->
<link rel="stylesheet" href="style/station.css" type="text/css" />
<style>
    table {
        --accent-color: #362f4b;
        --text-color: slategray;
        --bgColorDarker: #ececec;
        --bgColorLighter: #fcfcfc;
        --insideBorderColor: lightgray;
        width: 100%;
        margin: 0;
        padding: 0;
        border: 1px solid var(--accent-color);
        border-collapse: collapse;
        color: var(--text-color);
        table-layout: fixed;
    }

    table caption {
        margin: 1rem 0;
        color: slategray;
        font-size: 1.5rem;
        font-weight: 600;
        letter-spacing: 0.055rem;
        text-align: center;
    }

    table thead tr {
        color: whitesmoke;
        background-color: var(--accent-color);
        font-size: 1.2rem;
    }

    table tbody tr {
        border: 1px solid var(--insideBorderColor);
        background-color: var(--bgColorDarker);
    }

    table tbody tr:nth-child(odd) {
        background-color: var(--bgColorLighter);
    }

    table th {
        letter-spacing: 0.075rem;
    }

    table th,
    table td {
        padding: 1.5rem 3rem;
        font-weight: normal;
        text-align: left;
    }



    @media screen and (max-width: 768px) {
        table {
            border: none;
        }

        table caption {
            padding: 0.75rem 1rem;
            border-radius: 6px 6px 0 0;
            color: whitesmoke;
            font-size: 1.35rem;
            background-color: var(--accent-color);
        }

        table thead {
            position: absolute;
            width: 1px;
            height: 1px;
            clip: rect(0 0 0 0);
            overflow: hidden;
        }

        table tbody tr {
            margin-bottom: 2rem;
            display: block;
        }

        table td {
            font-size: 0.875rem;
            text-align: right;
            display: block;
        }

        table td:before {
            content: attr(data-label);
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.075rem;
            text-transform: uppercase;
            float: left;
            opacity: 0.5;
        }

        table td:not(:last-child) {
            border-bottom: 1px solid var(--insideBorderColor);
        }

    }
</style>
</head>

<body>

    <div class="hero-image">
        <div class="hero-text">
            <div id="example2">
                <article class="tabs">
                    <table id="my_table" class="display" style="width:100%;padding-top:10px;border:none;">
                        <thead>
                            <tr>
                                <h4 style="text-align:center;padding-top:5px;font-weight:bold;">รายชื่อสถานี</h4>
                            </tr>
                            <tr>

                                <th class="th_btn">สถานีต้นทาง</th>
                                <th class="th_btn">เวลาต้นทาง</th>
                                <th class="th_btn">สถานีปลายทาง</th>
                                <th class="th_btn">เวลาปลายทาง</th>
                                <th class="th_btn">เวลารถออก</th>
                                <th class="th_btn">ราคาตั๋วรถตู้</th>
                                <th class="th_btn">จำนวนที่นั่ง</th>
                                <th class="th_btn">ราคาฝากพัสดุ</th>
                                <th class="th_btn">ชื่อบริษัท</th>
                                <th class="th_btn">หมายเลขทะเบียนรถ</th>
                                <th class="th_btn">จอง</th>
                            </tr>

                        </thead>
                        <tbody>


                        </tbody>

                    </table>
                </article>

                <?php
                $p_origin = $_GET['p_origin'];
                $t_terminal = $_GET['t_terminal'];
                ?>

                <input type="hidden" name="p_origin" id="p_origin" value="<?= $p_origin; ?>">
                <input type="hidden" name="t_terminal" id="t_terminal" value="<?= $t_terminal; ?>">
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
    <script>
        let link = "service/stationObject.php";

        $(document).ready(function() {
            // debugger;
            let p_origin = $("#p_origin").val();
            let p_terminal = $("#t_terminal").val();
            // console.log(p_origin+t_terminal);

            let link_select = "service/stationObject.php?p_origin=" + p_origin + "&t_terminal=" + t_terminal;
            // console.log(link_select);

            $("#my_table").DataTable({
                processing: true,
                ajax: {
                    url: link_select,
                    data: {
                        p_origin: p_origin,
                        p_terminal: p_terminal
                    },
                    dataSrc: ''
                },
                columns: [{
                        data: "origin"
                    },
                    {
                        data: "station_ortime"
                    },
                    {
                        data: "terminal"
                    },
                    {
                        data: "station_destime"
                    },
                    {
                        data: "station_departuretime"
                    },
                    {
                        data: "station_price_tickets"
                    },
                    {
                        data: "tickets_amount"
                    },
                    {
                        data: "station_price_package"
                    },
                    {
                        data: "company_name"
                    },
                    {
                        data: "car"
                    },
                    {
                        data: function(data) {
                            return "<div class='grid-btn'>" +
                                "<a href='#' onclick=getTickets(" + data.station_id + ") class='btn_ok'>จองตั๋ว</a>" +
                                " <a href='#' onclick=getPackage(" + data.station_id + ") class='btn_od'>ฝากพัสดุ</a>" + "</div>";
                        }
                    }
                ],
                pageLength: 5,
                columnDefs: [{
                    targets: [1, 3],
                    orderable: false,
                }, ],
                oLanguage: {
                    sSearch: "ค้นหา",
                    sLengthMenu: "แสดง _MENU_ แถว",
                    sInfo: "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                    oPaginate: {
                        sFirst: "หน้าแรก",
                        sPrevious: "ก่อนหน้า",
                        sNext: "ถัดไป",
                        sLast: "หน้าสุดท้าย",
                    },
                },
            });
        });

        function getTickets(idx) {
            console.log(idx)
            Swal.fire({
                title: 'คุณต้องการจองตั๋วรถตู้?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก',
                setTimeout: 2000,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: link,
                        type: "post",
                        data: {
                            act: "getTickets",
                            id: idx
                        },
                        success: function(data) {
                            row = JSON.parse(data);
                            //alert(row[0].tickets_amount);
                           // console.log(row[0].station_id);
                            console.log(row)
                            let id = row[0].station_id;
                            let seat = row[0].tickets_amount;
                            window.location.href = "tickets.php?id=" + id+"&seat="+seat;
                        }
                    });
                }
            })


        }

        function getPackage(ido) {
            console.log(ido)
            Swal.fire({
                title: 'คุณต้องการฝากพัสดุ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก',
                setTimeout: 2000,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: link,
                        type: "post",
                        data: {
                            act_2: "getPackage",
                            id: ido
                        },
                        success: function(data) {
                            row = JSON.parse(data);
                            console.log(row[0].station_id);
                            let id = row[0].station_id;
                            window.location.href = "package.php?id=" + id;
                        }
                    });
                }
            })

        }
    </script>

    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    <!-- <script src="js/dataTable.js"></script> -->


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
        document.getElementById("defaultOpen").click();
    }

    // Get the element with id="defaultOpen" and click on it


    // var myIndex = 0;
    // carousel();

    // function carousel() {
    //     var i;
    //     var x = document.getElementsByClassName("mySlides");
    //     for (i = 0; i < x.length; i++) {
    //         x[i].style.display = "none";
    //     }
    //     myIndex++;
    //     if (myIndex > x.length) {
    //         myIndex = 1
    //     }
    //     x[myIndex - 1].style.display = "block";
    //     setTimeout(carousel, 3000); // Change image every 2 seconds
    // }
</script>


<?php include('footer.php'); ?>