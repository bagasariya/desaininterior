<div class="content-wrapper">

    <section class="content-header">
    <h1>
        Setting
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Setting</a></li>
    </ol>
    </section>

    <section class="content">
    <div class="row">
     	<div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#pi" data-toggle="tab">Personal Information</a></li>
              <li><a href="#contacts" data-toggle="tab">Contacts</a></li>
              <li><a href="#privacy" data-toggle="tab">Password</a></li>
            </ul>

            <div class="tab-content">
                <!-- /.tab-pane pi-->
              <div class="active tab-pane" id="pi">
                <form class="form-horizontal" method="post"  enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                      <div class="col-sm-6">
                        <input type="email" class="form-control" disabled="disabled" id="inputEmail" placeholder="Email" value="<?php echo $res['user_email']; ?>" name="mail">

                         <input type="hidden" placeholder="Email" value="<?php echo $res['user_email']; ?>" name="email">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputNama" class="col-sm-2 control-label">Name</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="inputNama" placeholder="Nama" value="<?php echo $res['user_real_name']; ?>" name="nama">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputNama" class="col-sm-2 control-label">Username</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="inputUsername" placeholder="Username" value="<?php echo $res['user_name']; ?>" name="username">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputNama" class="col-sm-2 control-label">Contact</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="inputTelepon" placeholder="No. Telepon" value="<?php echo $res['user_tel']; ?>" name="telepon">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputFile" class="col-sm-2 control-label">Logo</label>
                      <div class="col-sm-6">
                        <input type="file" name="gambar1">
                        <input type="hidden" name="gambar2" value="<?php echo $res['user_logo']; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputDeskripsi" class="col-sm-2 control-label">Description</label>

                      <div class="col-sm-6">
                        <textarea class="form-control" id="inputDeskripsi" placeholder="Deskripsi" name="deskripsi"><?php echo$res['user_desc']?></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="box-footer">
                    <input type="reset" class="btn btn-default" value="Cancel" name="reset">
                    <input type="submit" class="btn btn-warning pull-right" value="Save" name="submit1">
                  </div>
                </div>
                </form>

              </div>
                  <?php
                    if (isset($_POST['submit1'])) {
                      $mail = $_POST['email'];
                      $nama = $_POST['nama'];
                      $telp = $_POST['telepon'];
                      $user = $_POST['username'];
                      $desc = $_POST['deskripsi'];
                      $gambar2 = $_POST['gambar2'];

                      $logo        = $_FILES['gambar1']['name'];
                      $temp        = $_FILES['gambar1']['tmp_name'];
                      $tipe_file   = $_FILES['gambar1']['type'];

                      if ($logo == NULL or $logo == '') {
                        // echo "TIDAK ADA GAMBAR";
                        $nama_file = $_POST['gambar2'];
                      }else{
                        // echo "ADA GAMBARNYA" . $logo;
                        $nama_file = $logo;
                        unlink("../images/user/$gambar2");
                      }
                      $path = "../images/user/$nama_file";
                      // echo $path;
                      //move_uploaded_file($tmp_file,$path);
                      move_uploaded_file($temp,$path);


                      $q = "UPDATE user SET user_name='$user', user_real_name='$nama', user_tel = '$telp', user_desc = '$desc', user_logo = '$nama_file' WHERE user_email = '$mail'";

                      $query = mysql_query($q);
                      if ($query) {
                        echo "<script type='text/javascript'>alert('UPDATE SAVED'); </script>";
                        echo "<meta http-equiv=refresh content=\"0; URL=index.php?page=pi\">";
                      }
                    } 
                ?>
              <div class="tab-pane" id="contacts">
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>Contact</th>
                        <th>URL</th>
                        <th></th>
                      </tr>
                      <?php
                        $kontak = mysql_query("SELECT * FROM contact WHERE user_email = '$mail'");
                        $i = 0;
                        while ($row = mysql_fetch_array($kontak)) {
                          $user_con = $row['user_contact'];
                          $url = $row['user_contact_url'];
                          echo "
                          <tr>
                            <td>$user_con</td>
                            <td><a href='".$row['user_contact_url']."'>$url</a></td>
                            <td><a href='delete_con.php?a=$user_con&&b=$url'><i class='fa fa-fw fa-trash'></i>delete</a></td>
                          </tr>
                          ";
                        }
                      ?>
                    </table>
                  </div>
                
                  <form method="post">
                    <a href="javascript: addCon();"> Add New Contact </a>
                    <div class="row" id="idNew">                   </div>
                    <div class="box-footer">
                      <input type="reset" class="btn btn-default" value="Cancel" name="cancel">
                      <input type="submit" class="btn btn-warning pull-right" value="Save" name="submit2">
                    </div>
                  </form>
                  <?php
                    if (isset($_POST['submit2'])) {
                      $data = $_POST['media'];
                        foreach ($data as $key => $value) {
                          $media = $_POST['media'][$key];
                          $url = $_POST['url'][$key];

                          $que = mysql_query("INSERT INTO contact VALUES ('$mail','$media','$url')");
                          // echo "isok";
                        }

                        if ($que) {
                          echo "<script type='text/javascript'>alert('UPDATE SAVED');</script>";
                          //echo "<meta http-equiv=refresh content=\"0; URL=index.php?page=pi\">";
                        }
                    }
                  ?>
                </div>
              </div>
                <!-- /.tab-pane privacy-->
              <div class="tab-pane" id="privacy">
                <div class="box-body">
                <label>Change Password</label>
                <form method="post">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="password" class="form-control" name="oldpass" placeholder="Old Password">
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="password" class="form-control" name="newpass" placeholder="New Password">
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="password" class="form-control" name="repass" placeholder="Re-Password">
                      </div>
                    </div>
                  </div>
                  </div>

                  <div class="box-footer">
                    <input type="reset" class="btn btn-default" value="Cancel" name="cancel">
                    <input type="submit" class="btn btn-warning pull-right" value="Save" name="submit3">
                  </div>
                </form>
                <?php
                    if (isset($_POST['submit3'])) {
                      $oldpass = $_POST['oldpass'];
                      $newpass = $_POST['newpass']; 
                      
                      if ($res['user_pass'] != $oldpass) {
                        echo "<script type='text/javascript'>alert('OLD PASSWORD DOESNT MATCH');</script>";
                      }else {
                        $query = mysql_query("UPDATE user SET user_pass = '$newpass' WHERE user_email = '$mail'");
                        // echo $query;
                        if ($query) {
                          echo "<script type='text/javascript'>alert('UPDATE SAVED');</script>";
                          echo "<script type='text/javascript'>document.location.href=index.php?page=pi;</script>";
                        }
                      }
                    }
                  ?>
                </div>
              </div>
          </div>
        </div>
      </div>    
    </div>
    </section>
</div>

<script>
$(document).ready(function() {
    $(':input[name="upfile"]').prop('disabled', true);
    $('input[name="upsub"]').click(function() {
      $(':input[name="upfile"]').prop('disabled', false);
    });
 });
</script>

