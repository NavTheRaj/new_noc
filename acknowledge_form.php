
<div class="modal fade" id="acknowledge_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		aria-hidden="true">
<form action="includes/acknowledge.inc.php" method="post">
		<div class="modal-dialog" role="document">
				<div class="modal-content">
						<div class="modal-header text-center">
								<h4 class="modal-title w-100 font-weight-bold">Acknowledge Form</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body mx-3">
								<div class="row form-group mb-2">
										<div class="col-4">
												<label data-error="wrong" data-success="right" for="hostname">Host Name</label>
										</div>
										<div class="col-8">
												<label id="md_hostname"></label>
												<input type="text" id="hostname" class="form-control validate d-none" value="" name="hostname">
												<input type="text" id="nid" class="form-control validate d-none" value="" name="nid">
										</div>
								</div>
								<div class="row form-group mb-2">
										<div class="col-4">
												<label data-error="wrong" data-success="right" for="port_no">Port Number</label>
										</div>
										<div class="col-8">
												<label id="md_port_no"></label>
												<input type="text" id="port_no" class="form-control validate d-none" value="" name="port_no">
										</div>
								</div>
								<div class="row form-group mb-2">
										<div class="col-4">
												<label data-error="wrong" data-success="right" for="description">Description</label>
										</div>
										<div class="col-8">
												<label id="md_description"></label>
												<input type="text" id="description" class="form-control validate d-none" value="" name="description">
										</div>
								</div>
								<div class="row form-group mb-2">
										<div class="col-4">
												<label data-error="wrong" data-success="right" for="down_time">Down Time</label>
										</div>
										<div class="col-8">
												<label id="md_down_time"></label>
												<input type="text" id="down_time" class="form-control validate d-none" value="" name="down_time">
										</div>
								</div>
								<div class="row form-group mb-2">
										<div class="col-4">
												<label data-error="wrong" data-success="right" for="down_time">Duration</label>
										</div>
										<div class="col-8">
												<label id="md_duration"></label>
												<input type="text" id="duration" class="form-control validate d-none" value="" name="duration">
										</div>
								</div>
								<div class="row form-group mb-2">
										<div class="col-4">
												<label data-error="wrong" data-success="right" for="reason">Reason</label>
										</div>
										<div class="col-8">
												<select class="form-control" id="departments" name="sub_reason_id">
														<option value="" selected class="form-control" name="reason">Select A Reason</option>
														<!-- *********** department list from tbl_departmen************** -->
														<?php include("show_reasons_options.php") ?>
												</select>
										</div>
								</div>
								<div class="row form-group mb-2">
										<div class="col-4">
												<label data-error="wrong" data-success="right" for="informed_to">Informed To</label>
										</div>
										<div class="col-8">
												<input type="text" id="informed_to" class="form-control validate" value=""
												name="informed_to">
										</div>
								</div>
								<div class="row form-group mb-2">
										<div class="col-4">
												<label data-error="wrong" data-success="right" for="informed_to">Remark</label>
										</div>
										<div class="col-8">
												<textarea class="form-control" id="remark" rows="5" name="remark"></textarea>
										</div>
								</div>

						</div>
						<div class="modal-footer d-flex justify-content-center">
								<button class="btn btn-default" name="submit">Acknowledge</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
										Cancel
								</button>
						</div>
				</div>
		</div>
</form>
</div>
