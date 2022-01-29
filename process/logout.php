<?php 
    session_start();
    session_destroy();
    header('location: ../../../../work7/views/index.php');
?>