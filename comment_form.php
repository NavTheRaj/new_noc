<div class="comment mt-2">
		<form action="includes/comment.inc.php" method="post">
				<div class="row d-flex justify-content-end">
						<div class="col-12 p-0 ">
								<div class="md-form form-lg">
										<input type="text" class="d-none" value="<?php echo $_GET['ack_id'] ?>" name="ack_id">
										<input type="text" id="comment_form" class="form-control form-control-lg" name="comment">
										<label for="inputLGEx">Enter a comment </label>
								</div>
						</div>
						<div class="col-12 px-0 d-flex justify-content-end">
								<?php
								if($tbl_ack['node_status'] == '1'){
										echo '<button class="btn btn-danger" name="resolve">Resolve</button>';
								}
								?>
								<button class="btn btn-primary" name="post">Post</button>
						</div>
				</div>
		</form>
</div>
