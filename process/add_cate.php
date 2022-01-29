<?php 
    include "connect.php";
    $result = json_decode($data, true);
    $cate_name = mysqli_real_escape_string($connect,$_POST["cate_name"]);
    $sql = "INSERT INTO item_cate(cate_name)VALUES('$cate_name')";
    $mysql_result=mysqli_query($connect,$sql);
    if ($mysql_result) {
        echo "complete";
        header('location:../../../../work7/views/cate.php');
    } else {
        echo "error";
    }
?>