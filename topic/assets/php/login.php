<?php
// Include config file
$conn=require_once "config.php";
 
// Define variables and initialize with empty values
$useremail=$_POST["useremail"];
$password=$_POST["userpassword"];
//增加hash可以提高安全性
$password_hash=password_hash($password,PASSWORD_DEFAULT);
// 處理填入的表單
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "SELECT * FROM user_information WHERE user_email ='".$useremail."'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==1 && $password==mysqli_fetch_assoc($result)["user_password"]){
        session_start();
        // 儲存登入變數
        $_SESSION["loggedin"] = true;
        //這些是之後可以用到的變數
        //$_SESSION["user_Last_name"] = mysqli_fetch_assoc($re)["user_Last_name"];
        //$_SESSION["user_first_name"] = mysqli_fetch_assoc($re)["user_first_name"];
        $sql = "SELECT * FROM user_information WHERE user_email ='".$useremail."'";
        $result=mysqli_query($conn,$sql);
        $_SESSION["L"]=mysqli_fetch_assoc($result)["user_Last_name"];
        $sql = "SELECT * FROM user_information WHERE user_email ='".$useremail."'";
        $result=mysqli_query($conn,$sql);
        $_SESSION["F"]=mysqli_fetch_assoc($result)["user_first_name"];
        #首頁網址設定 
        //echo "<script type='text/javascript'>function();</script>";
        header("location: check.php");
    }else{
            function_alert("帳號或密碼錯誤"); 
            exit();
        }
}else{
        function_alert("Something wrong"); 
    }

    // 關閉連結
    mysqli_close($link);

function function_alert($message) { 
      
    // 顯示警告框   
    echo "<script>alert('$message');
     window.location.href='../../admin/login.html';
    </script>"; 
    return false;
} 
?>