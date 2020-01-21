<?php
require("dbh.inc.php");
require_once("func.inc.php");
session_start();

if(isset($_POST['post'])){
		$comment = validate($_POST['comment']);
		$eid = validate($_POST['ack_id']);
		$uid = $_SESSION['uid'];
		$sql = "insert into tbl_comments (eid,comment,uid) values(?,?,?)";

		$stmt = $conn->prepare($sql);
		$stmt->bind_param("isi",$eid,$comment,$uid);
		if($stmt->execute()){
				header("Location:../node_ack_detail.php?ack_id=".$eid);
		}
		else{
				echo "Sql error";
		}

}
else if (isset($_POST['resolve'])){
		$comment = validate($_POST['comment']);
		$eid = validate($_POST['ack_id']);
		$uid = $_SESSION['uid'];
		$sql = "insert into tbl_comments (eid,comment,uid) values(?,?,?)";

		$stmt = $conn->prepare($sql);
		$stmt->bind_param("isi",$eid,$comment,$uid);
		if($stmt->execute()){
				$sql2 = "update tbl_ack set node_status = 2 where id = $eid";
				if($conn->query($sql2)){
						header("Location:../node_ack_detail.php?ack_id=".$eid);
				}
				die($sql2);
		}
		else{
				echo "Sql error";
		}
}
else{
		header("Location: ../index.php");
}
?>
