<?php
// 載入db.php來連結資料庫
$conn=require_once "../Ly/config.php";
session_start();
$id = $_SESSION["id"];
$type = $_POST["type"];
echo $type;
$name = $_POST["name"];
$price = $_POST["price"];
$introduce=$_POST["introduce"];
    // sql語法存在變數中
    $sql = "UPDATE commodity SET commodity_type = '$type',commodity_name = '$name',commodity_price = '$price',commodity_introduce = '$introduce' WHERE commodity_seller_id = '$id'";
    // 用mysqli_query方法執行(sql語法)將結果存在變數中
    $result = mysqli_query($conn,$sql);
    function_alert("更新成功");
    mysqli_close($conn); 

 function function_alert($message) { 
      
    // 顯示警告框   
    echo "<script>alert('$message');
     window.location.href='my_commodity.php';
    </script>";
    return false;
} 
 ?>