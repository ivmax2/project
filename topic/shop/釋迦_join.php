<?php 
session_start();
$buyer_id = $_SESSION["id"];
$fd=$_GET['fd'];
$conn=require_once("../Ly/config.php");
$join=$_POST["join"];
//檢查帳號是否重複
$check="SELECT * FROM cart WHERE cart_buyer ='".$buyer_id."' AND cart_goods_id = '".$join."'";
if(mysqli_num_rows(mysqli_query($conn,$check))==0){
    $sql="INSERT INTO cart (cart_goods_id, cart_buyer)VALUES('".$join."','".$buyer_id."')";
    if(mysqli_query($conn,$sql)){
        echo "<script>alert('已加入~~');window.location.href='釋迦.php?id=$fd';</script>"; 
        exit;
    }else{
        echo "Error creating table: " . mysqli_error($conn);
    }
}
else{
    echo "<script>alert('加入過了');window.location.href='../cart/cart.php?';</script>"; 
    //header("refresh:3;url=register.html",true);
    exit;
}
mysqli_close($conn);
?>