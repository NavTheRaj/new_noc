<?php
require("includes/dbh.inc.php");
$sql = "select * from tbl_dept";
$result = $conn->query($sql);
if($result->num_rows>0){
		while($row = $result->fetch_assoc()){
				$status = $row['status'] == 0 ? 'Deactive' : 'Active';

				echo "<tr class='text-center'>"; 
				echo "<td>".$row['id']."</td>";
				echo "<td>".$row['deptName']."</td>";
				echo "<td>".$row['deptHead']."</td>";
				echo "<td>".$row['email']."</td>";
				echo "<td>".$status."</td>";
				echo "</tr>";
		}
}
?>
