<?php
require("includes/dbh.inc.php");
$result = mysqli_query($conn,"select tbl_host.hostname,
		tbl_node.interface,
		tbl_node.id,
		tbl_node.description,
		tbl_node.online,
		tbl_node.ack_status,
		tbl_node.last_update,SEC_TO_TIME(TIME_TO_SEC(CURRENT_TIMESTAMP - last_update)) as Duration from tbl_node JOIN tbl_host on tbl_host.id=tbl_node.hid where online=0 ORDER by Duration DESC
		");


while($row = mysqli_fetch_array($result)){
	$acknowledged = ($row['ack_status'] == 1? True:False);
	$light_red =  "style='background-color:#f99'";
	$dark_read = "style='background-color:#f66'";
	echo "<tr ",$acknowledged?$light_red : $dark_read ,">";
	echo "<td>".$row['hostname']."</td>";
	echo "<td>".$row['interface']."</td>";
	echo "<td>".$row['description']."</td>";
	echo "<td>".$row['last_update']."</td>";
	echo "<td>".$row['Duration']."</td>";
	echo "<td> Action</td></tr>";
}

?>
