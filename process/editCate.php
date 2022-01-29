<?php 
    include "connect.php";
    $data = file_get_contents("php://input");
    $result = json_decode($data, true);
    $cate_id = mysqli_real_escape_string($connect,$_POST["cate_id"]);
    $cate_name = mysqli_real_escape_string($connect,$_POST["cateName"]);
    echo $cate_id;
    echo $cate_name;
    $sql = "UPDATE item_cate SET `cate_id`='$cate_id',`cate_name`='$cate_name' WHERE cate_id='$cate_id'";
    $mysql_result=mysqli_query($connect,$sql);
    
    if ($mysql_result) {
        echo "complete";
        header('location:../../../../work7/views/cate.php');
    } else {
        echo "error";
    }
?>