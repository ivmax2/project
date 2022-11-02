<?php
// 初始化
session_start();

// 檢查用戶是否已經登錄，如果是，則將他重定向到首頁 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    //設定首頁
    $_SESSION["Ls"]=$_SESSION["L"];
    $_SESSION["Fs"]=$_SESSION["F"];
    header("location: index.php");
    exit;  //記得要跳出來，不然會重複轉址過多次
}
?>