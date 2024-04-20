<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Mitr&display=swap');
    body{
        font-family: 'Mitr', sans-serif;
    }
    .container{
        background-color:#fff;
        margin-left: 10vw;
        margin-right: 10vw;
        margin-bottom: 10vh;
        margin-top: 10vh;
        display: flex;
        align-items: center;
        width: auto;
        height: auto;
        justify-content: space-around;
        flex-direction: column;
        border-radius: 10px;
        border: 10px solid #F8C86C;
    }
    img{
        width: 30vw;
        height: auto;
    }
    .form{
        text-align: center;
    }
    p{
        font-size: 2.5vh;
    }
    label{
        float: left;
        font-size: 2.5vh;
        padding-left: 1.5vh;
        margin: 10px;
    }
    input{
        width: 95%;
        height: 5.5vh;
        background-color: LightGray;
        border: #BDBDBD;
        border-radius: 10px;
        font-size: 25px;
    }
</style>
<body style="background-color:#CE3935;">
    <form>
        <div class="container">
            <div  style="height:5vh;"></div>
                <div class="pic">
                <center><img src="../image/LogoRed.png" alt="Logo" class="responsive"></center>
                </div>
            <div class="form">
                <h1>เข้าสู่ระบบ</h1>

                <label for="username">ชื่อผู้ใช้</label><br>
                <input type="text" id="username" name="username"><br>
                <label for="pwd">รหัสผ่าน</label><br>
                <input type="password" id="pwd" name="password"><br>

                <a href="landing_page.php"><input style="width: 20vh; height: auto; margin: 10px; font-size: 2.5vh; background-color: #FFDA6F; font-family: 'Mitr', sans-serif;" type="submit" value="เข้าสู่ระบบ"></a>
                <p>ยังไม่มีบัญชีใช่ไหม? <a href="register.php">สมัครสมาชิก</a></p>
            </div>
            <div  style="height:5vh;"></div>
        </div>
    </form>

    
</body>
</html>