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
		<div class="add_button">
				<?php include("add_department.php") ?>
				<div class="text-center">
						<a href="" class="btn-rounded mb-4 add_department_section " data-toggle="modal" id="add_dept_button" data-target="#add_department_form">
								<i class="fas fa-plus-circle fa-3x"></i>
						</a>
				</div>

		</div>
</div>


<?php
include("footer.php");
?>
