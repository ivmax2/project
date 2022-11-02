<?php
// 載入db.php來連結資料庫
$conn=require_once "../Ly/config.php";
session_start();
$id = $_SESSION["id"];
if (isset($_FILES['photo']) && $_FILES['photo']['size'] > 0){
    // Temporary file name stored on the server 
    $tmpName  = $_FILES['photo']['tmp_name'];   
    $newfile = $_FILES['photo']['name'];//獲取上傳檔名
    $fileclass = substr(strrchr($newfile, '.'), 1);//獲取上傳副檔名,做判斷用
    $type = array("jpg", "jpeg", "png");//設定允許上傳檔案的型別
    if(in_array(strtolower($fileclass), $type)){
        if($_FILES['photo']['size'] < 8192){
        // Read the file 
        $fp = fopen($tmpName, 'r'); 
        $data = fread($fp, filesize($tmpName)); 
        $data = addslashes($data); 
        fclose($fp);

        $sql = "UPDATE user_information SET user_icon = '$data' WHERE user_id = '$id'";
        $results = mysqli_query($conn,$sql); 
        $sql = "SELECT * FROM user_information WHERE user_id = '$id'";
        $result=mysqli_query($conn,$sql);
        $_SESSION["imageId"]=mysqli_fetch_assoc($result)["user_icon"];//圖片
        header("location: setting.php");
        }else{
            function_alert("檔案大小超過!");
        }
    }
    else{
        function_alert("檔案不支援，請選擇 jpg、jpeg 或 png");
    }
}
else{
    function_alert("未選擇檔案");
}
    mysqli_close($conn);

function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='setting.php';
    </script>"; 
    
    return false;
} 
 ?>