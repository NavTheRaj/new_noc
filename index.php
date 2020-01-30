<?php
require_once("header.php");
require_once("nav.php");
require_once("sub_menu.php");
if(!isset($_SESSION['username'])){
header("location:login.php");
}
?>
<div class="container-fluid">
		<div class="row">
				<div class="col pt-2">
						<div class="container-fluid">
								<ul class="nav nav-tabs mb-3 " id="myTab" role="tablist">
										<li class="nav-item">
										<a class="nav-link  active" id="home-tab" data-toggle="tab" href="#down_nodes-tab" role="tab" aria-controls="home" aria-selected="false">Down Nodes</a>
										</li>
										<li class="nav-item">
										<a class="nav-link" id="ack-tab" data-toggle="tab" href="#ack_nodes-tab" role="tab" aria-controls="ack"
												aria-selected="true">Ack Nodes
										</a>
										</li>
								</ul>
								<div class="tab-content" id="myTabContent">
										<div class="tab-pane fade  show active" id="down_nodes-tab" role="tabpanel" aria-labelledby="down_nodes-tab">
												<div class="table-responsive">
														<table class="table table-sm" id="down_nodes_table">
																<thead>
																		<tr>
																				<th scope="col">ID</th>
																				<th scope="col">Hostname</th>
																				<th scope="col">Interface</th>
																				<th scope="col">Description</th>
																				<th scope="col">Last Updated</th>
																				<th scope="col">Down Time</th>
																				<th scope="col" class="js-not-exportable">Action</th>
																		</tr>
																</thead>
																<tbody>
																<?php include("down_nodes.php") ?>
																<?php include("acknowledge_form.php") ?>
																</tbody>
														</table>
												</div>
										</div>
										<div class="tab-pane fade" id="ack_nodes-tab" role="tabpanel" aria-labelledby="ack-tab">
												<div class="table-responsive">
														<table class="table table-sm" id="acknowledge_table">
																<thead>
																		<tr>
																				<th scope="col">ID</th>
																				<th scope="col">Hostname</th>
																				<th scope="col">Interface</th>
																				<th scope="col">Description</th>
																				<th scope="col">Status</th>
																				<th scope="col">Action</th>
																		</tr>
																</thead>
																<tbody>
																<?php include("acknowledged_nodes.php") ?>
																</tbody>
														</table>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
</div>















<?php
include("footer.php");
?>
