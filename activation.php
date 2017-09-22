<?php
	include "conn/connection.php";
	$id = $_GET['id'];
	$mail = base64_decode($id);

	if(!empty($_GET['id'])){
		$query = mysql_query("UPDATE user set user_status = '1' WHERE user_email = '$mail'");
		if (!empty($query)) {
			echo "<script type='text/javascript'> alert('YOUR ACCOUNT IS ACTIVATED, PLEASE LOGIN WITH YOUR <b>EMAIL<b> AND <b>PASSWORD<b>'); document.location = '../desaininterior/'</script>";
		} else {
			echo "<script type='text/javascript'> alert('Problem in your account activation'); </script>";
		}
	}
?>