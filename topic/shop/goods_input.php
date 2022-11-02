<?php
    $conn=require_once("../Ly/config.php");
    session_start();
    $uid=$_SESSION["id"];
    $change = $_POST["0"];
    $count = $_POST["c"];
    $id=$_GET["id"];
    $check="SELECT * FROM cart WHERE cart_buyer ='".$uid."' AND cart_goods_id = '".$id."'";
    if($change ==="預定"){
        header("location: ../cart/purchase_page.php?count=$count&id=$id");
    }
    else if($change ==="加入購物車"){
        //檢查是否重複
        if(mysqli_num_rows(mysqli_query($conn,$check))==0){
            $sql="INSERT INTO cart (cart_goods_id, cart_buyer)VALUES('".$id."','".$uid."')";
            if(mysqli_query($conn,$sql)){
                echo "<script>alert('已加入~~');window.location.href='goods.php?id=$id';</script>"; 
                exit;
            }else{
                echo "Error creating table: " . mysqli_error($conn);
            }
        }
        else{
            echo "<script>alert('加入過了');window.location.href='../cart/cart.php?';</script>"; 
            //header("refresh:3;url=register.html",true);
            exit;
        }
    }
    else{
        header("location:cart.php");
    }
    mysqli_close($conn);
?>