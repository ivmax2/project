<?php
$conn=require_once("../Ly/config.php");
session_start();
$id=$_SESSION["id"];
$shelf = $_SESSION['status'];
echo $shelf;
if($shelf==='yes'){
    $sql = "UPDATE commodity SET commodity_shelf = 'no' WHERE commodity_seller_id = '$id'";
    $result = mysqli_query($conn,$sql);
}
else if($shelf==='no'){
    $sql = "UPDATE commodity SET commodity_shelf = 'yes' WHERE commodity_seller_id = '$id'";
    $result = mysqli_query($conn,$sql);
}
$sql = "SELECT * FROM commodity WHERE commodity_seller_id = '$id'"; //修改成你要的 SQL 語法
$result = mysqli_query($conn,$sql) or die("Error");
$row = mysqli_fetch_array($result);
$_SESSION['status']=$row[7];
mysqli_close($conn);
exit();
?>