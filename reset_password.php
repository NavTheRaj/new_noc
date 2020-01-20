<?php 
session_start();
include("header.php");
?>
<!-- Default form login -->
<div class="login_container d-flex justify-content-center align-items-center">
		<div class="">
				<form class="text-center border border-light p-5 white" action="includes/reset_password.inc.php" method="POST">
						<p class="h4 mb-4">Reset Pasword</p>
						<!-- Email -->
						<input type="email" id="loginEmail" name="email" class="form-control mb-4" placeholder="Enter Your Email">

						<!-- Sign in button -->
						<button class="btn btn-info btn-block my-4" type="submit" name="request_link">Request Reset
								Link</button>
				</form>
		</div>
</div>

<?php 
include("footer.php");
?>
