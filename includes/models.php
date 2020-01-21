<?php
require("dbh.inc.php");

function get_ack_detail($conn,$id){
		$sql = "select a.id,
				downtime,
				hostname,
				interface,
				remark,
				description, node_status from tbl_host h JOIN tbl_node n ON h.id=n.hid JOIN tbl_ack a ON n.id=a.nid where a.id = ".$id; 
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

function get_comments($conn,$id){
		$sql = "select c.id,eid,comment,c_date,uid,username from tbl_comments c JOIN tbl_users u where (uid = u.id) and (eid = $id)";
		if($result = $conn->query($sql)){
				if ($result->num_rows > 0) {
						return $result;
				}
		}
}
