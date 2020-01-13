<?php
require("dbh.inc.php");
require("func.inc.php");

if(isset($_POST['register'])){
		// check if 'register' button is clicked else redirect to register page
		$firstName = validate($_POST['firstName']);
		$lastName = validate($_POST['lastName']);
		$email = validate($_POST['email']);
		$department = validate($_POST['department']);
		$username = validate($_POST['username']);
		$phoneNumber = validate($_POST['phoneNumber']);
		$password1 = validate($_POST['password1']);
		$password2 = validate($_POST['password2']);
		if(empty($firstName) || empty($lastName) || empty($email) ||empty($username) || empty($password1)|| empty($password2)){
				header("location: ../register.php?error=emptyfields&firstName=".$firstName."&lastName=".$lastName."&email=".$email."&username=".$username);
				exit();
		}
		elseif(!filter_var($email,FILTER_VALIDATE_EMAIL) && (!preg_match("/^[a-zA-Z0-9]*$/",$username))){
				header("location: ../register.php?error=invalidemail&firstName=".$firstName."&lastName=".$lastName."&email=".$email);
				exit();
		}
		elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				header("location: ../register.php?error=invalidemail&firstName=".$firstName."&lastName=".$lastName."&username=".$username);
				exit();
		}
		elseif(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
				header("location: ../register.php?error=invalidemail&firstName=".$firstName."&lastName=".$lastName."&email=".$email."&username=".$username);
				exit();
		}
		elseif($password1 !== $password2){
				header("location: ../register.php?error=passwordNotMatching&firstName=".$firstName."&lastName=".$lastName."&email=".$email."&username=".$username);
				exit();
		}
		else{
				$sql = "SELECT username from tbl_users WHERE username=?";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("s",$username);
				$stmt->execute();
				$result = $stmt->fetch();

				if($result){
						// if the username is taken
						header("location: ../register.php?error=usernameTaken&username=".$username."&email=".$email);
						exit();
				}
				else{
						$sql = "INSERT into tbl_users(firstname,lastname,username,department,pwd,email) values(?,?,?,?,?,?)";
						$stmt = $conn->prepare($sql);
						if(!$stmt){
								header("location: ../signup.php?error=sqlerror");
								exit();
						}
						else{
								$hashPassword = password_hash($password1,PASSWORD_DEFAULT);
								$stmt->bind_param("ssssss",$fn,$ln,$un,$hp,$el);
								$stmt->bind_param("ssssss",$firstName,$lastName,$username,$department,$hashPassword,$email);
								if($stmt->execute()){
										header("location: ../login.php?signup=success");
										exit();
								}
								else{
										header("location: ../register.php?error=sqlerror&firstName=".$firstName."&lastName=".$lastName."&email=".$email."&username=".$username);
										exit();
								}
						}

				}
		}
}
else{
		header("location:../register.php");
}


?>
