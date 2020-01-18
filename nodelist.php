<?php
require_once("includes/dbh.inc.php");
require_once("includes/func.inc.php");

//redirects to main page if not viewd from main page
redirect_to_main_page("index.php");


$result = mysqli_query($conn,"select tbl_host.hostname,
		tbl_node.interface,
		tbl_node.description,
		tbl_node.online,
		tbl_node.last_update from tbl_node  JOIN tbl_host on tbl_host.id=tbl_node.hid  ORDER by tbl_host.hostname");
while($row = mysqli_fetch_array($result))
{
				echo "<tr class='";
				if($row['online']>0){
						echo " node_up_color ";
				}
				else{
						echo " node_down_color ";
				}
				echo "'>";
				echo "<td>".$row['hostname']."</td>";
				echo "<td>".$row['interface']."</td>";
				echo "<td>".$row['description']."</td>";
				echo "<td>".$row['online']."</td>";
				echo "<td>".$row['last_update']."</td>";
				echo "</tr>";
}
mysqli_close($conn);

?>
