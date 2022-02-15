<?php
    session_start();
    include "connect.php";
    $password = mysqli_real_escape_string($connect,$_POST["password"]);
    $username = mysqli_real_escape_string($connect,$_POST["username"]);
    $sql="SELECT user_id,username,password,role FROM user_data WHERE username='$username'and password='$password'";
    $mysql_result=mysqli_query($connect,$sql);
    $data_q = mysqli_fetch_array($mysql_result);
    if($mysql_result){
        echo "complete";
        $_SESSION["user_id"]=$data_q["user_id"];
        $_SESSION["username"]=$username;
        $_SESSION["password"]=$password;
        $_SESSION["role"]=$data_q["role"];
        header('location: ../../../../work7/views/home.php');
    }else{
        echo "fail";
    }
?>