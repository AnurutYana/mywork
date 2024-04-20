<?php include('header.php');


?>


<style>
     body {
         margin: 0;
         font-family: Arial, Helvetica, sans-serif;
     }

     .hero-image {
         background-image: url("../../image/travel.png");
         opacity: 80%;
         height: 500px;
         background-position: center;
         background-repeat: no-repeat;
         background-size: cover;
         position: relative;
     }

     .hero-text {

         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         color: white;
     }

     #example2 {
         box-sizing: content-box;
         width: 500px;
         height: 300px;
         padding: 30px;
         background-color: #F9FAFB;
         color: #343333;
         border-radius: 8px solid black;
         box-shadow: 1px 1px 10px 0px #343333;
     }

     input[type=radio] {
         accent-color: green;
     }

     .row-items {
         display: grid;
         grid-template-columns: repeat(auto-fit, minmax(250px, auto));
         grid-gap: 2rem;
         align-items: center;
         text-align: center;
         margin-top: 5rem;
     }

     main .site-content .post-content>.post-image .post-info {
         background: var(--sky);
         padding: 1rem;
         position: absolute;
         bottom: 0%;
         left: 20vw;
         border-radius: 3rem;
     }

     main .site-content>.post-image>div {
         overflow: hidden;
     }

     main .site-content .post-content>.post-image .img {
         width: 100%;
     }

     .btn_ok {
         background-color: #2858EE;
         color: white;
         padding: 8px 15px;
         border: none;
     }

     .text1{
        margin: 10px 0 30px 0;
     }
 </style>
 </head>
 <body>
     <div class="hero-image">

         <div class="hero-text">
             <div id="example2">
                 <h2 class="text1">จองเที่ยวรถตู้</h2>
              
                 <form method="post" id="formStation" name="formStation">
                     <row>
                         <h5>สถานีต้นทาง</h5>
                         <div class="form-row tm-search-form-row">
                             <div class="form-group tm-form-element tm-form-element-2">
                                 <select name="origin_province" id="origin_province" class="form-control">
                                <option value="" selected disabled>เลือกสถานีต้นทาง</option>
                                 <?php
                                    $sqld = "SELECT * FROM `tb_station_origin`";
                                    $rsd = $cls_conn->select_base($sqld);
                                    while ($rowd = mysqli_fetch_array($rsd)) {
                                    ?>
                                        <option value="<?= $rowd['origin_id']; ?>"><?= $rowd['origin_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                 </select>
                             </div>
                         </div>
                     </row>
                     <row>
                         <h5>สถานีปลายทาง</h5>
                         <div class="form-row tm-search-form-row">
                             <div class="form-group tm-form-element tm-form-element-2">
                                 <select name="terminal_province" id="terminal_province" class="form-control">
                                 <option value="" selected disabled>เลือกสถานีปลายทาง</option>

                                 <?php
                                    $sqld = "SELECT * FROM `tb_station_terminal`";
                                    $rsd = $cls_conn->select_base($sqld);
                                    while ($rowd = mysqli_fetch_array($rsd)) {
                                    ?>
                                        <option value="<?= $rowd['terminal_id']; ?>"><?= $rowd['terminal_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                 </select>
                             </div>
                         </div>
                     </row>
                    
                        
                        <button type="submit" class="btn_ok" name="btn_ok" id="btn_ok">ค้นหา</button>
                     </row>
                 </form>

             </div>
         </div>
     </div>
     <table>


         <!-- <br><br><br> -->
<!-- 
         <div id="row-items">
             <img src="../../image/bangkok.png" width="240" height="240">
             <img src="../../image/chiangmai.png" width="290" height="290">
             <img src="../../image/Phi Phi Island.png" width="350" height="350">
             <img src="../../image/phuket.png" width="290" height="290">
             <img src="../../image/Songkhla.png" width="240" height="240">
         </div> -->
        </body>
    </div>
    
<script src="js/dataTable.js"></script>

 <?php include('footer.php'); ?>