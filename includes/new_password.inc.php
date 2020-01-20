<?php
require_once "dbh.inc.php";
if(isset($_POST['new_password_btn'])){
		$password = $_POST['password'];
		$verify_password = $_POST['verify_password'];
		$email =  $_POST['email'];

		if(empty($password) || empty($verify_password) || empty($email))
		{
				header("location:../new_password.php?token=".$token."&email=".$email);// enter the token into the database
		}
		else{
				if($password != $verify_password){
						header("location:../new_password.php?error=password_not_equal&token=".$token."&email=".$email);// enter the token into the database
				}
				else{
						$hashPassword = password_hash($password,PASSWORD_DEFAULT);
						$sql = "update tbl_users set pwd = ? where email = ?";
						$stmt = $conn->prepare($sql);
						$stmt->bind_param("ss",$hashPassword,$email);
						if($stmt->execute()){
								$sql2 = "update password_resets set used = 1 where email = ?";
								$stmt = $conn->prepare($sql2);
								$stmt->bind_param("s",$email);
								if($stmt->execute()){
										echo "<script>";
										echo "alert('Password Successfully changed. Please login with your new password');";
										echo "window.location.replace('../login.php');";
										echo "</script>";
								}
						}
				}
		}
}
else{
		header("location: ../reset_password.php");
}


?>
