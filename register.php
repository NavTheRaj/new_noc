<?php 
include("header.php");
?>
<div class="d-flex justify-content-center mt-5">
		<!-- Default form register -->
		<form class="text-center border border-light p-5" action="includes/register.inc.php" method="POST">

				<p class="h4 mb-4">Register Users</p>
				<div class="form-row mb-4">
						<div class="col">
								<!-- First name -->
								<input type="text" id="firstName" name="firstName"class="form-control" placeholder="First name" value="<?php echo $_GET['firstName'] ?>">
						</div>
						<div class="col">
								<!-- Last name -->
								<input type="text" id="lastName" name="lastName" class="form-control" placeholder="Last name" value="<?php echo $_GET['lastName'] ?>">
						</div>
				</div>

				<!-- E-mail -->
				<input type="email" id="userEmail" name="email" class="form-control mb-4" placeholder="E-mail" value="<?php echo $_GET['email'] ?>">
				<input type="text" id="username" name="username" class="form-control mb-4" placeholder="Username" value="<?php echo $_GET['username'] ?>">
				<input type="text" id="department" name="department" class="form-control mb-4" placeholder="Department" value="<?php echo $_GET['department'] ?>">

				<input type="text" id="userPhoneNumber" name="phoneNumber" class="form-control mb-4" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">
				<!-- Password -->
				<input type="password" id="userPassword1" name="password1" class="form-control mb-4" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
				<input type="password" id="userPassword2" name="password2" class="form-control mb-4" placeholder="Verify Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">

				<!-- Phone number -->

				<!-- Sign up button -->
				<button class="btn btn-info my-4 btn-block" type="submit" name="register">Register</button>

				<!-- Social register -->
				<p>or sign up with:</p>

				<a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
				<a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
				<a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
				<a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>

				<hr>

				<!-- Terms of service -->
				<p>By clicking
				<em>Sign up</em> you agree to our
				<a href="" target="_blank">terms of service</a>

		</form>
		<!-- Default form register -->
</div>
<?php 
include("footer.php");
?>
