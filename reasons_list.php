<?php
require("includes/dbh.inc.php");
$result = $conn->query($sql);
if($result->num_rows>0){
		while($row = $result->fetch_assoc()){
				echo "<tr>"; 
				echo "<td>".$row['deptName']."</td>";
				echo "<td>Test</td>";
				echo "</tr>";
		}
}
?>
