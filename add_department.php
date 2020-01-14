<div class="modal fade" id="add_department_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
				<form action="includes/add_department.inc.php" method="POST">
						<div class="modal-content">
								<div class="modal-header text-center">
										<h4 class="modal-title w-100 font-weight-bold">Add Department</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
										</button>
								</div>
								<div class="modal-body mx-3">
										<div class="md-form mb-5">
												<input type="text" id="department_name" class="form-control validate" name="dept_name">
												<label data-error="wrong" data-success="right" for="department_name">Department Name</label>
										</div>

										<div class="md-form mb-4">
												<input type="text" id="department_head" class="form-control validate" name="dept_head">
												<label data-error="wrong" data-success="right" for="department_head">Department Head</label>
										</div>
										<div class="md-form mb-4">
												<input type="email" id="department_head_email" class="form-control validate"
												name="dept_head_email">
												<label data-error="wrong" data-success="right" for="department_head_email">Department
														Head Email</label>
										</div>
										<div class="md-form mb-4">
												<select name="dept_status" class="form-control default-browser custom-select">
														<option selected>Select Department Status </option>
														<option value="1">Active</option>
														<option value="0">Deactive</option>
												</select>
										</div>

								</div>
								<div class="modal-footer d-flex justify-content-center">
										<button class="btn btn-default" name="add_department">Add</button>
								</div>
						</div>
				</form>
		</div>
</div>

