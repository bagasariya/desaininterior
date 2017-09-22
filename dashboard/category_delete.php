<?php
  error_reporting(0);

    require_once '../conn/connection.php';
    if (isset($_POST['category_delete'])) {
      $arr_id = $_POST['checked_id'];

      // print_r($arr_id);

      if (empty($arr_id)) {
          echo "<script type='text/javascript'>alert('YOU HAVE NOT CHOSEN CATEGORY!'); document.location = 'index.php?page=category_list';</script>";
      } else {
        foreach ($arr_id as $id => $value) {
          $ch = $_POST['checked_id'][$id];
          $q = "DELETE FROM tag WHERE tag_id = '$ch'";
          $res = mysql_query($q);

          // echo $q . "<p>";

          if ($res) {
            echo "<script type='text/javascript'>alert('CATEGORY DELETED'); document.location = 'index.php?page=category_list';</script>";
          } else {
            echo "<script type='text/javascript'>alert('GAISO'); document.location = 'index.php?page=category_list';</script>";

          }
        }
      }
    }
?>