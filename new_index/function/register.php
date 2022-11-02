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

$check="SELECT * FROM player_imformation WHERE player_ID ='".$id."'";
if(mysqli_num_rows(mysqli_query($conn,$check))==0){
    $sql="INSERT INTO player_data (cookies, ovens,grandmothers,grandmothers_ovens)
        VALUES('".$c."','".$o."','".$gm."','".$gmo."')";
    if(mysqli_query($conn,$sql)){
        $data="SELECT * FROM player_data";
        $row=mysqli_num_rows(mysqli_query($conn,$data)) + '1';
        $sql="INSERT INTO player_imformation (player_ID, user_password,get_data_ID)
            VALUES('".$id."','".$password."','".$row."')";
        mysqli_query($conn,$sql);

        $sql = "SELECT * FROM player_imformation WHERE player_ID ='$id' AND user_password = '$password'";
        $result=mysqli_query($conn,$sql);
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

        $_SESSION["loggedin"] = true;
        $_SESSION["html"] = true;

        mysqli_close($conn);
        function_alert("Ry");
        exit();
    }else{
        echo "Error creating table: " . mysqli_error($conn);
        mysqli_close($conn);
        exit();
    }
}
else{
    mysqli_close($conn);
    function_alert("Rn");
    exit();
}


function function_alert($message) { 
      
    // 顯示警告框   
    echo "$message"; 
    return false;
} 
?>