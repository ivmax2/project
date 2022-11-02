<?php
    $conn=require_once("../Ly/config.php");
    session_start();
    $uid=$_SESSION["id"];
    $change = $_POST["0"];
    $count = $_POST["count"];
    $id=$_GET["id"];
    if($change ==="預定"){
        header("location: purchase_page.php?count=$count&id=$id");
    }
    else if($change ==="刪除"){
        $sql="DELETE FROM cart WHERE cart_buyer ='".$uid."' AND cart_goods_id = '".$id."'";
        mysqli_query($conn,$sql) or die("Error");
        echo "<script>alert('已刪除~~');window.location.href='cart.php';</script>"; 
    }
    else{
        header("location:cart.php");
    }
?>