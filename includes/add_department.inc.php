<?php
require("dbh.inc.php");
require("func.inc.php");

if(isset($_POST['add_department'])){
		$dept_name = $_POST['dept_name'];
		$dept_head =$_POST['dept_head'];
		$dept_head_email =$_POST['dept_head_email'];
		$dept_status =$_POST['dept_status'];
		if(empty($dept_name) || empty($dept_head)|| empty($dept_head_email) || empty($dept_status)){
				header("location: ../departments.php?popup");
		}
		else{

				$sql = "insert into tbl_dept(deptName,deptHead,email,status) values(?,?,?,?)";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("ssss",$dept_name,$dept_head,$dept_head_email,$dept_status);
				if($stmt->execute()){
				header("location: ../departments.php");
				}
				else{
						echo "Could not insert";
				}
		}
}
else{
		echo "not clicked";
}
?>
