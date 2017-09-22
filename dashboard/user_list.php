<?php
  require_once '../conn/connection.php';
?> 

  <div class="content-wrapper">
    
    <section class="content-header">
      <h1>
          User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-cloud-upload"></i>User</a></li>
        <li class="active">List User</li>
      </ol>
    </section>

    <section class="content">
    <div class="row">
     <div class="col-md-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h1 class="box-title">List User</h1>
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
                      <th style="width: 20%">Username</th>
                      <th style="width: 25%">E-mail</th>
                      <th style="width: 20%;">Real Name</th>
                      <th style="width: 15%;">Phone</th>
                      <th style="width: 15%;">Change</th>

                    </tr>
                    <?php
                      $sql = "SELECT * FROM user where user_email != '".$_SESSION['logged_in']."'";
                      //echo $sql;
                      $res = mysql_query($sql);
                      
                      $i = 1;
                      while ($data = mysql_fetch_array($res)) {
                        echo "<tr>";
                        echo "<td>" . $i . "</td>";
                        echo "<td>" . $data['user_name'] . "</td>";
                        echo "<td>" . $data['user_email'] . "</td>";
                        echo "<td>" . $data['user_real_name'] . "</td>";
                        echo "<td>" . $data['user_tel'] . "</td>";
                        if ($data['user_type'] == "moderator") {
                          echo "<td>
                                <a href='user_edit.php?un=" . $data['user_name'] . "'><span class='badge bg-light-blue'>Moderator</span></a>
                              </td>";
                        } else if ($data['user_type'] == "paid") {
                          echo "<td>
                                <a href='user_edit.php?un=" . $data['user_name'] . "'><span class='badge bg-green'>Paid</span></a>
                              </td>";
                        } else {
                          echo "<td>
                                <a href='user_edit.php?un=" . $data['user_name'] . "'><span class='badge bg-yellow'>Free</span></a>
                                </td>";
                        }
                        echo "</tr>"; 
                        $i++;
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
                    
                    // $num_rows = mysql_num_rows($query);
                    // // echo $num_rows;
                    // $a = ceil($num_rows/$jumlahBarisPertabel);
                    // for ($j=1; $j<=$a; $j++) { 
                    //   echo "<li><a href='index.php?page=post_list&&halamanke=".$j."'>".$j."</a></li>";
                    // }
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