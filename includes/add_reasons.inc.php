<?php
require("dbh.inc.php");
if(isset($_POST['addreason'])){
		$dept = $_POST['dept'];
		$reason = $_POST['reason'];

		if(empty($dept) || empty($reason)){
				header("location:../add_reasons.php?dept=".$dept."&reason=".$reason);
		}
		else{
				$sql = "INSERT INTO tbl_reasons (description, conDeptId) VALUES ('$reason','$dept')";
				if($conn->query($sql)){
						header("location:../add_reasons.php?status=success");
				}
				else{
						echo "not added";
				}
		}
}
else{
		header("location: ../reasons.php");
}
?>
