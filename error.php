<?php
include("header.php");
?>
<div class="vh-100 primary-color d-flex justify-content-center align-items-center">
<?php 
if($_GET['error']=="403"){
		include("403.php");
}
else if($_GET['error']=="404"){
		include("404.php");
}
else if($_GET['error'] == 401){
		include("401.php");
}
?>
</div>
