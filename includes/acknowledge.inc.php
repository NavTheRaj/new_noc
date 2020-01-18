<?php
require("dbh.inc.php");
session_start();
if(isset($_POST['submit'])){
		add_to_database($conn);
}
else{
		header("location:../index.php");
}

function add_to_database($conn){
		$hostname = $_POST['hostname'];
		$port = $_POST['port_no'];
		$description = $_POST['description'];
		$down_time = $_POST['down_time'];
		$reason = $_POST['sub_reason_id'];
		$submitted_to = $_POST['informed_to'];
		$remark = $_POST['remark'];
		$nid = $_POST['nid'];


		$sql = "insert into tbl_ack(nid,downtime,node_status,subReasonId,assign,remark)values('$nid','$down_time',0,'$reason','$submitted_to','$remark')";

		$sql2 = "update tbl_node set ack_status = 1 where id = ".$nid;

		if($conn->query($sql)){
				$eid = $conn->insert_id;
				$uid = $_SESSION['uid'];
				$sql3 = "insert into tbl_comments(eid,comment,uid)values($eid,'Forworded to $submitted_to',$uid)";
				if($conn->query($sql3)){
						if($conn->query($sql2)){
								echo "<script>";
								echo "alert('Succesfully Acknowledged redirecting you to index page');";
								echo "window.location.replace('../index.php');";
								echo "</script>";
						}
				}
		}
		else{
				echo "not inserted";
		}
}
?>
