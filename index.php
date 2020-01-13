<?php
include("header.php");
include("nav.php");
if(!isset($_SESSION['username'])){
		header("location:login.php");
}
include("footer.php");
?>
