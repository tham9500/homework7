<?php 
    include "connect.php";
    $user_id = $_REQUEST["user_id"];
    $item_id = $_REQUEST["target"];
    echo $user_id;
    echo "<br>";
    echo $item_id;
    $sql_getItem = "SELECT *FROM item_detail WHERE item_id = $item_id";
    $Q_data = mysqli_query($connect,$sql_getItem);
    $data_item = mysqli_fetch_array($Q_data);
    $prince = $data_item["item_prince"];
    $counting = $data_item["item_count"];
    $sql_getDATA = "SELECT *FROM item_collection WHERE user_id = $user_id AND item_id = $item_id";
    $data_getDATA = mysqli_query($connect,$sql_getDATA);
    $data_itemGet = mysqli_fetch_array($data_getDATA);
    if(!empty($data_itemGet["item_id"]&&!empty($data_itemGet["user_id"]))){
        if($data_item["item_count"]==0){
            header('location: ../../../../work7/views/home.php?result=0');
        }else{
            if($data_itemGet["item_count"]>=10){
                header('location: ../../../../work7/views/home.php?result=2');
            }else{
                $status = "have";
                $item_name = $data_itemGet["item_name"];
                $image_name = $data_itemGet["image_name"];
                $count = $data_itemGet["item_count"];
                $item_count = ++$count;
                $item_many = $data_itemGet["item_prince"];
                $item_prince = $data_itemGet["item_prince"]+$prince;
                $sql_data = "UPDATE `item_collection` SET `item_id`='$item_id',`user_id`='$user_id',`item_name`='$item_name',`image_name`='$image_name',`item_count`='$item_count',`item_prince`='$item_prince' WHERE user_id = $user_id AND item_id = $item_id";
                $num = $counting-1;
                $sql_count = "UPDATE item_detail SET item_count=$num WHERE item_id = $item_id";
            }
        }
        
    }else{
        if($data_item["item_count"]==0){
            header('location: ../../../../work7/views/home.php?result=0');
        }else{
            $status = "not";
            $item_name = $data_item["item_name"];
            $image_name = $data_item["image_name"];
            $item_count = 1;
            $item_prince = $data_item["item_prince"];
            $sql_data = "INSERT INTO `item_collection`(`item_id`, `user_id`, `item_name`, `image_name`, `item_count`, `item_prince`) VALUES ('$item_id','$user_id','$item_name','$image_name','$item_count','$item_prince')";
            $num = $counting-1;
            $sql_count = "UPDATE item_detail SET item_count=$num WHERE item_id = $item_id";
        }
    }
    $up_data = mysqli_query($connect,$sql_data);
    $down_data = mysqli_query($connect,$sql_count);
    echo $status;
    echo $sql_data;
    echo "<br>";
    echo $sql_count;
    header('location: ../../../../work7/views/home.php?result=1');
?>