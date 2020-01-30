<?php
require("dbh.inc.php");
require("func.inc.php");

if(isset($_POST['add_host'])){
		$hid = $_POST['hid'];
		$interface = $_POST['interface'];
		$description = $_POST['description'];
		$snmpIndex = $_POST['snmpIndex'];

		// echo $hid ;
		// echo $interface ;
		// echo $description ;
		// echo $snmpIndex ;

		if(empty($hid) || empty($interface)|| empty($description) || empty($snmpIndex)){
				header("location: ../nodelist.php?empty");
		}
		else{
				$sql = "insert into tbl_node(hid,interface,description,snmpIndex) values(?,?,?,?)";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("isss",$hid,$interface,$description,$snmpIndex);
				if($stmt->execute()){
						header("location: ../nodelist.php?status=success");
				}
				else{
						header("location: ../nodelist.php?status=error");
				}
		}
}
else{
		header("location: ../hostlist.php");
}
?>
