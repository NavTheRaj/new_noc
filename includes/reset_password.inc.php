<?php
require_once("dbh.inc.php");
require("func.inc.php");
if(isset($_POST['request_link'])){
		$email = $_POST['email'];

		$sql = "select * from tbl_users where email = ?";
		$stmt = $conn->prepare($sql);

		$stmt->bind_param("s",$email);
		$stmt->execute();
		$result = $stmt->get_result();
		$result = $result->fetch_assoc();

		if($result){
				$token = bin2hex(random_bytes(50));

				$sql = "insert into password_resets (email,token) values(?,?)";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("ss",$email,$token);
				if(send_email($email,$token)){
						$stmt->execute();
						header("location:../pending.php?email=".$email);
				}
				else{
						header("Location: ../reset_password.php?error=email_not_send");
				}
		}
		else{
						header("Location: ../reset_password.php?error=NoSuchEmail");
		}
}
?>
