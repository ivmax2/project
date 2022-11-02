<?php
// 載入db.php來連結資料庫
$conn=require_once "../Ly/config.php";
session_start();
$id = $_SESSION["id"];
$newpassword = $_POST["newpassword"];
// sql語法存在變數中
$sql = "UPDATE user_information SET user_password = '$newpassword' WHERE user_id = '$id'";
// 用mysqli_query方法執行(sql語法)將結果存在變數中
$result = mysqli_query($conn,$sql);

// 如果有異動到資料庫數量(更新資料庫)
if (mysqli_affected_rows($conn)>0) {
    function_alert("更新成功");
}
elseif(mysqli_affected_rows($conn)==0) {
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