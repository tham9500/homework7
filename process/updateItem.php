<?php
include 'connect.php';
$data = file_get_contents("php://input");
$result = json_decode($data, true);
$mypath= "../images/";
echo $_POST["item_name"];

$op = $_GET["op"];

// $id_item = mysqli_real_escape_string($connect,$_POST["item_id"]);
$cate_id = mysqli_real_escape_string($connect,$_POST["cate_id"]);
$item_name = mysqli_real_escape_string($connect,$_POST["item_name"]);
$item_detail = mysqli_real_escape_string($connect,$_POST["item_detail"]);
$item_prince = mysqli_real_escape_string($connect,$_POST["item_prince"]);
$item_count = mysqli_real_escape_string($connect,$_POST["item_count"]);
    
$sql_q="SELECT *FROM item_detail WHERE item_name=item_name";
        $result_sql = mysqli_query($connect,$sql_q);
        $data = mysqli_fetch_array($result_sql);
            $name = $data["item_name"];
            if($name!=$item_name&&$item_name!=null){
                $name=$item_name;
            }
            $detail = $data["item_detail"];
            if($detail!=$item_detail&&$item_detail!=null){
                $detail=$item_detail;
            }
            $cate = $data["cate_id"];
            if($cate!=$cate_id&&$cate_id!=null){
                $cate = $cate_id;
            }
            $prince = $data["item_prince"];
            if($prince!=$item_prince&&$item_prince!=null){
                $prince=$item_prince;
            }
            $count = $data["item_prince"];
            if($count!=$item_count&&$item_count!=null){
                $count = $item_count;
            }
            $imageName = $data["image_name"]; 
            $type_name = $data["type"];
            $sql_type = "SELECT *FROM item_cate WHERE cate_id = $cate_id";
            $type_sql = mysqli_query($connect,$sql_type);
            $data_type = mysqli_fetch_array($type_sql);
            $name_cate = $data_type["cate_name"];
            if($name_cate!=$type_name){
                $type_name=$name_cate;
            }
            $id=$data["item_id"];


if($op == "edit"){
    echo 'edit!';
    // exit(0);
    if (!empty($_FILES['fileImage']['name'])) {
        move_uploaded_file($_FILES["fileImage"]["tmp_name"],$mypath.$imageName);
        $sql = "UPDATE item_detail SET item_id='$id',item_name='$name',`item_detail`='$detail',`cate_id`='$cate_id',`type`='$type_name',`image_name`='$imageName' ,`item_count`='$item_count',`item_prince`='$item_prince' WHERE item_id=$id";
        $mysql_result=mysqli_query($connect,$sql);
        echo "have";
        echo $sql;
        header('location: ../../../../work7/views/home.php');
    }else{
        $sql = "UPDATE item_detail SET `item_id`='$id',`item_name`='$name',`item_detail`='$detail',`cate_id`='$cate_id',`type`='$type_name',`image_name`='$imageName',`item_count`=$item_count,`item_prince`='$item_prince' WHERE item_id=$id";
        $mysql_result=mysqli_query($connect,$sql);
        echo "not have";
        echo $sql;
        header('location: ../../../../work7/views/home.php');
    }
    
    
        // $sql_type =  "SELECT *FROM item_cate WHERE cate_id=$cate_id";
        // $type_item = mysqli_query($connect,$sql_type);
        // $type_string =mysqli_fetch_array($type_item);
        // $type = $type_string["cate_name"];


        // $sql_Additem = "INSERT INTO item_detail(item_id,cate_id,item_name,item_prince,item_detail,image_name,type)
        // VALUES('$new_id','$cate_id','$item_name','$item_prince','$item_detail','$fileImage','$type')";
        // $query_Additemt = mysqli_query($connect,$sql_Additem);
        
        // header('location: ../../../../work7/views/home.php');

}
?>