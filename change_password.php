<?php 
session_start();
include("header.php");
if(!isset($_GET['change_password'])){
		header("location: index.php");
}
?>
<!-- Default form login -->
<div class="login_container d-flex justify-content-center align-items-center">
<div class="">
<form class="text-center border border-light p-5 white" action="includes/change_password.inc.php" method="POST">
		<p class="h4 mb-4">Change Password</p>

		<input type="password" id="old_password" name="old_password" class="form-control mb-4" placeholder="Old Password">
		<input type="password" id="loginPassword" name="new_password" class="form-control mb-4" placeholder="New Password">
		<input type="password" id="loginPassword" name="password_verify" class="form-control mb-4" placeholder="Verify Password">

		

		<!-- Sign in button -->
		<button class="btn btn-info btn-block my-4" type="submit" name="change_pass">Change Password</button>

</form>
<!-- Default form login -->
</div>
</div>

<?php 
include("footer.php");
?>
