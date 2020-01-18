<?php
require("dbh.inc.php");
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
