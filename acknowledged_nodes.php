<?php
require("includes/dbh.inc.php");
$result = $conn->query(" select hostname,interface,description,downtime,assign,remark,node_status from tbl_host h JOIN tbl_node n ON h.id=n.hid JOIN tbl_ack a ON n.id=a.nid");


while($row = mysqli_fetch_array($result))
{
		echo "<tr>";
		echo "<td>".$row['hostname']."</td>";
		echo "<td>".$row['interface']."</td>";
		echo "<td>".$row['description']."</td>";
		echo "<td>".$row['status']."</td>";
		echo "<td>";
				include("action_btn.php");
		echo"</td></tr>";
}
}
mysqli_close($con);

?>
