<?php
require("dbh.inc.php");
require("func.inc.php");

if(isset($_POST['login'])){
		// check if the 'login' Button is clicked
		$username =validate($_POST['username']);
		$password =validate($_POST['password']);
		if(empty($username) || empty($password)){
				header("location: ../login.php?error=emptyFields");
				exit();
		}
		else{
				$sql = "SELECT * from tbl_users WHERE username=? OR email=? limit 1";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("ss",$username,$username);
				$stmt->execute();
				$result = $stmt->get_result();
				$result = $result->fetch_assoc();
				var_dump($result['pwd']);
				if($result){
						$passwordCorrect = password_verify($password,$result['pwd']);
						if($passwordCorrect){
								session_start();
								$_SESSION['username']=$username;
								$_SESSION['password']=$result['password'];
								header("location: ../index.php");
						}
						else{
								header("location: ../login.php?error=incorrectPassword");
						}
				}
		}

}
else{
		header("location:../login.php");
}







?>
