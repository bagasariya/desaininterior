<?php
  $cat = $_GET['category'];
  if (empty($_GET['category'])) {
    $a = "SELECT * FROM post WHERE user_email = '$mail'";
    //echo $a;
    $query = mysql_query($a);
  } else {
    $a = "SELECT * FROM view_post_category WHERE user_email = '$mail' AND i_tag = '$cat'";
    //echo $a;
    $query = mysql_query($a);
  }
  //echo $a;
  $jumlahBarisPertabel=10;
  $halamanke = 1;
?>

  <div class="content-wrapper">
    
    <section class="content-header">
      <h1>
          Post
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-cloud-upload"></i> Post</a></li>
        <li class="active">List Post</li>
      </ol>
    </section>

    <section class="content">
    <div class="row">
     <div class="col-md-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h1 class="box-title">List Post</h1>
            </div>
            <div class="box-body">
                  <form method="post">
              <div class="box-tools" style="float: right;">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search Title..." id="myInput" onkeyup="myFunction()">
                </div>
              </div>
                  </form>
              </div>
              <div class="box-body">

                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover" id="myTable">
                    <tr>
                      <th style="width: 5%">#</th>
                      <th style="width: 55%">Title</th>
                      <th style="width: 40%">Category</th>
                      <th style="width: 10%;">Status</th>
                    </tr>
                    <?php
                      if (isset($_GET['halamanke'])) {
                        $halamanke = $_GET['halamanke'];
                      }else{
                        $halamanke = 1;
                      }
                      $barispertama = ($halamanke-1)*$jumlahBarisPertabel;
                      if (empty($_GET['category'])) {
                        $query1 = mysql_query("SELECT * FROM post WHERE user_email = '$mail' LIMIT $barispertama, $jumlahBarisPertabel");
                      } else {
                        $query1 = mysql_query("SELECT * FROM view_post_category WHERE p_user = '$mail' AND i_tag = '$cat' LIMIT $barispertama, $jumlahBarisPertabel");
                      }
                      $i = 1;
                      // $nomor = 1;
                      $nomer = 5 * ($halamanke -1)+1;
                      while ($row = mysql_fetch_array($query1)) {
                        $id_p = $row['post_id'];

                        echo "<tr>";
                        if ($halamanke <= 1) {
                          echo "<td>" . $i++ . "</td>";
                        }else{
                          echo "<td>" . $nomer++ . "</td>";
                        }
                        echo "<td><a href='index.php?page=post_edit&id=" . $id_p . "' title='Click Title For The Details'>" . $row['image_title'] . "</a></td>";
                        echo "<td>";

                        $query2 = mysql_query("SELECT * FROM view_posttag_tag WHERE post_id = '$id_p'");

                        $y = 1;
                        while ($row2 = mysql_fetch_array($query2)) {
                          $query3 = mysql_query("SELECT COUNT(*) AS total FROM view_posttag_tag WHERE post_id = '$id_p'"); 
                          $data = mysql_fetch_assoc($query3);

                          if ($y == $data['total']) {
                            
                            echo "<a href='index.php?page=post_list&category=" . $row2['image_tag'] . "'>" . $row2['image_tag'] . "</a>";
                          } else {
                            echo "<a href='index.php?page=post_list&category=" . $row2['image_tag'] . "'>" . $row2['image_tag'] . "</a>, ";
                          }
                          $y++;
                        }

                        echo "</td>";
                        if ($row['status'] == "published") {
                          $d = "<span class='label label-success'>Published</span>";
                        } else {
                          $d = "<span class='label label-primary'>Draft</span>";
                        }
                        echo "<td>" . $d . "</td>";
                        echo "</tr>";
                        // $i++;
                      }
                    ?>
                  </table>
                </div>

              </div>
              <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                  <!-- <li><a href="#">&laquo;</a></li> -->
                  <?php
                    // <!-- paging -->
                    
                    $num_rows = mysql_num_rows($query);
                    // echo $num_rows;
                    $a = ceil($num_rows/$jumlahBarisPertabel);
                    for ($j=1; $j<=$a; $j++) { 
                      echo "<li><a href='index.php?page=post_list&&halamanke=".$j."'>".$j."</a></li>";
                    }
                  ?>
                  <!-- <li><a href="#">&raquo;</a></li> -->
                </ul>
              </div>
            </div>
          </div>
          </div>
        </div>
<script>
  function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>