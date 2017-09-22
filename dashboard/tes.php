<?php
  require_once '../conn/connection.php';
  $q1 = "SELECT * FROM post WHERE user_email = 'ariya.b4son@gmail.com'";
  $query = mysql_query($q1);
  // echo $q1;
  

  while ($row = mysql_fetch_array($query)) {
    $id_p = $row['post_id'];
    echo "<a href='index.php?page=post_edit&&id=" . $id_p . "' title='Click Title For The Details'>" . $row['image_title'] . "</a>";
    
    $q2 = "SELECT * FROM view_category WHERE post_id = '$id_p'";
    $query2 = mysql_query($q2);
    // echo $q2;   
    while ($row2 = mysql_fetch_array($query2)) {
      echo $row2['image_tag'] . ",";
    }
    
    echo "<br />";
  }

  ?>