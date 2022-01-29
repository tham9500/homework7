<?php
include 'connect.php';

$new_id = strval(time());
echo $new_id;
$mypath= "../images/";
echo $_POST["item_name"];

$op = $_GET["op"];


$item_id = mysqli_real_escape_string($connect,$new_id);
$cate_id = mysqli_real_escape_string($connect,$_POST["cate_id"]);
$item_name = mysqli_real_escape_string($connect,$_POST["item_name"]);
$item_detail = mysqli_real_escape_string($connect,$_POST["item_detail"]);
$item_prince = mysqli_real_escape_string($connect,$_POST["item_prince"]);

if($op == "new"){
    echo 'new!';
    // exit(0);
    if (empty($_FILES["fileImage"]['name'])==1) {
        $file_video = NULL;
        echo "if 1";
    }else {
        $v_type = strrchr($_FILES['fileImage']['name'],".");
        $fileImage_newname = $new_id.$v_type;
        $fileImage = $fileImage_newname;
        echo "$fileImage";
    }

    if (isset($_FILES['fileImage']["name"]) == 1) {
        $v_type = strrchr($_FILES['fileImage']['name'],".");
        $fileImage_newname = $new_id.$v_type;
        $fileImage = $fileImage_newname;
        echo "$fileImage";
        move_uploaded_file($_FILES["fileImage"]["tmp_name"],$mypath.$fileImage);
        echo $_FILES['fileImage']['name'];
        $vid_upload = 1;
    }
        $sql_type =  "SELECT *FROM item_cate WHERE cate_id=$cate_id";
        $type_item = mysqli_query($connect,$sql_type);
        $type_string =mysqli_fetch_array($type_item);
        $type = $type_string["cate_name"];


        $sql_Additem = "INSERT INTO item_detail(item_id,cate_id,item_name,item_prince,item_detail,image_name,type)
        VALUES('$new_id','$cate_id','$item_name','$item_prince','$item_detail','$fileImage','$type')";
        $query_Additemt = mysqli_query($connect,$sql_Additem);
        
        header('location: ../../../../work7/views/home.php');

}
?>