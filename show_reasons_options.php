<?php
$sql = "select * from tbl_subReasons";
$result = $conn->query($sql);
if($result->num_rows>0){
		while($row = $result->fetch_assoc()){
				$id = $row['id'];
				echo " <option value='".$id."'>".$row['description']."</option> ";
		}
}
else{
		echo "no departments in the databases";
}
?>
