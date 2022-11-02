<?php
// Include config file
$conn=require_once "config.php";
session_start();
// Define variables and initialize with empty values
$id = $_POST['id'];
$password =$_POST['password'];

$sql = "SELECT * FROM player_imformation WHERE player_ID ='$id' AND user_password = '$password'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1){
    // 儲存登入變數
    $_SESSION["loggedin"] = true;
    //這些是之後可以用到的變數
    #首頁網址設定
    $row = mysqli_fetch_array($result); 
    $_SESSION['id'] = $row[1];
    $_SESSION['pw'] = $row[2];
    $_SESSION['theme'] = $row[4];
    $sql = "SELECT * FROM player_data WHERE data_ID ='$row[3]'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $_SESSION['c'] = $row[1];
    $_SESSION['o'] = $row[2];
    $_SESSION['gm'] = $row[3];
    $_SESSION['gmo'] = $row[4];
    $_SESSION["html"] = true;
    mysqli_close($conn);
    function_alert("Ly");
    exit();
}
else{
    mysqli_close($conn);
    function_alert("Ln");
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