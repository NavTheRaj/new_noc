<?php
require_once("includes/dbh.inc.php");
require_once("includes/func.inc.php");
require_once("includes/models.php");
session_start();

check_access();

include("header.php");
include("nav.php");
include("sub_menu.php");


if(!isset($_GET['id']) || !isset($_GET['action'])){
header("Location:./nodelist.php");
}
else{
$id = $_GET['id'];
$result = get_node($conn,$id);
}

?>
<div class="login_container">
		<!-- Material form login -->
		<div class="row d-flex justify-content-center">
				<div class="col-sm-8 col-md-4 pt-5">
						<div class="card">
								<h5 class="card-header text-center py-4">
										<strong>Edit Node</strong>
								</h5>

								<!--Card content-->
								<div class="card-body px-lg-5 pt-0">

										<!-- Form -->
										<form class="text-center" style="color: #757575;" action="includes/editnode.inc.php"
												method="POST">
												<!-- Email -->
												<div class="md-form">
														<input type="text" id="interface" class="form-control " value="<?php echo $result['interface'] ?>" name="interface">
														<input type="text" id="interface" class="form-control d-none" value="<?php echo $result['id'] ?>" name="id">
														<label for="interface">Interface</label>
												</div>
												<div class="md-form">
														<input type="text" id="description" class="form-control" value="<?php echo
														$result['description'] ?>" name="description">
														<label for="description">Description</label>
												</div>
												<div class="md-form">
														<input type="text" id="snmpIndex" class="form-control" value="<?php echo $result['snmpIndex'] ?>" name="snmpIndex">
														<label for="snmpIndex">snmpIndex</label>
												</div>
												<div class="md-form">
														<select class="browser-default custom-select" name="status" required>
																<option value="" disabled selected>Monitor Status</option>
																<option value="0">Don't Monitor</option>
																<option value="1">Monitor</option>
														</select>
												</div>
												<!-- Password -->


												<!-- Sign in button -->
												<?php
												if($_GET['action']=='edit'){
												echo '

												<button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect
														z-depth-0" type="submit" name="edit">Edit</button>
												';
												}
												else if($_GET['action']=='delete'){
														echo '
																<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete">
																Delete
																</button>

';
												}
												?>


<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
Are you sure you want to delete this node?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<a class="btn btn-danger" name="delete"
href="includes/deleteNode.inc.php?delete&id=<?php echo $_GET['id'] ?>" name="delete">Delete</a>
      </div>
    </div>
  </div>
</div>
										</form>
										<!-- Form -->

								</div>

						</div>
				</div>
		</div>
</div>
<!-- Material form login -->

<?php include("footer.php") ?>
