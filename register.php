<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <title>Register</title>
</head>

<body>
  <section class="vh-100" style="background-color:#AC4FE1 ;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-9">

          <h4 class="text-white mb-4">สมัครสมาชิกผู้ดูแลระบบ</h4>

          <div class="card" style="border-radius: 15px;">
            <div class="card-body">

              <form action="" method="post" enctype="multipart/form-data">
                <div class="row align-items-center pt-4 pb-3">
                  <div class="col-md-3 ps-5">
                    <h6 class="mb-0">ชื่อ-นามสกุล</h6>
                  </div>
                  <div class="col-md-4">

                    <input type="text" name="admin_fname" class="form-control form-control-lg" placeholder="ชื่อ" require />

                  </div>
                  <div class="col-md-4">

                    <input type="text" name="admin_lname" class="form-control form-control-lg" placeholder="นามสกุล" require />

                  </div>


                </div>


                <div class="row align-items-center py-3">
                  <div class="col-md-3 ps-5">

                    <h6 class="mb-0">อีเมล</h6>

                  </div>
                  <div class="col-md-9 pe-5">

                    <input type="email" name="admin_email" class="form-control form-control-lg" placeholder="example@example.com" require />

                  </div>
                </div>


                <div class="row align-items-center py-3">
                  <div class="col-md-3 ps-5">

                    <h6 class="mb-0">เบอร์โทรศัพท์</h6>

                  </div>
                  <div class="col-md-9 pe-5">

                    <input type="tel" name="admin_tel" class="form-control form-control-lg" require />

                  </div>
                </div>

                <div class="row align-items-center py-3">
                  <div class="col-md-3 ps-5">

                    <h6 class="mb-0">username</h6>

                  </div>
                  <div class="col-md-9 pe-5">

                    <input type="text" name="admin_username" class="form-control form-control-lg" require />

                  </div>
                </div>

                <div class="row align-items-center py-3">
                  <div class="col-md-3 ps-5">

                    <h6 class="mb-0">password</h6>

                  </div>
                  <div class="col-md-9 pe-5">

                    <input type="password" name="admin_password" class="form-control form-control-lg" require />

                  </div>
                </div>


                <div class="row align-items-center py-3">
                  <div class="col-md-3 ps-5">

                    <h6 class="mb-0">อัพโหลดรูป</h6>

                  </div>
                  <div class="col-md-9 pe-5">

                    <input class="form-control form-control-lg" id="admin_image" name="admin_image" type="file" />
                    <img src="upload/" alt="" width="100px" id="img" style="margin-top:10px;">
                    <script>
                      admin_image.onchange = evt => {
                        const [file] = admin_image.files
                        if (file) {
                          img.src = URL.createObjectURL(file)
                        }
                      }
                    </script>

                  </div>
                </div>


                <div class="px-5 py-4">
                  <div class="row">
                   

                    <div class="col-auto">
                      <a onclick="goback()" name="goback" class="btn btn-danger btn-lg">กลับหน้าแรก</a>
                      <script>
                        function goback() {
                          window.history.back();
                        }
                      </script>

                    </div>

                    <div class="col-auto">
                      <button type="submit" name="submit" class="btn btn-primary btn-lg">ตกลง</button>

                    </div>
                  </div>
                </div>

              </form>

              <?php
              include("class_conn.php");
              $cls_conn = new class_conn();

              if (isset($_POST['submit'])) {


                $admin_fname = $_POST['admin_fname'];
                $admin_lname = $_POST['admin_lname'];
                $admin_email = $_POST['admin_email'];
                $admin_tel = $_POST['admin_tel'];
                $admin_username = $_POST['admin_username'];
                $admin_password = $_POST['admin_password'];

                if ($_FILES['admin_image']['name'] != "") {
                  $datetime = date("dmYHis");
                  $file_name = substr($_FILES['admin_image']['name'], -4);
                  $admin_image = $datetime . '_p1' . $file_name;
                  $target = "upload/" . $admin_image;
                  move_uploaded_file($_FILES['admin_image']['tmp_name'], $target);
                }

                        $type = "แอดมิน";
                        $sql_type = "SELECT `type_id` FROM `tb_type` WHERE `type_name` = '$type'";
                        $result = $cls_conn->select_base($sql_type);
                        $row = $result->fetch_assoc();
                        $type_admin = $row['type_id'];
                

                        $check = "select * from tb_admin where admin_email = '$admin_email' and admin_username = '$admin_username'";
                        $res = $cls_conn->select_base($check);
                        if ($res->num_rows >= 1) {
                            echo $cls_conn->show_message('มีผู้ใช้งานอีเมลหรือยูสเซอร์เนมนี้แล้ว กรุณาสมัครสมาชิกใหม่');
                        } else {

                            $sql = " insert into `tb_admin`(`admin_fname`, `admin_lname`, `admin_email`, `admin_tel`, `admin_username`, `admin_password`, `admin_image`,`type_id`)";
                            $sql .= " values ('$admin_fname','$admin_lname','$admin_email','$admin_tel','$admin_username','$admin_password','$admin_image','$type_admin')";
                            // die($sql);

                            if ($cls_conn->write_base($sql) == true) {
                                echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(1, 'login.php');
                            } else {
                                echo $cls_conn->show_message('บันทึกข้อมูลไม่สำเร็จ');
                                echo $sql;
                            }
                        }
              }

              ?>

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
</body>

</html>