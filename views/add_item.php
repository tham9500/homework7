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
    <title>Document</title>
</head>
<body>
    <?php 
        include "header.php";
    ?>
    <div class="container-xl my-3">
        <div class="row">
        <div class="row">
            
            
        </div>
        <div class="row ">
            <div class="col-lg-12 ">
                <div class="card shadow-sm " style="min-height: 400px; ">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-12">
                                <form method="POST" action="../../work7/process/uploadItem.php?op=new" enctype="multipart/form-data">
                                    <div class="col-lg-12">
                                        <label for="text">ชื่อสินค้า</label>
                                        <input type="text" class="form-control" name="item_name" value="" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="text">รายละเอียดสินค้า</label>
                                        <textarea  class="form-control" rows="4" cols="50" name="item_detail" ></textarea>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="text">ราคา</label>
                                        <input type="number" class="form-control" name="item_prince" value="" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="text">จำนวนสินค้า</label>
                                        <input type="number" class="form-control" name="item_count" value="" required>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="text">หมวดหมู่<span class="text-danger">*</span></label>
                                            <select name="cate_id" class="form-control form-select" required>
                                                <option value="">เลือก...</option>
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
                                    <div class="basic-form">                    
                                        <input type="file" name="fileImage" id="fileImage" accept=".jpg, .jpeg, .png">                                         
                                        <p>รับเฉพาะไฟล์นามสกุล .jpg, .jpeg, .png</p>
                                        
                                            
                                    </div>
                                    <br> 
                                    <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-warning w-100" type ="submit">
                                        บันทึกข้อมูล
                                        </button> 
                                    </div>
                                    <div class="col-lg-6">
                                        <button class="btn btn-secondary w-100" onclick="history.back()">
                                        ย้อนกลับ
                                        </button>
                                    </div>
                                </form>                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>