<?php
require("dbh.inc.php");
//
// require '../PHPMailer/PHPMailerAutoload.php';
//
// $mail = new PHPMailer;
// $mail->isSMTP();
// $mail->Host = 'smtp.subisu.net.np';  // Specify main and backup SMTP servers
// $mail->SMTPAuth = true;                               // Enable SMTP authentication
// $mail->Username = 'areacheck@subisu.net.np';                 // SMTP username
// $mail->Password = 'D3v0ps$123'; //SMTP password
// $mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted
// $mail->Port = 465;    
//
// $mail->setFrom('areacheck@subisu.net.np');
// $mail->addReplyTo('areacheck@subisu.net.np');
// $mail->isHTML(true);



function validate($data){
		$data = trim($data);
		$data = htmlspecialchars($data);
		$data=stripslashes($data);
		return $data;
}

function check_access(){
		if(!isset($_SESSION['username'])){
				header("location:login.php");
		}
		elseif($_SESSION['role']!='admin')
		{
				header("location:error.php?error=403");
		}

}
function redirect_to_main_page($page_name){
		$page =explode("/",$_SERVER["SCRIPT_NAME"])[3];
		if($page !=$page_name){
				header("Location: ./$page_name");
		}
}


// function send_email($to,$token){
// 		global $mail;
// 		$mail->Subject = 'Password Reset Link';
// 		$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
// 		$mail->AltBody = 'Hi, wer received a password rquest. please fillow this <a href="new_password.php?token='.$token.'">Link</a> To reset your password';
//
// 		if(!$mail->send()) {
// 				echo 'Message could not be sent.';
// 				echo 'Mailer Error: ' . $mail->ErrorInfo;
// 		} else {
// 				return 1;
// 		}
// }
