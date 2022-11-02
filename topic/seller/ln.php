<?php
    $conn=require_once("../Ly/config.php");
    session_start();
    $id=$_SESSION["id"];
    $sport = $_POST['chkPerson'];
    $fff=$_POST['zero'];
    if($sport===NULL){
        header("location:Incomplete_orders.php"); 
    }else{
        if($fff==='接單'){
            $count=count($sport,0);
            while($count>0){
                $i=$sport[$count-'1'];
                $sql = "UPDATE duel SET duel_state = '2' WHERE duel_id = '$i'";
                $result = mysqli_query($conn,$sql);
                $count = $count-'1';
            }
            echo "<script>alert('接單成功');window.location.href='Incomplete_orders.php';</script>";
        }
        else if($fff==='棄單'){
            $count=count($sport,0);
            while($count>0){
                $i=$sport[$count-'1'];
                $sql = "DELETE FROM duel WHERE duel_id = '$i'";
                $result = mysqli_query($conn,$sql);
                $count = $count-'1';
            }
            echo "<script>alert('棄單成功');window.location.href='Incomplete_orders.php';</script>";
        }
    }
    mysqli_close($conn);
?>