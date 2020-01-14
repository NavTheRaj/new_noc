<div class="modal fade" id="add_reason_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
				<form action="includes/add_reasons.inc.php" method="POST">
						<div class="modal-content">
								<div class="modal-header text-center">
										<h4 class="modal-title w-100 font-weight-bold">Add Reason</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
										</button>
								</div>
								<div class="modal-body mx-3">
										<div class="md-form mb-2">
												<select class="form-control" id="departments" name="dept">
														<option value="" selected class="form-control">Choose department</option>
														<!-- *********** department list from tbl_departmen************** -->
														<?php include("show_department_options.php") ?>
												</select>
										</div>

										<div class="md-form mb-4">
												<input type="text" id="reason" class="form-control validate" name="reason">
												<label data-error="wrong" data-success="right" for="department_head">Add Reasons</label>
										</div>
								</div>
								<div class="modal-footer d-flex justify-content-center">
										<input type="submit" class="btn btn-primary ml-auto" id="add_reason" value="Submit" name="addreason">
										<input type="reset" class="btn btn-danger" id="reason" value="Cancel">
								</div>
						</div>
				</form>
		</div>
</div>

