<?php 
    include "connect.php";
    $result = $_REQUEST["result"];
    $id_collect = $_REQUEST["id_collect"];
    $sql_collect = "SELECT *FROM item_collection WHERE collection_id = $id_collect";
    
    $sql_getCollect = mysqli_query($connect,$sql_collect);
    $sql_data = mysqli_fetch_array($sql_getCollect);
    if(empty($sql_data["item_id"])){

    }else{
        $item_id = $sql_data["item_id"];
        $money = $sql_data["item_prince"];
        $num = $sql_data["item_count"];$sql_numItem = "SELECT *FROM item_detail WHERE item_id =$item_id";
        $sql_getItem = mysqli_query($connect,$sql_numItem);
        $sqldataItem = mysqli_fetch_array($sql_getItem);
        $status = $sqldataItem["item_count"];
        $isMoney = $sqldataItem["item_prince"];
    }
    
    // $sql_numItem = "SELECT *FROM item_detail WHERE item_id =$item_id";
    // $sql_getItem = mysqli_query($connect,$sql_numItem);
    // $sqldataItem = mysqli_fetch_array($sql_getItem);
    // $status = $sqldataItem["item_count"];
    if($result == "down"){
        if($num<=1){
            $state = 1;
            ++$status;
            $sql_update = "DELETE FROM `item_collection` WHERE collection_id = $id_collect";
            $sql_count = "UPDATE item_detail SET item_count=$status WHERE item_id = $item_id";
        }else{
            $state = 2;
            $num--;
            ++$status;
            $cost = $money-$isMoney;
            $sql_update = "UPDATE item_collection SET item_count=$num,item_prince=$cost WHERE collection_id = $id_collect";
            $sql_count = "UPDATE item_detail SET item_count=$status WHERE item_id = $item_id";
        }
    }elseif($result == "up"){
        if($num>=10){
            $state = 3;
        }else{
            $state = 4;
            ++$num;
            $cost = $money+$isMoney;
            $sql_update = "UPDATE item_collection SET item_count=$num,item_prince=$cost WHERE collection_id = $id_collect";
            $sql_count = "UPDATE item_detail SET item_count=$status WHERE item_id = $item_id";
        }
    }elseif($result == "del"){
        $state = 5;
        $status=$status+$num;
        $sql_count = "UPDATE item_detail SET item_count=$status WHERE item_id = $item_id";
        $sql_update = "DELETE FROM `item_collection` WHERE collection_id = $id_collect";
    }
    echo $state;
    // echo $sql_update;
    if($state==3){

    }else{
        $sql_Qdata = mysqli_query($connect,$sql_update);
    }
        
    if(empty($sql_data["item_id"])){

    }else{
        if($state==3){

        }else{
            $sql_Pdata = mysqli_query($connect,$sql_count);

        }
    }
    
    header('location: ../../../../work7/views/collection.php?result='.$state.'');
?>