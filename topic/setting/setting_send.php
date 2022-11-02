<?php
// 載入db.php來連結資料庫
$conn=require_once "../Ly/config.php";
session_start();
$id = $_SESSION["id"];
$newFN = $_POST["newFN"];
$newLN = $_POST["newLN"];
$newphone = $_POST["newphone"];
$newcity=$_POST["city"];
$newtown=$_POST["town"];
$newzipcode=$_POST["zipcode"];
$newAddress=$_POST["newaddress"];
$count = 0 ;
$check="SELECT * FROM user_information WHERE user_phone_number ='".$newphone."'";
if($newFN !==''){
    // sql語法存在變數中
    $sql = "UPDATE user_information SET user_first_name = '$newFN' WHERE user_id = '$id'";
    // 用mysqli_query方法執行(sql語法)將結果存在變數中
    $result = mysqli_query($conn,$sql);
    $count = 1 ;
    $sql = "SELECT * FROM user_information WHERE user_id = '$id'";
    $result=mysqli_query($conn,$sql);
    $_SESSION["F"]=mysqli_fetch_assoc($result)["user_first_name"];//姓
}

if($newLN !== ''){
    // sql語法存在變數中
    $sql = "UPDATE user_information SET user_Last_name = '$newLN' WHERE user_id = '$id'";
    // 用mysqli_query方法執行(sql語法)將結果存在變數中
    $result = mysqli_query($conn,$sql);
    $count = 2 ;
    $sql = "SELECT * FROM user_information WHERE user_id = '$id'";
    $result=mysqli_query($conn,$sql);
    $_SESSION["L"]=mysqli_fetch_assoc($result)["user_Last_name"];//名
}

if($newphone !== ''){
    if(mysqli_num_rows(mysqli_query($conn,$check))==0){
        // sql語法存在變數中
        $sql = "UPDATE user_information SET user_phone_number = '$newphone' WHERE user_id = '$id'";
        // 用mysqli_query方法執行(sql語法)將結果存在變數中
        $result = mysqli_query($conn,$sql);
        $count = 3 ;
        $sql = "SELECT * FROM user_information WHERE user_id = '$id'";
        $result=mysqli_query($conn,$sql);
        $_SESSION["pn"]=mysqli_fetch_assoc($result)["user_phone_number"];//手機
    }else{echo"<script>alert('號碼已有人使用');</script>";}
}

if($newcity !== $_SESSION["ac"]){
    // sql語法存在變數中
    $sql = "UPDATE user_information SET user_adress_city = '$newcity' WHERE user_id = '$id'";
    // 用mysqli_query方法執行(sql語法)將結果存在變數中
    $result = mysqli_query($conn,$sql);
    $count = 4 ;
    $sql = "SELECT * FROM user_information WHERE user_id = '$id'";
    $result=mysqli_query($conn,$sql);
    $_SESSION["ac"]=mysqli_fetch_assoc($result)["user_adress_city"];//縣市
}
if($newtown !== $_SESSION["at"]){
    // sql語法存在變數中
    $sql = "UPDATE user_information SET user_adress_town = '$newtown' WHERE user_id = '$id'";
    // 用mysqli_query方法執行(sql語法)將結果存在變數中
    $result = mysqli_query($conn,$sql);
    // sql語法存在變數中
    $sql = "UPDATE user_information SET user_adress_zipcode = '$newzipcode' WHERE user_id = '$id'";
    // 用mysqli_query方法執行(sql語法)將結果存在變數中
    $result = mysqli_query($conn,$sql);
    $count = 5 ;
    $sql = "SELECT * FROM user_information WHERE user_id = '$id'";
    $result=mysqli_query($conn,$sql);
    $_SESSION["at"]=mysqli_fetch_assoc($result)["user_adress_town"];//區
    $sql = "SELECT * FROM user_information WHERE user_id = '$id'";
    $result=mysqli_query($conn,$sql);
    $_SESSION["az"]=mysqli_fetch_assoc($result)["user_adress_zipcode"];//郵遞區號
}
if($newAddress !== ''){
    // sql語法存在變數中
    $sql = "UPDATE user_information SET user_adress_detail = '$newAddress' WHERE user_id = '$id'";
    // 用mysqli_query方法執行(sql語法)將結果存在變數中
    $result = mysqli_query($conn,$sql);
    $count = 6 ;
    $sql = "SELECT * FROM user_information WHERE user_id = '$id'";
    $result=mysqli_query($conn,$sql);
    $_SESSION["ad"]=mysqli_fetch_assoc($result)["user_adress_detail"];//住址
}
// 如果有異動到資料庫數量(更新資料庫)
if ($count > 0) {
    function_alert("更新成功");
}
elseif($count == 0) {
   function_alert("無更新");
}
else {
    echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($conn);
    header("location: setting.php");
}
mysqli_close($conn); 

 function function_alert($message) { 
      
    // 顯示警告框   
    echo "<script>alert('$message');
     window.location.href='setting.php';
    </script>";
    return false;
} 
 ?>