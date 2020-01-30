<?php
require("includes/dbh.inc.php");
$sql = "select * from tbl_host";
$result = $conn->query($sql);
if($result->num_rows>0){
		while($row = $result->fetch_assoc()){
				echo "<tr class='text-center'>"; 
				echo "<td>".$row['id']."</td>";
				echo "<td>".$row['hostname']."</td>";
				echo "<td>".$row['community']."</td>";
				echo "<td>".$row['vendor']."</td>";
				echo "<td>".$row['snmpIndex']."</td>";
				echo "</tr>";
		}
}
?>
