<?php 
require_once("dbh.inc.php");
require_once("func.inc.php");
if(!isset($_POST['edit'])){
		header("location: ../edit_node.php");
}
else{
		$id = $_POST['id'];
		$interface = $_POST['interface'];
		$description = $_POST['description'];
		$snmpIndex = $_POST['snmpIndex'];
		$status = $_POST['status'];

		$sql = "update tbl_node set interface = ?, description = ?, snmpIndex = ?, status = ? where id= ?";

		$stmt = $conn->prepare($sql);
		$stmt->bind_param("sssii",$interface,$description,$snmpIndex,$status,$id);
		if($stmt->execute()){
				header("location:../nodelist.php");
		}
}
?>
