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
	echo "<tr class='tbl_row ".($acknowledged?"ACKed_color":"not_ACKed_color")."'>"; // adding css class based on ack_status
	echo "<td class='nid'>".$row['id']."</td>"; 
	echo "<td class='hostname'>".explode(".",$row['hostname'])[0]."</td>";
	echo "<td class='interface'>".$row['interface']."</td>";
	echo "<td class='description'>".$row['description']."</td>";
	echo "<td class='last_update'>".$row['last_update']."</td>";
	echo "<td class='duration'>".$row['Duration']."</td>";
	echo "<td>";
	include("action_btn.php");
	echo"</td></tr>";
}

?>
