<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Document</title>
</head>


<body>
    <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:200px">
        <h5 class="w3-bar-item">Menu</h5>
        <button class="w3-bar-item w3-button tablink" onclick="openReserve(event, 'tickets')">จองตั๋วรถตู้</button>
        <button class="w3-bar-item w3-button tablink" onclick="openReserve(event, 'package')">ฝากพัสดุ</button>
        <button class="w3-bar-item w3-button tablink" onclick="back()">กลับ</button>
    </div>

    <div style="margin-left:250px;padding-top: 40px;">

        <div id="tickets" class="w3-container reserve" style="display:none">
            <h2>ตั๋วรถตู้</h2>

            <div class="container">
                <form action="service/form_line_tickets.php" method="post">
                    <h4>บริษัท:</h4>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label">หมายเลขรถ</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label">ราคา</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label">ที่นั่ง</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label">วันที่/เวลา</label>
                                <input type="datetime-local" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label">จุดขึ้น</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label">จุดลง</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label">เวลาซื้อ</label>
                                <input type="datetime-local" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label">หมายเหตุ</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <input type="submit" value="Submit" class="btn btn-success">
                </form>
            </div>

        </div>

        <div id="package" class="w3-container reserve" style="display:none">
            <h2>Paris</h2>
            <p>Paris is the capital of France.</p>
            <p>The Paris area is one of the largest population centers in Europe, with more than 12 million inhabitants.</p>
        </div>

    </div>

    <script>
        function openReserve(evt, reserveName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("reserve");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
            }
            document.getElementById(reserveName).style.display = "block";
            evt.currentTarget.className += " w3-red";
        }

        function back() {
            window.history.back();
        }
    </script>
</body>

</html>