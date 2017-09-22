<?php
    $id = $_GET['id'];
    $qq = "DELETE FROM post WHERE post_id = '$id'";
    $res = mysql_query($qq);
    echo $qq;
    if ($res) {
      //$qq2 = "DELETE FROM post_tag WHERE post_id = ''";
      echo "<script type='text/javascript'>alert('POST DELETED'); document.location = 'index.php?page=post_list';</script>";
    }else{
      echo "<script type='text/javascript'>alert('FAILED TO DELETE');</script>";
          
    }

?>