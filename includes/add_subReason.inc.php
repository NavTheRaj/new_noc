<?php
require("dbh.inc.php");
if(isset($_POST['submit'])){
		$reason_id = $_POST['reason_id'];
		$sub_reason = $_POST['sub_reason'];

		if(empty($reason_id) || empty($sub_reason)){
				header("location:../sub_reasons.php?empty");
		}
		else{
				$sql = "insert into tbl_subReasons (reasonId,sub_reason) values ($reason_id,'$sub_reasons')";
				if($conn->query($sql)){
						header("location:../sub_reasons.php?status=success");
				} else{
						echo "not added";
				}
		}
}
else{
		header("location: ../reasons.php");
}
?>
