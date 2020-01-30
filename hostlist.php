<?php
include("header.php");
include("nav.php");
include("sub_menu.php");
require_once("includes/func.inc.php");

check_access(); // checking access of this page from func.inc.php file
?>

<div class="container">
		<div class="row">
				<div class="col mt-4">
						<h2 class="text-center mb-5">List of Hosts</h2>

						<div class="modal fade" id="add_host" tabindex="-1" role="dialog"
								aria-labelledby="hostlabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
										<form action="includes/add_host.inc.php" method="post">
												<div class="modal-content">
														<div class="modal-header text-center">
																<h4 class="modal-title w-100 font-weight-bold">Add Host</h4>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																</button>
														</div>
														<div class="modal-body mx-3">
																<div class="md-form mb-5">
																		<i class="fas fa-user prefix grey-text"></i>
																		<input type="text" id="hostname" class="form-control validate" name="hostname">
																		<label data-error="wrong" data-success="right" for="orangeForm-name">Host Name</label>
																</div>
																<div class="md-form mb-5">
																		<i class="fas fa-user prefix grey-text"></i>
																		<input type="text" id="community" class="form-control validate" name="community">
																		<label data-error="wrong" data-success="right" for="orangeForm-name">Community String</label>
																</div>
																<div class="md-form mb-5">
																		<i class="fas fa-user prefix grey-text"></i>
																		<input type="text" id="vendor" class="form-control validate" name="vendor">
																		<label data-error="wrong" data-success="right" for="orangeForm-name">Vendor</label>
																</div>
																<div class="md-form mb-5">
																		<i class="fas fa-user prefix grey-text"></i>
																		<input type="text" id="snmpIndex" class="form-control validate" name="snmpIndex">
																		<label data-error="wrong" data-success="right" for="orangeForm-name">SNMP Index</label>
																</div>
														</div>
														<div class="modal-footer d-flex justify-content-center">
																<button class="btn btn-deep-orange" name="add_host">Sign up</button>
														</div>
												</div>
										</form>
								</div>
						</div>

						<div class="text-center m-0 p-0 d-flex justify-content-start">
								<a href="" class="btn btn-default btn-rounded btn-sm" data-toggle="modal"
										data-target="#add_host">Add Host
										<i class="fas fa-plus"></i>
								</a>
						</div>



						<div class="table_responsive">
								<table class="table">
										<thead>
												<tr class="text-center">
														<th scope="col">ID</th>
														<th scope="col">Host Name</th>
														<th scope="col">Community</th>
														<th scope="col">Vendor</th>
														<th scope="col">SNMP Index</th>
												</tr>
										</thead>
										<tbody>
										<?php include("hosts.php") ?>
										</tbody>
								</table>
						</div>
				</div>
		</div>
</div>


<?php
include("footer.php");
?>
