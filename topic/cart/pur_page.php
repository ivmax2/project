<?php
    date_default_timezone_set('Asia/Taipei');
    $conn=require_once("../Ly/config.php");
    session_start();
    $uid=$_SESSION["id"];
    $count = $_GET["count"];
    $money = $_GET["money"];
    $id=$_GET["id"];
    $sql = "SELECT commodity_seller_id FROM commodity WHERE commodity_id = '$id'";
    $result = mysqli_query($conn,$sql) or die("Error");
    $seller = mysqli_fetch_array($result);
    $Name=$_POST["name"];
    $phone=$_POST["phone"];
    $address=$_POST["zipcode"].$_POST["city"].$_POST["town"].$_POST["newaddress"];
    $today = date('Y/m/d H:i:s');
    $sql="INSERT INTO duel (buyer_id, buyer_name,seller_id,shop_id,duel_count,address,phone,money,time_1)
            VALUES('".$uid."','".$Name."','".$seller[0]."','".$id."','".$count."','".$address."','".$phone."','".$money."','".$today."')";
    mysqli_query($conn,$sql);
    $sql="DELETE FROM cart WHERE cart_buyer ='".$uid."' AND cart_goods_id = '".$id."'";
    mysqli_query($conn,$sql) or die("Error");
    echo "<script>alert('預定成功~~');window.location.href='cart-1.php';</script>"; 
?>