<?php
require("includes/dbh.inc.php");
$sql = "select deptName,description from tbl_dept d JOIN tbl_reasons r ON r.conDeptId=d.id order by deptName";
$result = $conn->query($sql);
$counter = 1;
if($result->num_rows>0){
		while($row = $result->fetch_assoc()){
				echo "<tr>"; 
				echo "<td>".$counter."</td>";
				echo "<td>".$row['deptName']."</td>";
				echo "<td>".$row['description']."</td>";
				echo "</tr>";
				$counter++;
		}
}
?>
