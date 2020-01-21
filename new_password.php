<?php
require("header.php");
require("includes/dbh.inc.php");
if(isset($_GET['token']) AND isset($_GET['email'])){ // onlif if both email and toke exists
		$token = $_GET['token'];
		$email = $_GET['email'];

		$sql = "select * from password_resets where token = ? and email = ? and used = 0 limit 1";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ss",$token,$email);
		$stmt->execute();
		$result = $stmt->get_result();
		$result = $result->fetch_assoc();

		if(!$result){
				header("Location: ./error.php?error=401");
		}
}
else{
		header("Location: ./error.php?error=404"); // redirect if either email or token doesnot exist
}

?>

<div class="login_container d-flex justify-content-center align-items-center">
<div class="">
<form class="text-center border border-light p-5 white" action="includes/new_password.inc.php" method="POST">
		<p class="h4 mb-4">Enter new Password</p>
		<!-- Password -->
		<input type="password" id="new_password" name="password" class="form-control mb-4" placeholder="New Password" required>
		<input type="password" id="verify_password" name="verify_password" class="form-control mb-4" placeholder="Verify Password" required>
		<input type="email" id="verify_password" name="email" class="form-control mb-4 d-none" placeholder="email" value="<?php echo $result['email'] ?>">

		<!-- Sign in button -->
		<button class="btn btn-info btn-block my-4" type="submit" name="new_password_btn">Change Password</button>

<?php
require("footer.php");
?>
