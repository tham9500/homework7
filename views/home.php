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
    <title>home</title>
</head>
<body >
    <?php 
        include "header.php";
        include "../process/connect.php";
        $sql = "SELECT * FROM item_cate ORDER BY cate_id ASC ";
        $sql_result = mysqli_query($connect,$sql);
    ?>
    <div class="container-xl my-3">
        <div class="row">
        <div class="row">
            <form action="" method="POST">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <div class="card shadow mb-3">
                            <div class="card-body pb-0">
                                <div class="row mb-4">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        
                                        <select name="cate" id="cate_id" class="form-control form-select">
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
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input type="text" name="search" id="search" class="form-control" placeholder="ค้นหาสินค้า">
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-">
                                        
                                        <button class="btn btn-success w-100" type="submit" onclick="search();">ค้นหา</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
            
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12" style="display: flex;justify-content: center;align-items: center;">
                <?php
                    include '../../work7/process/connect.php';
                    $countTest_row = $connect->query("SELECT item_id FROM item_detail");
                    $rowTest_cnt = $countTest_row->num_rows;
                ?>
                <p>จำนวนสินค้าที่มี <?php echo $rowTest_cnt;?> ชิ้น<p>
            </div> 
        </div>
        <br>
        <br>
        <br>
        <div class="row ">
        <div class="py-3">
            <div class="container">
                <div class="row gy-3">
                    <?php
                        include '../../work7/process/connect.php';
                        if(empty($_POST['cate'])){
                            $select = "";    
                        }else{
                            $select = $_POST["cate"];
                        }

                        if(empty($_POST['search'])){
                            $search = "";
                        }else{
                            $search = $_POST["search"];
                        }
                        
                        
                        if($select==""&&$search==""){
                            $sql_allitem = "SELECT * FROM item_detail";
                        }else if($select!=""&&$search!=""){
                            $sql_allitem = "SELECT * FROM item_detail WHERE cate_id=$select and item_name LIKE '%$search%'";
                        }else if($select==""&&$search!=""){
                            $sql_allitem = "SELECT * FROM item_detail WHERE item_name LIKE '%$search%'";
                        }else if($select!=""&&$search==""){
                            $sql_allitem = "SELECT * FROM item_detail WHERE cate_id=$select";
                        }
                        
                        $result_allid = mysqli_query($connect, $sql_allitem);
                        while($row2 = mysqli_fetch_array($result_allid)) {
                            echo '<div class="col-md-3">';
                                echo '<div class="card shadow-lg">';
                                    echo '<div class="card-body">';
                                        echo '<img src="../images/'.$row2["image_name"].'" class="card-img-top shadow" alt="..." style="width: 150px;">';
                                        echo '<br>';
                                        echo '<br>';
                                        echo '<h3 class="card-title">'.$row2["item_name"].'</h3>';
                                        // echo '<p class="card-text">'.$row2["item_detail"].'</p>';
                                        echo '<h5 class="card-title">'.$row2["item_prince"]." บาท".'</h5>';
                                        echo '<div class="btn-group shadow">';
                                                echo '<a href="detail_item.php?target='.$row2["item_id"].'" class="btn btn-info" >ดู</a>';    
                                                echo '<a href="edit_item.php?target='.$row2["item_id"].'" class="btn btn-primary">แก้ไข</a>';    
                                                echo '<a href="../../work7/process/delItem.php?target='.$row2["item_id"].'" class="btn btn-danger">ลบ</a>';    
                                        echo '</div>';
                                        
                                        
                                        
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        };
                    ?>
                    
                </div>
            </div>
        </div>
        
            
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>