<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
            <div class="x_title">
                        <h2>ข้อมูลพนักงาน</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_idcard">รหัสประจำตัวประชาชน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="employee_idcard" name="employee_idcard" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_user">ชื่อผู้ใช้งาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="employee_user" name="employee_user" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_pass">รหัสผ่าน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="employee_pass" name="employee_pass" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ชื่อพนักงาน<span class="required">:</span> </label>
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <input type="text" name="employee_fname" required="required" placeholder="ชื่อ" class="form-control col-md-7 col-xs-12">
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <input type="text" name="employee_lname" required="required" placeholder="นามสกุล"  class="form-control col-md-7 col-xs-12">
                                </div>

                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_add">ที่อยู่<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="employee_add" name="employee_add" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_tel">เบอร์โทรศัพท์<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="tel" id="employee_tel" name="employee_tel" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>
                            
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_bird">วันเกิด<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="employee_bird" name="employee_bird" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>
                            
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_age">อายุ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="employee_age" name="employee_age" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>    

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_sex">เพศ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="employee_sex" name="employee_sex" value="<?= $employee_sex; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                    <option value="หญิง">หญิง</option>
                                    <option value="ชาย">ชาย</option>
                                </select>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type_id">ตำแหน่ง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="type_id" name="type_id" required="required" class="form-control col-md-7 col-xs-12">
                                <?php
                                                $admin = "แอดมิน";
                                                $sqld = "SELECT * FROM tb_type where type_name NOT LIKE '$admin'";
                                                $rsd=$cls_conn->select_base($sqld);
                                                while($rowd=mysqli_fetch_array($rsd))
                                                {
                                            ?>
                                                <option value="<?=$rowd['type_id'];?>"><?=$rowd['type_name'];?></option>
                                            <?php
                                                }
                                            ?>
                                </select> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_image">รูปประจำตัว<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" id="employee_image" name="employee_image" required="required" class="form-control col-md-7 col-xs-12"> 
                                <div class="">
                                        <img src="../../upload/" alt="" width="100px" id="img" style="margin-top:10px;">
                                        <script>
                                            employee_image.onchange = evt => {
                                                const [file] = employee_image.files
                                                if (file) {
                                                    img.src = URL.createObjectURL(file)
                                                }
                                            }
                                        </script>
                                    </div>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company_id">ชื่อบริษัท<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="company_id" name="company_id" required="required" class="form-control col-md-7 col-xs-12">
                                <?php
                                                $sqld = "SELECT * FROM `tb_company`";
                                                $rsd=$cls_conn->select_base($sqld);
                                                while($rowd=mysqli_fetch_array($rsd))
                                                {
                                            ?>
                                                <option value="<?=$rowd['company_id'];?>"><?=$rowd['company_name'];?></option>
                                            <?php
                                                }
                                            ?>
                                </select> 
                            </div>
                        </div>  

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
                                <a onclick="gotoBack()" class="btn btn-danger">ยกเลิก</a>
                                <script>
                                    function gotoBack() {
                                        window.location.href = "show_employee.php";

                                    }
                                </script>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                       
                            $employee_idcard=$_POST['employee_idcard'];
                            $employee_user=$_POST['employee_user'];
                            $employee_pass=$_POST['employee_pass'];
                            $employee_fname=$_POST['employee_fname'];
                            $employee_lname=$_POST['employee_lname'];
                            $employee_add=$_POST['employee_add'];
                            $employee_tel=$_POST['employee_tel'];
                            $employee_bird=$_POST['employee_bird'];
                            $employee_age=$_POST['employee_age'];
                            $employee_sex=$_POST['employee_sex'];
                            $type_id=$_POST['type_id'];   

                           if($_FILES['employee_image']['name'] != ""){
                            $datetime = date("dmYHis");
                            $file_name = substr($_FILES['employee_image']['name'], -4);
                            $employee_image = $datetime . '_p1' . $file_name;
                            $target = "../../upload/" . $employee_image;
                            move_uploaded_file($_FILES['employee_image']['tmp_name'],$target);
                        }
                            $company_id=$_POST['company_id'];

                            $check = "select * from tb_employee where employee_user='$employee_user'";
                            $re = $cls_conn->select_base($check);
                            if($re->num_rows >= 1){
                                echo $cls_conn->show_message('มียูสเซอร์อยู่ในระบบแล้ว กรุณากรอกข้อมูลใหม่');
                            }else{
                                $sql=" insert into `tb_employee`(`employee_idcard`,`employee_user`, `employee_pass`, `employee_fname`, `employee_lname`, `employee_add`, `employee_tel`, `employee_bird`, `employee_age`, `employee_sex`, `type_id`, `employee_image`, `company_id`)";
                                $sql.=" values ('$employee_idcard','$employee_user','$employee_pass','$employee_fname','$employee_lname','$employee_add','$employee_tel','$employee_bird','$employee_age','$employee_sex','$type_id','$employee_image','$company_id')";
                                
                                if($cls_conn->write_base($sql)==true)
                            
                                {
                                    echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                                    echo $cls_conn->goto_page(1,'show_employee.php');
                                }
                                else
                                {
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
<?php include('footer.php'); ?>
