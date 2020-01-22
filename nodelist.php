<?php
require_once("includes/dbh.inc.php");
require_once("includes/func.inc.php");
include("header.php");
include("nav.php");
include("sub_menu.php");

//redirects to main page if not viewd from main page
redirect_to_main_page("nodelist.php");


$result = mysqli_query($conn,"select tbl_host.hostname,
		tbl_node.id,
		tbl_node.interface,
		tbl_node.description,
		tbl_node.online,
		tbl_node.last_update from tbl_node  JOIN tbl_host on tbl_host.id=tbl_node.hid  ORDER by tbl_host.hostname");

?>
<div class="container">
<table class="table table-sm" id="all_nodes_table">
		<thead>
				<tr>
						<th scope="col">Hosename</th>
						<th scope="col">Interface</th>
						<th scope="col">Desctiption</th>
						<th scope="col">Online Modems</th>
						<th scope="col">Last Update</th>
						<th scope="col">Action</th>
				</tr>
		</thead>
		<tbody>

<?php

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
		echo '<td>
				<button class="btn btn-outline-default btn-sm dropdown-toggle ml-auto" type="button" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">Action</button>
				<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="node_edit.php?id='.$row["id"].'&action=edit"> <i class="fas fa-edit mr-1"></i>Edit</a>
						<a class="dropdown-item" href="node_edit.php?id='.$row["id"].'&action=delete"> <i class="fas fa-trash-alt mr-2"></i>Delete</a>
				</div>
				</td>';
		echo "</tr>";
}
mysqli_close($conn);

?>
		</tbody>
</table>
</div>

<?php include("footer.php") ?>
