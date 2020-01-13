<?php
function validate($data){
		$data = trim($data);
		$data = htmlspecialchars($data);
		$data=stripslashes($data);
		return $data;
}
