<?php 
$conn=require_once("config.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $First_Name=$_POST["first_name"];
    $last_name=$_POST["last_name"];
    $sex=$_POST["sex"];
    $phone=$_POST["phone"];

    $year=$_POST["year"];
    $month=$_POST["month"];
    $day=$_POST["day"];

    $city=$_POST["city"];
    $town=$_POST["town"];
    $zipcode=$_POST["zipcode"];
    $Address=$_POST["Address"];

    $InputEmail=$_POST["email"];
    $InputPassword=$_POST["password"];
    $RepeatPasswordInput=$_POST["password_repeat"];
    //檢查帳號是否重複
    $check="SELECT * FROM user_information WHERE user_email ='".$InputEmail."'";
    if(mysqli_num_rows(mysqli_query($conn,$check))==0){
        $sql="INSERT INTO user_information (user_Last_name, user_first_name,user_email,user_password,user_birth,user_sex,user_phone_number,user_adress_city,user_adress_town,user_adress_zipcode,user_adress_detail)
            VALUES('".$last_name."','".$First_Name."','".$InputEmail."','".$InputPassword."','".$year.$month.$day."','".$sex."','".$phone."','".$city."','".$town."','".$zipcode."','".$Address."')";
        if(mysqli_query($conn,$sql)){
            echo "註冊成功!3秒後將自動跳轉頁面<br>";
            echo "<a href='../../admin/login.html'>未成功跳轉頁面請點擊此</a>"; // ../../admin/login.html
            header("refresh:32;url=../../admin/login.html"); // ../../admin/login.html
            exit;
        }else{
            echo "Error creating table: " . mysqli_error($conn);
        }
    }
    else{
        echo "該帳號已有人使用!<br>3秒後將自動跳轉頁面<br>";
        echo "<a href='../../admin/register.html'>未成功跳轉頁面請點擊此</a>";
        header('HTTP/1.0 302 Found');
        //header("refresh:3;url=register.html",true);
        exit;
    }
}


mysqli_close($conn);

function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='index.php';
    </script>"; 
    
    return false;
} 
?>