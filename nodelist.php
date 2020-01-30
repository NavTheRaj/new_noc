<?php
require_once("includes/dbh.inc.php");
require_once("includes/func.inc.php");
require("includes/models.php");
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
<div class="modal fade" id="add_node" tabindex="-1" role="dialog"
								aria-labelledby="hostlabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
										<form action="includes/add_node.inc.php" method="post">
												<div class="modal-content">
														<div class="modal-header text-center">
																<h4 class="modal-title w-100 font-weight-bold">Add Node</h4>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																</button>
														</div>
														<div class="modal-body mx-3">
																<select class="browser-default custom-select" name="hid">
																	<option selected disabled>Select Host</option>
																	<?php
																	$result = get_hosts($conn);
																	while($row = mysqli_fetch_array($result)){
																	echo '
																			<option value="'.$row['id'].'">'.$row['hostname'].'</option>
																	';
																	}
																	?>
																</select>
																<div class="md-form mb-5">
																		<i class="fas fa-user prefix grey-text"></i>
																		<input type="text" id="interface" class="form-control validate" name="interface">
																		<label data-error="wrong" data-success="right" for="orangeForm-name">Interface</label>
																</div>
																<div class="md-form mb-5">
																		<i class="fas fa-user prefix grey-text"></i>
																		<input type="text" id="description" class="form-control validate" name="description">
																		<label data-error="wrong" data-success="right" for="orangeForm-name">Description</label>
																</div>
																<div class="md-form mb-5">
																		<i class="fas fa-user prefix grey-text"></i>
																		<input type="text" id="snmpIndex" class="form-control validate" name="snmpIndex">
																		<label data-error="wrong" data-success="right" for="orangeForm-name">SNMP Index</label>
																</div>
														</div>
														<div class="modal-footer d-flex justify-content-center">
																<button class="btn btn-deep-orange" name="add_host">Add Node</button>
														</div>
												</div>
										</form>
								</div>
						</div>

						<div class="text-center m-0 p-0 d-flex justify-content-start">
								<a href="" class="btn btn-default btn-rounded btn-sm" data-toggle="modal"
										data-target="#add_node">Add Node
										<i class="fas fa-plus"></i>
								</a>
						</div>


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
