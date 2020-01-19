<?php
session_start();
require_once("dbh.inc.php");
require_once("func.inc.php");
if(isset($_POST['change_pass'])){
		$old_pass = validate($_POST['old_password']);
		$new_pass1 = validate($_POST['new_password']);
		$new_pass2 = validate($_POST['password_verify']);

		if(empty($old_pass) || empty($new_pass1) || empty($new_pass2)){
				header("location: ../change_password.php?change_password");
		}
		elseif($new_pass1 != $new_pass2){
				header("location: ../change_password.php?change_password&error=password_not_same");
		}
		else{
				$username = $_SESSION['username'];
				$sql = "select * from tbl_users where username = ? limit 1";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("s",$username);
				$stmt->execute();
				$result = $stmt->get_result();
				$result = $result->fetch_assoc();

				if($result){
						$passwordCorrect = password_verify($old_pass,$result['pwd']);
						if($passwordCorrect){
								$hashPassword = password_hash($new_pass1,PASSWORD_DEFAULT);
								$sql = "update tbl_users set pwd = ? where id = ?";
								$sqmt = $conn->prepare($sql);
								$stmt->bind_param("si",$hashPassword,$result['id']);
								if($stmt->execute()){
												$_SESSION['password']=$hashPassword;
												echo "<script>";
												echo "alert('Password Successfull Changed');";
												echo "window.location.replace('../index.php');";
												echo "</script>";
										exit();
								}
						}
						else{
								header("location: ../change_password.php?change_password&error=incorrectPassword");
						}
				}

		}

}
else{
		header("location: ../change_password.php");
}








?>
