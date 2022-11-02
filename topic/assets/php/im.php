<?php
// 初始化
session_start();

// 檢查用戶是否已經登錄，如果是，則將他重定向到首頁 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $_SESSION["user_Last_name"] = mysqli_fetch_assoc($result)["user_Last_name"];
}
?>