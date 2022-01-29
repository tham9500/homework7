<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/signin.css">
    <link rel="stylesheet" href="../assets/css/font.css">
    <title>Document</title>
</head>
<body>
<div class="parent clearfix">
        <div class="bg-illustration">
            <!-- <img src="../assets/images/swu_icon.png" alt="logo"> -->

            <div class="burger-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>

        </div>

        <div class="login">
            <div class="container">
                
                <h1>ลงชื่อเข้าใช้<br />บัญชีของคุณ</h1>
                <!-- start form login -->
                <div class="login-form" >
                    <form action="../process/login.php" method = "POST">
                        <input type="text" name="username" placeholder="Username">
                        <input type="password" name="password" placeholder="Password">

                       

                        <button class="btn btn-primary btn-lg" type=" submit ">เข้าสู่ระบบ</button>

                    </form>
                </div>
                <!-- end form login -->
            </div>
        </div>
    </div>
</body>
</html>