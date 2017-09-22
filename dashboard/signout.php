<?php
	require_once '../functions.php';
	unset($_SESSION['logged_in']);
	session_destroy();
	echo "<script type='text/javascript'>document.location='../';</script>";
?>