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

				require '../PHPMailer/PHPMailerAutoload.php';
				$mail = new PHPMailer;
				$mail->SMTPDebug = 2;     


				$mail->isSMTP();
				$mail->Host = 'smtp.subisu.net.np';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = false;                               // Enable SMTP authentication
				$mail->Username = 'areacheck@subisu.net.np';                 // SMTP username
				$mail->Password = 'D3v0ps$123'; //SMTP password
				// $mail->SMTPSecure = 'none';// Enable TLS encryption, `ssl` also accepted
				$mail->Port = 25;    

				$mail->setFrom('areacheck@subisu.net.np');
				$mail->addAddress($email);  
				$mail->addReplyTo('areacheck@subisu.net.np');
				$mail->isHTML(true);


				$mail->Subject = 'Password Reset Link';
				$msg = 'Hi, we received a password reset request for your email '.$email.' please fillow this <a href="http://182.93.64.114/projects/new_noc/new_password.php?token='.$token.'&email='.$email.'">Link</a> To reset your password';
				$msg = wordwrap($msg,70);
				$mail->Body = $msg; 
				if(!$mail->send()){
						echo 'Message could not be sent.';
						echo 'Mailer Error: ' . $mail->ErrorInfo;
				} else {
						if($stmt->execute()){
								header("location:../pending.php?email=".$email);// enter the token into the database
						}
				}
		} 
		else{
				header("Location: ../reset_password.php?error=NoSuchEmail");
		}
}
?>
