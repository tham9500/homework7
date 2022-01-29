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
        <div class="row ">
            <div class="col-lg-12 ">
                <div class="card shadow-sm " style="min-height: 400px; ">
                    <div class="card-body ">
                    <?php
                        include '../../work7/process/connect.php';
                        $id=$_GET["target"];
                        $sql_allitem = "SELECT * FROM item_detail WHERE item_id=$id";
                        $result_allid = mysqli_query($connect, $sql_allitem);
                        while($row2 = mysqli_fetch_array($result_allid)) {
                            echo '<div class="col-md-12">';
                                echo '<div class="card">';
                                    echo '<div class="card-body">';
                                        echo '<div class="row">';
                                            echo '<div class="col-md-4 center">';
                                                echo '<div class="card-body">';
                                                    echo '<img src="../images/'.$row2["image_name"].'" class="card-img-top" alt="..." style="width: 300px;">';
                                                echo '</div>';
                                            echo '</div>';
                                            echo '<div class="col-md-8">';
                                                echo '<h3 class="card-title">'.$row2["item_name"].'</h3>';
                                                echo '<p class="card-text">'.$row2["item_detail"].'</p>';
                                                echo '<h5 class="card-title">'.$row2["item_prince"]." บาท".'</h5>';
                                            echo '</div>';                                     
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
    </div>
</div>

</body>
</html>