<?php
    session_start(); 
    $ids = $_REQUEST['id'];
    $_SESSION['cart'][$ids]++;
    header("location:index.php"); 
?>