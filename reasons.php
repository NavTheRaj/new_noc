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
						<?php include("tools.php") ?>
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
<?php include("add_reason.php") ?>
</div>














<?php
include("footer.php");
?>

