<div class="row mb-3"> <!-- buttons row -->
		<div class="col-sm-6 p-0">
				<div class="btn-group">
						<div class="add_button">
								<?php include("add_department.php") ?>
								<div class="">
										<a href="" class="btn btn-default btn-sm" data-toggle="modal" id="add_dept_button" data-target="#add_department_form">
												Add New <i class="fas fa-plus"></i>
										</a>
								</div>
						</div>
				</div>
		</div>
		<div class="col-md-6 p-0 d-flex ">
				<!-- Basic dropdown -->
				<button class="btn btn-outline-default btn-sm dropdown-toggle ml-auto" type="button" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">Tools</button>

				<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="#"> <i class="fas fa-print mr-1"></i>Print</a>
						<a class="dropdown-item" href="#"> <i class="far fa-file-pdf mr-2"></i>Save as a Pdf </a>
						<a class="dropdown-item" href="#"> <i class="fas fa-file-excel mr-2"></i>Export To CSV </a>
						<a class="dropdown-item" href="#"> <i class="far fa-file-pdf mr-2"></i>Save as a Pdf </a>
				</div>
		</div>
</div>
