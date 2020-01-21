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
				<h1 class="my-2">Node Ack Detail <?php if($result['node_status']==2)echo "[Resolved]" ?></h1>
		</center>

		<div class="border py-2">
				<div class="row mb-2">
						<div class='col-6'>
								<span>Hostname: </span>
								<?php echo $result['hostname']?>
						</div>
						<div class='col-6'>
								<span>Decription: </span>
								<?php echo $result['description']?>
						</div> 
				</div>
				<div class="row mb-2">
						<div class='col-6'>
								<span>Interface : </span>
								<?php echo $result['interface']?>
						</div>
						<div class='col-6'>
								<span>Downtime: </span>
								<?php echo $result['downtime']?>
						</div> 
				</div>
				<div class="row mb-2">
						<div class='col-6'>
								<span>Root Cause: </span>
								<?php echo $result['interface']?>
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
				<div class="container text-justify">
						<div class="rounded mb-2" style="width:auto;max-width:80%">
								<div class="comment_color p-3 d-inline-block">
										<h3 class="text-primary pb-0 mb-1">'.$comment['username'].'</h3>
										<!-- Text -->
										<p class="card-text">'.$comment["comment"].'</p>
										<hr>
										<i class="far fa-clock mr-2"></i>'.$comment['c_date'].'
								</div>
						</div>
				</div>
				';
				}
				?>
		</div>
		<?php
		if($result['node_status'] != '2'){
		include("comment_form.php");
		}

		?>
</div>

<?php include("footer.php") ?>
