<?php
require("dbh.inc.php");
require("func.inc.php");

if(isset($_POST['add_host'])){
		$hostname = $_POST['hostname'];
		$vendor = $_POST['vendor'];
		$community = $_POST['community'];
		$snmpIndex = $_POST['snmpIndex'];
		if(empty($hostname) || empty($vendor)|| empty($community)){
				header("location: ../hostlist.php?empty");
		}
		else{
				$sql = "insert into tbl_host(hostname,community,vendor,snmpIndex) values(?,?,?,?)";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("ssss",$hostname,$community,$vendor,$snmpIndex);
				if($stmt->execute()){
						header("location: ../hostlist.php?status=success");
				}
				else{
						header("location: ../hostlist.php?status=error");
				}
		}
}
else{
		header("location: ../hostlist.php");
}
?>
