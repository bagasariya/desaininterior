<?php
  	require_once '../conn/connection.php';
	$un = $_GET['un'];

	//get status
	$sql = "SELECT * FROM user WHERE user_name = '$un'";
	//echo $sql;
	$res = mysql_query($sql);
	$data = mysql_fetch_assoc($res);

	if ($data['user_type'] == 'moderator') {
		$status = "paid";	
	} else if ($data['user_type'] == 'paid') {
		$status = "free";	
	} else {
		$status = "moderator";	
	}
	
	// update
	$sql2 = "UPDATE user SET user_type = '$status' WHERE user_name='$un'";
	//echo $sql2;
	$res2 = mysql_query($sql2);
	
	if ($res2) {
     echo "<script type='text/javascript'>document.location = 'index.php?page=user_list';</script>";
	} else {
      echo "<script type='text/javascript'>alert('FAILED TO CHANGE STATUS');</script>";
      // document.location = 'index.php?page=user_list';
	}
?>