<?php
include 'connect.php';
$target = $_GET["target"];
echo $target;
$sql_del1 = "DELETE FROM item_cate     
    WHERE cate_id = '$target'";
$query_delete1 = mysqli_query($connect, $sql_del1);



header('location: ../../../../work7/views/cate.php');
