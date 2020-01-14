<?php
require("includes/dbh.inc.php");
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
						<h4 class="my-3 text-center">List Of Reasons</h4>
						<div class="table_responsive">
								<table class="table " id="">
										<thead>
												<tr >
														<th scope="col">SN</th>
														<th scope="col">Departments</th>
														<th scope="col">Reasons</th>
												</tr>
										</thead>
										<tbody>
										<?php include("reasons_list.php") ?>
										</tbody>
								</table>
						</div>


				</div>
		</div>
<div class="add_button">
				<?php include("add_reason.php") ?>
				<div class="text-center">
						<a href="" class="btn-rounded mb-4 add_department_section " data-toggle="modal" id="add_dept_button" data-target="#add_reason_form">
								<i class="fas fa-plus-circle fa-3x"></i>
						</a>
				</div>

		</div>
</div>














<?php
include("footer.php");
?>

