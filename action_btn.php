<!-- Basic dropdown -->
<a class="btn btn-default btn-sm dropdown-toggle mr-4" type="button" data-toggle="dropdown" aria-haspopup="true"
	aria-expanded="false">Action</a>

<div class="dropdown-menu" id="action_dropdown">
	<a class="dropdown-item" href="#"> <i class="fas fa-eye mr-3"></i>View </a>
<?php
if(!$acknowledged)
{
echo '<a class="dropdown-item ack_btn" href="" data-toggle="modal" data-target="#acknowledge_form"> <i class="fas fa-handshake mr-2"></i> Acknowledge </a>';
}
else 
?>
	
</div>
<!-- Basic dropdown -->
