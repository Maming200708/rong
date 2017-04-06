<?php
	header('Content-Type:application/json');
	$output=['status'=>0];
	$phone=$_REQUEST['phone'];
	$conn = mysqli_connect(SAE_MYSQL_HOST_M, SAE_MYSQL_USER, SAE_MYSQL_PASS,  SAE_MYSQL_DB, SAE_MYSQL_PORT);
	$sql="SELECT user_id FROM usermess WHERE user_name='$phone'";
	mysqli_query($conn,'SET NAMES UTF8');
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	if($row){
		$output['status']=intval($row['user_id']);
		echo json_encode($output);
	}
	else{
		$output['status']=-404;
		echo json_encode($output);
	}
?>