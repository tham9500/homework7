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
    <title>home</title>
</head>
<body >
    <?php 
        include "header.php";
        include "../process/connect.php";
        $sql = "SELECT * FROM item_cate ORDER BY cate_id ASC ";
        $sql_result = mysqli_query($connect,$sql);
        $iduser = $_SESSION["user_id"];
        $sql_sumprince = "SELECT SUM(item_prince) FROM item_collection WHERE user_id = $iduser";
        $many = mysqli_query($connect,$sql_sumprince);
        $how_many = mysqli_fetch_array($many);
    ?>
    <div class="container-xl my-3">
        <div class="row">
          
        <?php 
            if(isset($_GET["result"]) AND $_GET["result"] == "1"){
                echo '
                <div class="col-lg-12">
                  <div class="alert alert-success shadow-sm" role="alert">
                    ลบสินค้าออกจากตะกร้าเเล้ว
                  </div>
                </div>
                ';
              }elseif(isset($_GET["result"]) AND $_GET["result"] == "2"){
                echo '
                <div class="col-lg-12">
                  <div class="alert alert-danger shadow-sm" role="alert">
                    ลดจำนวนสินค้าเเล้ว
                  </div>
                </div>
                ';
              }elseif(isset($_GET["result"]) AND $_GET["result"] == "3"){
                echo '
                <div class="col-lg-12">
                  <div class="alert alert-danger shadow-sm" role="alert">
                    สินค้าเกินจำนวนที่กำหนด
                  </div>
                </div>
                ';
              }elseif(isset($_GET["result"]) AND $_GET["result"] == "4"){
                echo '
                <div class="col-lg-12">
                  <div class="alert alert-danger shadow-sm" role="alert">
                    เพิ่มสินค้าเเล้ว
                  </div>
                </div>
                ';
              }
              elseif(isset($_GET["result"]) AND $_GET["result"] == "5"){
                echo '
                <div class="col-lg-12">
                  <div class="alert alert-danger shadow-sm" role="alert">
                    ลบรายการสินค้าออกเเล้ว
                  </div>
                </div>
                ';
              }
        ?>
            <div class="row ">
            <div class="col-lg-12 ">
                <div class="card shadow-sm " style="min-height: 400px; ">
                    <div class="card-body">
                        <table class="table" id="table_id">
                            <thead>
                                <tr>
                                    <th class="text-center ">ลำดับ</th>
                                    <th class="text-center ">ชื่อสินค้า</th>
                                    <?php 
                                        if($_SESSION["role"]=="admin"){
                                            echo '<th class="text-center ">ชื่อผู้ซื้อ</th>';
                                        }
                                    ?>
                                    <th class="text-center ">ราคา</th>
                                    <th class="text-center ">จำนวน</th>
                                    <th class="text-center ">ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                include "../process/connect.php";
                                
                                if($_SESSION["role"]=="admin"){
                                    $sql_data = "SELECT *FROM item_collection";
                                    $sql_getData = mysqli_query($connect,$sql_data);
                                    $number = 0;
                                    while($data = mysqli_fetch_array($sql_getData)){
                                        $number++;
                                        echo "<tr>" . "<td>" .$number."</td> ";
                                        $id = $data["user_id"];
                                        $sql_user = "SELECT *FROM user_data WHERE user_id = $id";
                                        $get_user = mysqli_query($connect,$sql_user);
                                        $user_data = mysqli_fetch_array($get_user);
                                        echo '<td>'.$data["item_name"]."</td>";
                                        echo '<td class="text-center">'.$user_data["username"]."</td>";
                                        echo '<td class="text-center">'.$data["item_prince"]."</td>";
                                        
                                        echo '<td class="d-flex justify-content-center">';
                                            echo '<div class="col-sm-4">';
                                                echo '<div class="input-group">'; 
                                                    echo '<a class="btn btn-primary" href="../process/manage_collect.php?result=down&id_collect='.$data["collection_id"].'">-</a>'; 
                                                    echo '<input type="text" class="form-control text-center" value="'.$data["item_count"].'">'; 
                                                    echo '<a class="btn btn-primary" href="../process/manage_collect.php?result=up&id_collect='.$data["collection_id"].'">+</a>'; 
                                                echo '</div>';
                                            echo '</div>';
                                        echo "</td>";          
                                        echo '<td class="text-center">';
                                            echo '<a class="btn btn-danger" href="../process/manage_collect.php?result=del&id_collect='.$data["collection_id"].'">ลบ</a>'; 
                                        echo "</td>";
                                        echo '</tr>';
                                    }
                                }elseif($_SESSION["role"]=="user"){
                                  $user = $_SESSION["user_id"];
                                  $sql_data = "SELECT *FROM item_collection WHERE user_id = $user";
                                  $sql_getData = mysqli_query($connect,$sql_data);
                                  $number = 0;
                                  while($data = mysqli_fetch_array($sql_getData)){
                                      $number++;
                                      echo "<tr>" . "<td>" .$number."</td> ";
                                      $id = $data["user_id"];
                                      $sql_user = "SELECT *FROM user_data WHERE user_id = $id";
                                      $get_user = mysqli_query($connect,$sql_user);
                                      $user_data = mysqli_fetch_array($get_user);
                                      echo '<td>'.$data["item_name"]."</td>";
                                      echo '<td class="text-center">'.$data["item_prince"]."</td>";
                                      
                                      echo '<td class="d-flex justify-content-center">';
                                          echo '<div class="col-sm-4">';
                                              echo '<div class="input-group">'; 
                                                  echo '<a class="btn btn-primary" href="../process/manage_collect.php?result=down&id_collect='.$data["collection_id"].'">-</a>'; 
                                                  echo '<input type="text" class="form-control text-center" value="'.$data["item_count"].'">'; 
                                                  echo '<a class="btn btn-primary" href="../process/manage_collect.php?result=up&id_collect='.$data["collection_id"].'">+</a>'; 
                                              echo '</div>';
                                          echo '</div>';
                                      echo "</td>";          
                                      echo '<td class="text-center">';
                                          echo '<a class="btn btn-danger" href="../process/manage_collect.php?result=del&id_collect='.$data["collection_id"].'">ลบ</a>'; 
                                      echo "</td>";
                                      echo '</tr>';
                                  }
                              }

                            ?>
                            </tbody>
                        </table>
                        
                    </div>
                    
                </div>
            </div>
            
        </div>
        <div class="col-sm-2">
                  <div class="alert alert-warning shadow-sm" role="alert">
                    <p>ราคาทั้งหมด <?php echo $how_many["SUM(item_prince)"];?> บาท</p>
                  </div>
                </div>
        
            
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>