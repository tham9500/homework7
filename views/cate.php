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
        <div class="row">
        <div class="row">
            
            <div class="col-lg-2">
                <div class="col-lg-12">
                    <div class="card shadow-sm mb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            เพิ่มหมวด
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">เพิ่มหมวด</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../process/add_cate.php" method="POST">
                    <div class="col-lg-8">
                        <label for="text">ชื่อหมวด</label>
                        <input type="text" class="form-control" name="cate_name" value="" required>
                        <br>
                        
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                        <button  class="btn btn-success" type="submit">ยืนยัน</button>
                    </div>
                    
                </form>
            </div>
            </div>
        </div>
        </div>

        <div class="row ">
            <div class="col-lg-12 ">
                <div class="card shadow-sm " style="min-height: 400px; ">
                    <div class="card-body ">
                        <table class="table table-striped " id="table_id">
                            <thead class="table-navy-blue ">
                                <tr>
                                    <th class="text-center ">ID</th>
                                    <th class="text-center ">ชื่อหมวด</th>
                                    <th class="text-center ">แก้ไข</th>
                                    <th class="text-center ">ลบ</th>
                                   
                            </thead>
                            <?php 
                                include "../process/connect.php";
                                $sql = "SELECT * FROM item_cate ORDER BY cate_id ASC ";
                                $sql_result = mysqli_query($connect,$sql);
                                while($result_data = mysqli_fetch_array($sql_result)){
                                    echo '<td class="text-center">'.$result_data["cate_id"].'</td>';
                                    echo '<td class="text-center">'.$result_data["cate_name"].'</td>';
                                    echo '<td class="text-center"><a class="btn btn-info" href="editCate.php?target='.$result_data["cate_id"].'">แก้ไข</a></td>';
                                    echo '<td class="text-center"><a class="btn btn-outline-danger" href="../../work7/process/delCate.php?target='.$result_data["cate_id"].'">ลบ</a></td>';
                                    echo '</tr>';                                  
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>