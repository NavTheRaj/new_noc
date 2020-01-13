<?php
include("header.php");
include("nav.php");
include("sub_menu.php");
if(!isset($_SESSION['username'])){
		header("location:login.php");
}
include("footer.php");
?>

