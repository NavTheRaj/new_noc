<?php
require("includes/dbh.inc.php");
$result = mysqli_query($conn,"select tbl_host.hostname,
		tbl_node.interface,
		tbl_node.description,
		tbl_node.online,
		tbl_node.last_update from tbl_node  JOIN tbl_host on tbl_host.id=tbl_node.hid  ORDER by tbl_host.hostname");
while($row = mysqli_fetch_array($result))
{
		if ($row['online'] > 0){
				echo "<tr style='color:#038017'>";
				echo "<td>".$row['hostname']."</td>";
				echo "<td>".$row['interface']."</td>";
				echo "<td>".$row['description']."</td>";
				echo "<td>".$row['online']."</td>";
				echo "<td>".$row['last_update']."</td>";
				echo "</tr>";
		}
		else	{
				echo "<tr style='color:#a61103'>";
				echo "<td>".$row['hostname']."</td>";
				echo "<td>".$row['interface']."</td>";
				echo "<td>".$row['description']."</td>";
				echo "<td>".$row['online']."</td>";
				echo "<td>".$row['last_update']."</td>";
				echo "</tr>";
		}
}
mysqli_close($conn);

?>
