<?php
include("header.php");
include("nav.php");
include("sub_menu.php");
if(!isset($_SESSION['username'])){
		header("location:login.php");
}
?>

<div class="container-fluid">
		<div class="row">
				<div class="col-md-8 leftSideBar pt-2">
						<div class="container">
								<div class="d-flex justify-content-center">
										<i class="fas fa-tachometer-alt fa-2x mr-3"></i>
										<h2>Nodes DashBoard</h2>
								</div>
								<ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
										<li class="nav-item">
										<a class="nav-link active" id="home-tab" data-toggle="tab" href="#down_nodes" role="tab" aria-controls="home"
												aria-selected="true">Down Nodes</a>
										</li>
										<li class="nav-item">
										<a class="nav-link" id="profile-tab" data-toggle="tab" href="#all_nodes" role="tab" aria-controls="profile"
												aria-selected="false">All Nodes</a>
										</li>
								</ul>
								<div class="tab-content" id="myTabContent">
										<div class="tab-pane fade show active" id="down_nodes" role="tabpanel"
												aria-labelledby="down_nodes-tab">
												<div class="table-responsive">
														<table class="table" id="datatables-fix-header">
																<thead>
																		<tr>
																				<th scope="col">Hostname</th>
																				<th scope="col">Interface</th>
																				<th scope="col">Description</th>
																				<th scope="col">Last Updated</th>
																				<th scope="col">Down Time</th>
																				<th scope="col">Action</th>
																		</tr>
																</thead>
																<tbody>
																	<?php include("down_nodes.php") ?>
																</tbody>
														</table>
												</div>
										</div>
										<div class="tab-pane fade" id="all_nodes_tables" role="tabpanel"
												aria-labelledby="all_nodes_tab">
												<div class="table_responsive">
														<table class="table" id="all_nodes_table">
																<thead>
																	<tr>
																		<th scope="col">Hosename</th>
																		<th scope="col">Interface</th>
																		<th scope="col">Desctiption</th>
																		<th scope="col">Online Modems</th>
																		<th scope="col">Last Update</th>
																	</tr>
																</thead>
																<tbody>
																<?php include("nodelist.php") ?>
																</tbody>
														</table>
												</div>
										</div>
								</div>
						</div>
				</div>
				<div class="col-md-4 default-color rightSideBar">
						One of three columns
				</div>
		</div>
</div>















<?php
include("footer.php");
?>
