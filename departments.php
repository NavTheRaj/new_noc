<?php
include("header.php");
include("nav.php");
include("sub_menu.php");
if(!isset($_SESSION['username'])){
header("location:login.php");
}
?>

<div class="container">
		<div class="row">
				<div class="col mt-4">
						<h2 class="text-center mb-5">List of Departments</h2>
						<div class="row">
								<div class="col-sm-6">
										<div class="btn-group">
												<div class="add_button">
														<?php include("add_department.php") ?>
														<div class="">
																<a href="" class="btn btn-default" data-toggle="modal" id="add_dept_button" data-target="#add_department_form">
																		Add New <i class="fas fa-plus"></i>
																</a>
														</div>
												</div>
										</div>
								</div>
								<div class="col-md-6 d-flex ">
										<!-- Basic dropdown -->
										<button class="btn btn-outline-default dropdown-toggle ml-auto" type="button" data-toggle="dropdown"
												aria-haspopup="true" aria-expanded="false">Tools</button>

										<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#"> <i class="fas fa-print mr-1"></i>Print</a>
												<a class="dropdown-item" href="#"> <i class="far fa-file-pdf mr-2"></i>Save as a Pdf </a>
												<a class="dropdown-item" href="#"> <i class="fas fa-file-excel mr-2"></i>Export To CSV </a>
												<a class="dropdown-item" href="#"> <i class="far fa-file-pdf mr-2"></i>Save as a Pdf </a>
										</div>
								</div>
						</div>
						<div class="table_responsive">
								<table class="table">
										<thead>
												<tr class="text-center">
														<th scope="col">ID</th>
														<th scope="col">Departments</th>
														<th scope="col">Department Head</th>
														<th scope="col">Email</th>
														<th scope="col">Status</th>
												</tr>
										</thead>
										<tbody>
										<?php include("department_list.php") ?>
										</tbody>
								</table>
						</div>
				</div>
		</div>
</div>


<?php
include("footer.php");
?>
