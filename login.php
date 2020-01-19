<?php 
session_start();
if(isset($_SESSION['username'])){
		echo "<script>";
		echo "alert('You are aleardy logged in. Please logout first');";
		echo "window.location.replace('index.php');";
		echo "</script>";
}
include("header.php");
?>
<!-- Default form login -->
<div class="login_container d-flex justify-content-center align-items-center">
<div class="">
<form class="text-center border border-light p-5 white" action="includes/login.inc.php" method="POST">
		<p class="h4 mb-4">Sign in</p>
		<!-- Email -->
		<input type="text" id="loginEmail" name="username" class="form-control mb-4" placeholder="Username">

		<!-- Password -->
		<input type="password" id="loginPassword" name="password" class="form-control mb-4" placeholder="Password">

		<div class="d-flex justify-content-around">
				<div>
						<!-- Remember me -->
						<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
								<label class="custom-control-label mr-2" for="defaultLoginFormRemember">Remember me</label>
						</div>
				</div>
				<div>
						<!-- Forgot password -->
						<a href="reset_password.php">Forgot password?</a>
				</div>
		</div>

		<!-- Sign in button -->
		<button class="btn btn-info btn-block my-4" type="submit" name="login">Sign in</button>
		<!-- Social login -->
		<!-- <p>or sign in with:</p> -->
    <!--  -->
		<!-- <a href="#" class="mx&#45;2" role="button"><i class="fab fa&#45;facebook&#45;f light&#45;blue&#45;text"></i></a> -->
		<!-- <a href="#" class="mx&#45;2" role="button"><i class="fab fa&#45;twitter light&#45;blue&#45;text"></i></a> -->
		<!-- <a href="#" class="mx&#45;2" role="button"><i class="fab fa&#45;linkedin&#45;in light&#45;blue&#45;text"></i></a> -->
		<!-- <a href="#" class="mx&#45;2" role="button"><i class="fab fa&#45;github light&#45;blue&#45;text"></i></a> -->

</form>
<!-- Default form login -->
</div>
</div>

<?php 
include("footer.php");
?>
