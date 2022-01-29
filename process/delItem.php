<?php 
    include "connect.php";
    $data = file_get_contents("php://input");
    $result = json_decode($data, true);
    $target = $_GET["target"];
    $sql = "DELETE FROM item_detail WHERE item_id = '$target'";
    $sql_item = mysqli_query($connect, $sql);
    
                                
                            
    if ($sql_item) {
        echo "complete";
        header('location:../../../../work7/views/home.php');
    } else {
        echo "error";
    }
?>