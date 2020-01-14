<?php
require("includes/dbh.inc.php");
include("header.php");
include("nav.php");
include("sub_menu.php");
if(!isset($_SESSION['username'])){
header("location:login.php");
}
?>


<div class="container-fluid p-0">
		<div class="row">
				<div class="col-md-4 p-0" id="add_reasons">
						<!-- Add Reasons -->
						<div class="container-fluid">
								<form action="includes/add_reasons.inc.php" method="post">
										<h4 class="my-5 text-center">Add Reasons</h4>
										<div class="row mb-4">
												<div class="col-4">
														<label for="departments">Department</label>
												</div>
												<div class="col-8">
														<select class="form-control" id="departments" name="dept">
																<?php
																$sql = "select * from tbl_dept";
																$result = $conn->query($sql);
																if($result->num_rows>0){
																while($row = $result->fetch_assoc()){
																echo " <option value='".$row['id']."'"; 
																if($_GET['dept'] == $row['id']){echo "selected";}
																echo ">".$row['deptName']."</option> ";
																}
																}
																else{
																echo "no departments in the databases";
																}
																?>
														</select>

												</div>
										</div>
										<div class="row">
												<div class="col-4">
														<label for="reason"> Reason </label>
												</div>
												<div class="col-8">
														<input type="text" id="reason" class="form-control" name="reason" >
												</div>
										</div>
										<div class="form-group d-flex justify-content-center mt-5">
												<input type="submit" class="btn btn-primary ml-auto" id="reason" value="Submit" name="addreasons">
												<input type="reset" class="btn btn-danger" id="reason" value="Cancel">
										</div>
								</form>
						</div>
				</div>
				<div class="col-md-8 border-left" id="view_reasons">
						<h4 class="my-5 text-center">List Of Reasons</h4>
						<div class="table_responsive">
								<table class="table " id="">
										<thead>
												<tr class="text-center">
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
</div>

















<?php
include("footer.php");
?>

