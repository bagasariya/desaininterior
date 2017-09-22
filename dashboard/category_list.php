<?php
  // error_reporting(0);

  $retval1 = mysql_query("SELECT * FROM tag WHERE user_email = '$mail'");
  $jumlahBarisPertabel=10;
  $halamanke=1;
  // if(isset($_GET['halamanke'])) // untuk mengecek apakah ada nilai yang diberikan 
  // $halamanke=$_GET['halamanke'];
  $j=1;
?>
<div class="content-wrapper">
  
  <section class="content-header">
    <h1>
        Category
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-pie-chart"></i> Category</a></li>
      <li class="active">List Category</li>
    </ol>
  </section>
  
    <section class="content">
      <div class="row">
        <div class="col-md-6">
        <!-- mulai box -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">List Category</h3>
            </div>
            <form class="form-horizontal" action="category_delete.php" method="post">
              <div class="box-body">
                <table class="table table-bordered">
                <tr>
                  <th style="width: 5%">#</th>
                  <th style="width: 5%">-</th>
                  <th>Category</th>
                </tr>
                <?php
                  if (isset($_GET['halamanke'])) {
                    $halamanke = $_GET['halamanke'];
                  }else{
                    $halamanke = 1;
                  }
                  $barispertama = ($halamanke-1)*$jumlahBarisPertabel;
                  $retval = mysql_query("SELECT * FROM tag WHERE user_email = '$mail' LIMIT $barispertama, $jumlahBarisPertabel");
                  $nomor = 1;
                  $nomer = 5 * $halamanke + 1;
                  while ($row = mysql_fetch_array($retval)) {
                    echo "<tr><td>";
                    if ($halamanke <= 1) {
                      echo $nomor++;
                    } else {
                      echo $nomer++;
                    }
                    echo "
                      </td>
                      <td>
                        <input type='checkbox' name='checked_id[]' value=" . $row['tag_id'] . "</input>
                      </td>
                      <td>" . $row['image_tag']. "
                      </td>
                    </tr>
                    ";
                    $j++;
                  
                  }
                ?>
                
                </table>

              </div>

              <div class="box-footer">
                <!-- <a href="" class="btn btn-warning pull-left">delete</a> -->
                <input type="submit" class="btn btn-warning pull-left" value="Delete" name="category_delete" onclick="return confirm('ARE YOU SURE WANT TO DELETE?');">
              </div>

              <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                  <!-- <li><a href="#">&laquo;</a></li> -->
                  <?php
                    // <!-- paging -->
                    
                    $num_rows = mysql_num_rows($retval1);
                    // echo $num_rows;
                    $a = ceil($num_rows/$jumlahBarisPertabel);
                    for ($i=1; $i<=$a; $i++) { 
                      echo "<li><a href='index.php?page=category_list&halamanke=".$i."'>".$i."</a></li>";
                    }
                  ?>
                  <!-- <li><a href="#">&raquo;</a></li> -->
                </ul>
              </div>
            </form>
          </div>
          <!-- /.box -->
      </div>

      <div class="col-md-6">
        <?php
          if ($_SESSION['user']  == 'free') {
    
            $q = "SELECT COUNT(*) AS total FROM tag WHERE user_email = '$mail'";
            $res = mysql_query($q);
            $data = mysql_fetch_array($res);
            // echo $data['total'];

            if ($data['total'] >= 4) {
              include "category_add_alert.php";
            } else {
              include "category_add.php";
            }
          } 
        ?>
        </div>          

    </section>
 </div>