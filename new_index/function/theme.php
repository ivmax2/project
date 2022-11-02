<?php
// Include config file
$conn=require_once "config.php";
session_start();
// Define variables and initialize with empty values
$id = $_POST['id'];
$password =$_POST['pw'];
$c = $_POST['c'];
$o = $_POST['o'];
$gm =$_POST['gm'];
$gmo = $_POST['gmo'];
$theme = $_POST['theme'];

$sql = "SELECT get_data_ID FROM player_imformation WHERE player_ID ='$id' AND user_password = '$password'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1){
    // 儲存登入變數
    $_SESSION["loggedin"] = true;
    //這些是之後可以用到的變數
    #首頁網址設定
    $row = mysqli_fetch_array($result); 
    $sql = "UPDATE player_data SET cookies = '$c', ovens = '$o', grandmothers = '$gm', grandmothers_ovens = '$gmo' WHERE data_ID = '$row[0]'";
    $result = mysqli_query($conn,$sql);
    $sql = "UPDATE player_imformation SET get_theme_id = '$theme' WHERE  get_data_ID = '$row[0]'";
    $result = mysqli_query($conn,$sql);
    $sql = "SELECT * FROM player_data WHERE data_ID ='$row[0]'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $_SESSION['c'] = $row[1];
    $_SESSION['o'] = $row[2];
    $_SESSION['gm'] = $row[3];
    $_SESSION['gmo'] = $row[4];
    $_SESSION["html"] = true;
    $_SESSION['theme'] = $theme;
    $_SESSION['id'] = $id;
    $_SESSION['pw'] = $password;
    mysqli_close($conn);
    function_alert("cy");
    exit();
}
else{
    mysqli_close($conn);
    function_alert("cn");
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