<?php
session_start();
unset($_SESSION["username"]); 
unset($_SESSION["password"]); 
unset($_SESSION["role"]); 
header("location: ../index.php");
?>
