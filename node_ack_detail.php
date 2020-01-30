<?php
include("header.php");
require("includes/models.php");
// include("nav.php");
// include("sub_menu.php");
$tbl_ack = get_ack_detail($conn,$_GET['ack_id']);
$comments = get_comments($conn,$_GET['ack_id']);
$tbl_node = get_node($conn,$tbl_ack['nid']);
$tbl_subReason = get_subReason($conn,$tbl_ack['subReasonId']);
$tbl_user = get_user($conn,$tbl_ack['ack_by']);
$host = get_host($conn,$tbl_node['hid']);

include("nav.php");
include("sub_menu.php");
?>


<div class="container mt-5 ">
		<center>
				<h1 class="my-2">Node Ack Detail <?php if($tbl_ack['node_status']==2)echo "[Resolved]" ?></h1>
		</center>

		<div class="py-2">
				<div class="row mb-2 border-bottom">
						<div class='col-6'>
								<span>Hostname: </span>
								<?php echo $host['hostname']?>
						</div>
						<div class='col-6'>
								<span>Decription: </span>
								<?php echo $tbl_node['description']?>
						</div> 
				</div>
				<div class="row mb-2 border-bottom">
						<div class='col-6'>
								<span>Interface : </span>
								<?php echo $tbl_node['interface']?>
						</div>
						<div class='col-6'>
								<span>Downtime: </span>
								<?php echo $tbl_ack['downtime']?>
						</div> 
				</div>
				<div class="row mb-2 border-bottom">
						<div class='col-6'>
								<span>Root Cause: </span>
								<?php echo $tbl_subReason['description']?>
						</div>
						<div class='col-6'>
								<span>Node Status: </span>
								<?php echo ($tbl_ack['node_status'] == 2?"Resolved":($result['node_status'])==1?"Up[Not resolved]":"Down")?>
						</div> 
				</div>
				<div class="row mb-2 border-bottom">
						<div class='col-6'>
								<span>Acknowledged By: </span>
								<?php echo $tbl_user['username']?>
						</div>
						<div class='col-6'>
								<span></span>
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
		if($tbl_ack['node_status'] != 2){
				include("comment_form.php");
		}
		?>
</div>

<?php include("footer.php") ?>
