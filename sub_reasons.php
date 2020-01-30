<?php
require("includes/dbh.inc.php");
require("includes/models.php");
include("header.php");
include("nav.php");
include("sub_menu.php");
if(!isset($_SESSION['username'])){
		header("location:login.php");
}
?>


<div class="container p-0">
		<div class="row">
				<div class="col" id="view_reasons">
						<h4 class="my-3 text-center">List of Sub Rasons</h4>
						<a href="" class="btn btn-default btn-sm" data-toggle="modal" id="add_dept_button" data-target="#add_subReason">
								Add New <i class="fas fa-plus"></i>
						</a>
						<div class="table_responsive">
								<table class="table " id="">
										<thead>
												<tr >
														<th scope="col">ID</th>
														<th scope="col">Reasons</th>
														<th scope="col">Sub Reason</th>
												</tr>
										</thead>
										<tbody>
												<?php
												$sql = "select s.id,sub_reason, description from tbl_subReasons s JOIN tbl_reasons r ON s.reasonId = r.id";
												$reasons = $conn->query($sql);
																		while($row = $reasons->fetch_assoc()){
																				echo '
																						<tr>
																						<th>'.$row['id'].'
																						<th>'.$row['description'].'
																						<th>'.$row['sub_reason'].'
																						</tr>
																						';
																}

														?>
										</tbody>
								</table>
						</div>


				</div>
		</div>
		<div class="modal fade" id="add_subReason" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
				aria-hidden="true">
				<div class="modal-dialog" role="document">
						<form action="includes/add_subReason.inc.php" method="post">
								<div class="modal-content">
										<div class="modal-header text-center">
												<h4 class="modal-title w-100 font-weight-bold">Add Sub Reason</h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
												</button>
										</div>
										<div class="modal-body mx-3">
												<div class="md-form mb-5">
														<select class="form-control" id="departments" name="reason_id">
																<option value="" selected class="form-control" disabled>Choose a
																Root Reason</option>
																<!-- *********** department list from tbl_departmen************** -->
<?php

																$sql = "select * from tbl_reasons";
																$result = $conn->query($sql);
																if($result->num_rows>0){
																		while($row = $result->fetch_assoc()){
																				echo " <option value='".$row['id']."'"; 
																				echo ">".$row['description']."</option> ";
																		}
																}
																else{
																		echo "no departments in the databases";
																}
?>
														</select>
												</div>

												<div class="md-form mb-4">
														<input type="text" id="defaultForm-pass" class="form-control validate" name="sub_reason">
														<label data-error="wrong" data-success="right"
																for="defaultForm-pass">Sub Reason</label>
												</div>

										</div>
										<div class="modal-footer d-flex justify-content-center">
												<button class="btn btn-default" name="submit">Add Sub Reason</button>
										</div>
								</div>
						</form>
				</div>
		</div>
</div>







<?php
																include("footer.php");
?>

