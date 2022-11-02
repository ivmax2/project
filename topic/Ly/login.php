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
        $result = mysqli_query($conn,$sql.' LIMIT '.'0'.', '.'1') or die("Error");
        $row = mysqli_fetch_array($result);
        $_SESSION["id"]=$row['user_id'];//id
        $_SESSION["L"]=$row["user_Last_name"];//名
        $_SESSION["F"]=$row["user_first_name"];//姓
        $_SESSION["e"]=$row["user_email"];//帳號
        $_SESSION["pw"]=$row["user_password"];//密碼
        $_SESSION["pn"]=$row["user_phone_number"];//手機
        $_SESSION["ac"]=$row["user_adress_city"];//縣市
        $_SESSION["at"]=$row["user_adress_town"];//區
        $_SESSION["az"]=$row["user_adress_zipcode"];//郵遞區號
        $_SESSION["ad"]=$row["user_adress_detail"];//住址
        $_SESSION["seller"]=$row["user_identity"];//是否為賣家
        $_SESSION["imageId"]=$row["user_icon"];//圖片
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
     window.location.href='../admin/login.html';
    </script>"; 
    return false;
} 
?>