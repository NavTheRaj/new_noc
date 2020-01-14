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
