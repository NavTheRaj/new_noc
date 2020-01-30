<?php
require("dbh.inc.php");

function get_ack_detail($conn,$id){
		$sql = "select * from tbl_ack where id =".$id;

		if($result = $conn->query($sql)){
				if ($result->num_rows > 0) {
						$row =  $result->fetch_assoc();
						return $row;
				}

				// hostname
				// 		description
				// 		interface
				// 				downtime
				// 				remark
				// acknowledged by
				// root causk
		}
}
function get_subReason($conn,$id){
		$sql = "select * from tbl_subReasons where id =".$id;

		if($result = $conn->query($sql)){
				if ($result->num_rows > 0) {
						$row =  $result->fetch_assoc();
						return $row;
				}
		}

}

function get_reasons($conn){
		$sql = "select * from tbl_reasons";
		if($result = $conn->query($sql)){
				if ($result->num_rows > 0) {
						return $result;
				}
		}

}

function get_subReasons($conn){
		$sql = "select * from tbl_subReasons";

		if($result = $conn->query($sql)){
				if ($result->num_rows > 0) {
						return $result;
				}
		}

}

function get_host($conn,$id){
		$sql = "select * from tbl_host where id =".$id;

		if($result = $conn->query($sql)){
				if ($result->num_rows > 0) {
						$row =  $result->fetch_assoc();
						return $row;
				}
		}

}

function get_comments($conn,$id){
		$sql = "select c.id,eid,comment,c_date,uid,username from tbl_comments c JOIN tbl_users u where (uid = u.id) and (eid = $id)";
		if($result = $conn->query($sql)){
				if ($result->num_rows > 0) {
						return $result;
				}
		}
}

function get_hosts($conn){
		$sql = "select id,hostname from tbl_host";
		if($result = $conn->query($sql)){
				if ($result->num_rows > 0) {
						return $result;
				}
		}

}

function get_node($conn,$id){
		$sql = "select * from tbl_node where id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("i",$id);
		if($stmt->execute()){
				$result = $stmt->get_result();
				$result = $result->fetch_assoc();
				if($result){
						return $result;
				}
				else{
						return "No Such Node";
				}
		}
}

function get_user($conn,$id){
		$sql = "select * from tbl_users where id =".$id;

		if($result = $conn->query($sql)){
				if ($result->num_rows > 0) {
						$row =  $result->fetch_assoc();
						return $row;
				}
		}
}
