<?php
include("header.php");
include("nav.php");
include("sub_menu.php");
if(!isset($_SESSION['username'])){
		header("location:login.php");
}
?>



<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 primary-color leftSideBar">
      One of three columns
    </div>
    <div class="col-md-4 default-color rightSideBar">
      One of three columns
    </div>
  </div>
</div>



















<?php
include("footer.php");
?>
