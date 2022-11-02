<?php
    $conn=require_once("../Ly/config.php");
    session_start();
    $sport = $_POST['chkPerson'];
    $today = date('Y/m/d H:i:s');
    if($sport===NULL){
        header("location:established_orders.php"); 
    }else{
        $count=count($sport,0);
        while($count>0){
            $i=$sport[$count-'1'];
            echo $i;
            $sql = "UPDATE duel SET duel_state = '3' WHERE duel_id = '$i'";
            $result = mysqli_query($conn,$sql);
            $sql = "UPDATE duel SET time_2 = '$today' WHERE duel_id = '$i'";
            $result = mysqli_query($conn,$sql);
            $count = $count-'1';
        }
        echo "<script>alert('已出貨');window.location.href='established_orders.php';</script>";
    }
    mysqli_close($conn);
?>