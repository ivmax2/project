<?php 
session_start(); 
$_SESSION = array(); 
session_destroy(); 
header('location:../../Ln/first.html'); 
?>