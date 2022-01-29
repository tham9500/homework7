<?php
    session_start();
    include "connect.php";
    $password = mysqli_real_escape_string($connect,$_POST["password"]);
    $username = mysqli_real_escape_string($connect,$_POST["username"]);
    $sql="SELECT username,password FROM user_data WHERE username='$username'and password='$password'";
    $mysql_result=mysqli_query($connect,$sql);
    if($mysql_result){
        echo "complete";
        $_SESSION["username"]=$username;
        $_SESSION["password"]=$password;
        header('location: ../../../../work7/views/home.php');
    }else{
        echo "fail";
    }
?>