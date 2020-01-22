<?php
require_once("dbh.inc.php");
if(!isset($_GET['delete'])){
		echo "Not deleted";
}
else{
		$sql = "delete from tbl_node where id = ".$_GET['id'];
		if($conn->query($sql)){
								echo "<script>";
								echo "alert('This node has been deleted.');";
								echo "window.location.replace('../nodelist.php');";
								echo "</script>";
		}
}
?>
