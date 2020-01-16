<?php
require("includes/dbh.inc.php");

$sql = "select a.id, hostname,interface,description,node_status from tbl_host h JOIN tbl_node n ON h.id=n.hid JOIN tbl_ack a ON n.id=a.nid where node_status != 2";
$result = $conn->query($sql);

while($row = mysqli_fetch_array($result)){
		$status = ($row['node_status'] == 0 ? "DOWN": "UP");
		$color = ($row['node_status'] == 0 ? "badge badge-danger": "badge badge-success");
		echo"<tr>";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['hostname']."</td>";
		echo "<td>".$row['interface']."</td>";
		echo "<td>".$row['description']."</td>";
		echo "<td> <span class='".$color."'>".$status."</span></td>";
		echo "<td>";
		include("ack_view_btn.php");
		echo "</td>";
		echo "</tr>";
}
?>
