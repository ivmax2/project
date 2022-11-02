<?php
// Include config file
$conn=require_once "config.php";
session_start();
// Define variables and initialize with empty values
$id = $_POST['id'];
$password =$_POST['password'];
$c = $_POST['c'];
$o = $_POST['o'];
$gm =$_POST['gm'];
$gmo = $_POST['gmo'];
// 處理填入的表單
$sql = "SELECT * FROM player_imformation WHERE player_ID ='$id' AND user_password = '$password'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1){
    // 儲存登入變數      
    $_SESSION["loggedin"] = true;
    $row = mysqli_fetch_array($result);
    $sql1 = "UPDATE player_data SET cookies = '$c', ovens = '$o', grandmothers = '$gm', grandmothers_ovens = '$gmo' WHERE data_ID = '$row[3]'";
    $result1=mysqli_query($conn,$sql1);
    //這些是之後可以用到的變數
    #首頁網址設定 
    mysqli_close($conn);
    function_alert('Sy');
    exit();
}
else{
    mysqli_close($conn);
    function_alert('Sn');
    exit();
}

mysqli_close($conn);
exit();

function function_alert($message) { 
      
    // 顯示警告框   
    echo "$message"; 
    return false;
} 
?>