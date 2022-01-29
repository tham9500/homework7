<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/font.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <?php 
        include "header.php";
        include '../../work7/process/connect.php';
        $id=$_GET["target"];
        $sql_allitem = "SELECT * FROM item_detail WHERE item_id=$id";
        $result_allid = mysqli_query($connect, $sql_allitem);
        while($row2 = mysqli_fetch_array($result_allid)) {
        };
    ?>
    
    <div class="container-xl my-3">
        <div class="row">
        <div class="row">
        <form method="POST" action="../../work7/process/updateItem.php?op=edit" enctype="multipart/form-data">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="card shadow-sm " style="min-height: 400px; ">
                        <div class="card-body ">
                        <?php
                            include '../../work7/process/connect.php';
                            $id=$_GET["target"];
                            $sql_allitem = "SELECT * FROM item_detail WHERE item_id=$id";
                            $result_allid = mysqli_query($connect, $sql_allitem);
                            while($row2 = mysqli_fetch_array($result_allid)) {
                                
                            };
                        ?>
                        <div class="row">
                                <div class="col-md-4">
                                <?php
                                    include '../../work7/process/connect.php';
                                    $id=$_GET["target"];
                                    $sql_allitem = "SELECT * FROM item_detail WHERE item_id=$id";
                                    $result_allid = mysqli_query($connect, $sql_allitem);
                                    while($row2 = mysqli_fetch_array($result_allid)) {
                                        echo '<img src="../images/'.$row2["image_name"].'" class="card-img-top" alt="..." style="width: 150px;">';
                                    };
                                ?>
                                <br>
                                <br>
                                <br>
                                <div class="basic-form">                    
                                    <input type="file" name="fileImage" id="fileImage" accept=".jpg, .jpeg, .png">                                         
                                    <p>รับเฉพาะไฟล์นามสกุล .jpg, .jpeg, .png</p>
                                </div>
                                </div>
                                <div class="col-md-8">
                                    <?php
                                        include '../../work7/process/connect.php';
                                        $id=$_GET["target"];
                                        $sql_allitem = "SELECT * FROM item_detail WHERE item_id=$id";
                                        $result_allid = mysqli_query($connect, $sql_allitem);
                                        $row2 = mysqli_fetch_array($result_allid);
                                    ?>
                                    <div class="col-lg-6 col-md-12 col-sm-12 mt-1">
                                        <label for="text">ชื่อสินค้า</label>
                                        <input type="text" class="form-control" name="item_name" value="<?php echo $row2["item_name"];?>">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 mt-1">
                                        <label for="text">รายละเอียดสินค้า</label>
                                        <input type="text" class="form-control" name="item_detail" value="<?php echo $row2["item_detail"];?>">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 mt-1">
                                        <label for="text">ราคาสินค้า</label>
                                        <input type="number" class="form-control" name="item_prince" value="<?php echo $row2["item_prince"];?>">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                            <label for="text">หมวดหมู่<span class="text-danger">*</span></label>
                                                <select name="cate_id" class="form-control form-select" required>
                                                <?php echo '<option value="'.$row2["cate_id"].'">'.$row2["type"].'</option>'; ?>
                                                    <?php
                                                    include '../../work7/process/connect.php';
                                                    $sql_allid = "SELECT * FROM item_cate";
                                                    $result_allid = mysqli_query($connect, $sql_allid);
                                                    while($row2 = mysqli_fetch_array($result_allid)) {
                                                    echo '<option value="'.$row2["cate_id"].'">'.$row2["cate_name"].'</option>';
                                                    };
                                                    ?>
                                                </select>
                                    </div>
                                    <br>
                                    <div class="col-lg-6 col-md-12 col-sm-12 mt-1">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                        <button  class="btn btn-success" type="submit">ยืนยัน</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>         
        
    </div>
</div>

</body>
</html>