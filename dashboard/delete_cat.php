<?php
  require_once '../conn/connection.php';

	$idc = $_GET['idp'];
	$tag = $_GET['idt'];

	$q = "DELETE from post_tag WHERE post_id='$idc' AND tag_id='$tag'";
	$res = mysql_query($q);

	if ($res) {
      echo "<script type='text/javascript'>alert('SUCCESS'); document.location = 'index.php?page=post_edit_2&id=$idc';</script>";
    }else{
      echo "<script type='text/javascript'>alert('FAILED TO DELETE');</script>";
      echo $q;
    }
?>