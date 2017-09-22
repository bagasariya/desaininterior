<?php
	require_once '../conn/connection.php';
	session_start();
	$a = $_GET['a'];
	$b = $_GET['b'];
	$mail = $_SESSION['logged_in'];
	$q = "DELETE FROM contact WHERE user_email = '$mail' AND user_contact = '$a' AND user_contact_url = '$b'";
  	$res = mysql_query($q);
  	if ($res) {
  		echo "<script type='text/javascript'>alert('CONTACT DELETED'); document.location = 'index.php?page=pi';</script>";
  	} else {
  		echo "<script type='text/javascript'>alert('FAILED TO DELETE'); document.location = 'index.php?page=pi';</script>";
  	}
?>