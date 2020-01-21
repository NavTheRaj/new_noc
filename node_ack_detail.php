<?php
include("header.php");
require("includes/models.php");
include("nav.php");
include("sub_menu.php");
$result = get_ack_detail($conn,$_GET['ack_id']);
$comments = get_comments($conn,$_GET['ack_id']);
?>

<div class="container mt-5 ">
		<center>
				<h1 class="my-2">Node Ack Detail</h1>
		</center>

		<div class="border py-2">
				<div class="row mb-2">
						<div class='col-6'>
								<span>Ack Id: </span>
								<?php echo $result['id']?>
						</div>
						<div class='col-6'>
								<span>Hostname: </span>
								<?php echo $result['hostname']?>
						</div> 
				</div>
				<div class="row mb-2">
						<div class='col-6'>
								<span>Down Time: </span>
								<?php echo $result['downtime']?>
						</div>
						<div class='col-6'>
								<span>Node Status: </span>
								<?php echo ($result['node_status'] == 0?"Down":"Up")?>
						</div> 
				</div>
		</div>
		<div class="old_comments container mt-4 px-0">
				<?php
				while($comment = $comments->fetch_assoc()){
				echo '
				<!-- Card -->
				<div class="card rounded mb-2 comment_color" >
						<!-- Card content -->
						<div class="card-body"style="width:auto">
								<h4 class="card-title text-primary pb-0 mb-0">'.$comment['username'].'</h4>
										<i class="far fa-clock mr-2"></i>'.explode(" ",$comment['c_date'])[0].'
										<hr>
								<!-- Text -->
								<p class="card-text">'.$comment["comment"].'</p>
						</div>
				</div>
				';
				}
				?>

		</div>
		<div class="comment mt-2">
				<form action="includes/comment.inc.php" method="post">
						<div class="row d-flex justify-content-end">
								<div class="col p-0 ">
										<div class="md-form form-lg">
												<input type="text" class="d-none" value="<?php echo $_GET['ack_id'] ?>" name="ack_id">
												<input type="text" id="comment_form" class="form-control form-control-lg" name="comment">
												<label for="inputLGEx">Enter a comment </label>
										</div>
								</div>
						</div>
						<div class="row">
								<div class="col px-0 d-flex justify-content-end">
										<button class="btn btn-primary" name="post">Post</button>
								</div>
						</div>
				</form>
		</div>
</div>

<?php include("footer.php") ?>
