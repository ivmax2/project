<?php
    $conn=require_once "config.php";
    $count = $_SESSION['c'];
    $id = $_SESSION['id'];
    $pw = $_SESSION['pw'];
    $spend = ceil(2 * (1.5 ** ($_SESSION['o'] - 1)));
    $spend1 = 10 * (3 ** $_SESSION['gm']);
    $spend2 = 5 * ( 2 ** ($_SESSION['gmo'] - 1));
    $theme = $_SESSION['theme'];
    $sql = "SELECT * FROM theme WHERE theme_id ='$theme'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
?>
