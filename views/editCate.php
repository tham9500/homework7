<?php 
    session_start();
?>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php 
        include "header.php";
    ?>
    <div class="container-xl my-3">
    <br>
    <div class="content">
        <div class="position-static">
            <div class="row ">
                <div class="col-lg-12 ">
                    <div class="card shadow-sm " style="min-height: 400px; ">
                        <div class="card-body ">
                            <h1>
                                แก้ไขหมวด
                            </h1>
                            <?php
                                include "../process/connect.php";
                                $target = $_GET["target"];
                                $sql = "SELECT * FROM item_cate WHERE cate_id = '$target' ";
                                $sql_cate = mysqli_query($connect, $sql);
                                $result_Data = mysqli_fetch_array($sql_cate);
                                // echo $target;
                                // echo $result_Data["cate_name"];
                            ?>
                            <form action="../../work7/process/editCate.php" method="POST">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="text">Category ID</label>
                                    <input type="text" class="form-control" name="cate_id" value="<?php echo $result_Data["cate_id"];?>" readonly>                            </div>
                                <div class="col-sm-4">
                                    <label for="text">ชื่อหมวด</label>
                                    <input type="text" class="form-control" name="cateName" value="<?php echo $result_Data["cate_name"];?>">                            </div>
                            </div>
                            <br>
                            <div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                <button  class="btn btn-success" type="submit">ยืนยัน</button>
                            </div>
                                
                        </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    </div>
    
</body>
</html>