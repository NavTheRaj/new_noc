<?php

require("includes/dbh.inc.php");
require_once("includes/func.inc.php");

// redirets to main page if accessing the included file
redirect_to_main_page("index.php");


$start_date = date("Y-m-01");
$end_date = date("Y-m-t");

$sql = "select a.id, hostname, interface, description, node_status from tbl_host h JOIN tbl_node n ON h.id=n.hid JOIN tbl_ack a ON n.id=a.nid where node_status < 2 and downtime between '$start_date' and '$end_date'"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
				$status = ($row['node_status'] == 0 ? "DOWN": "UP");
				$color = ($row['node_status'] == 0 ? "badge badge-danger": "badge badge-success");
				echo"<tr>";
				echo "<td>".$row['id']."</td>";
				echo "<td>".$row['hostname']."</td>";
				echo "<td>".$row['interface']."</td>";
				echo "<td>".$row['description']."</td>";
				echo "<td> <span class='".$color."'>".$status."</span></td>";
				echo "<td> <a class='btn btn-default btn-sm mr-4' type='button' href='node_ack_detail.php?ack_id=".$row['id']."'>View</a></td>";
				echo "</tr>";
		}
}
?>
