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
						<?php include("tools.php") ?>
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
