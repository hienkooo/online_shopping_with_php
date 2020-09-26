<?php
    session_start();
    $id = $_REQUEST['id'];
    foreach($_SESSION['cart'] as $key => $value){
        if($key== $id){
            unset($_SESSION['cart'][$id]);
        }
        header("location:index.php"); 
    }
?>