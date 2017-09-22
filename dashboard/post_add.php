<?php
  if ($_SESSION['user']  == 'free') {
  
    $q = "SELECT COUNT(*) AS total FROM post WHERE user_email = '$mail'";
    $res = mysql_query($q);
    $data = mysql_fetch_array($res);

    if ($data['total'] >= 10) {
      echo "<script type='text/javascript'>document.location = 'index.php?page=post_add_alert';</script>";
    }

  }
  $q = mysql_query("SELECT count(*) AS tot FROM tag WHERE user_email = '$mail'");
  $asd = mysql_fetch_array($q);
  // echo "asdasd > ".$asd['tot'];
  if($asd['tot'] < 1){
    echo "<script type='text/javascript'>alert('ADD CATEGORY FIRST!'); document.location = 'index.php?page=category_list';</script>";
  }
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

<form class="form-horizontal" method="post" action="">
  <section class="content">
    <div class="box box-warning">
      <div class="row">
        <div class="col-md-12">
          <div class="box-header with-border">
            <h3 class="box-title">Add Post</h3>
          </div>
        </div>
     
        <div class="col-md-8">
            <div class="box-body">
              
              <div class="form-group">
                <label for="inputTitle" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Title">
                </div>
              </div>
              
              <div class="form-group">
                <label for="inputLink" class="col-sm-2 col-xs-2 control-label">Image Link</label>
                <div class="input-group input-group-sm col-sm-10" style="padding: 0px 13px 0 13px;">
                    <input type="text" class="form-control" id="imagename" name="iurl" placeholder="Image URL">
                        <span class="input-group-btn">
                          <input type="button" class="btn btn-info btn-flat" onclick="document.getElementById('image-placeholder').src = document.getElementById('imagename').value; document.getElementById('image-placeholder').alt = document.getElementById('imagename').value" value="GO!">
                        </span>
                  
                </div>
              </div>

              <div class="form-group">
                <label for="inputCaption" class="col-sm-2 control-label">Caption</label>
                <div class="col-sm-10">
                  <textarea type="text" class="form-control" id="inputCaption" name="caption" placeholder="Caption"></textarea>
                </div>
              </div>
              
              <div class="">
                <div class="form-group">
                    <label for="inputSelect" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" multiple="multiple" data-placeholder="Select Category" style="width: 100%;" name="category[]">
                      <option value="NULL" hidden checked></option>
                      <?php
                        $sel = mysql_query("SELECT * FROM tag WHERE user_email = '$mail'");
                        while ($row = mysql_fetch_array($sel)) {
                          echo "<option value=".$row['tag_id'].">".$row['image_tag']."</option>";
                        }
                      ?>
                     </select>
                   </div>
                </div>
              </div>

              <div class="form-group">
                <label for="inputLink" class="col-sm-2 col-xs-2 control-label">Save as</label>
                <div class="col-sm-10">
                      <select class="form-control" name="saves">
                        <option>Draft</option>
                        <option>Published</option>
                     </select>
                   </div>

                  </span>
              </div>

            </div>
        </div>

        <div>
          <div class="col-md-4 col-sm-4 col-xs-4">
            <div class="form-group">
              <label>Image Preview</label>
              
              <img class="col-md-11 img-responsive" id="image-placeholder" src="" style="object-fit: cover" alt=""/>
            </div>
          </div>
        </div>
        <div class="">
          <div class="col-md-12">
            <div class="box-footer">
              <input type="submit" name="cancel" class="btn btn-default" value="Cancel">
              <input type="submit" name="submit" class="btn btn-warning pull-right" value="Submit">
            </div>
          </div> 
        </div>
      </div>
    </div>     
  </section>
</form>
  <section class="content">
  </section>
</div>

<?php
  if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $caption = stripcslashes($_POST['caption']);
    $link = $_POST['iurl'];
    $cat = $_POST['category'];
    $save = strtolower($_POST['saves']);

    $qq = "INSERT INTO post VALUES ('','$mail','$link','$title','$caption','$save')";
    $row = mysql_query($qq);
    echo $qq;
    if ($row) {
      $q1 = "SELECT * FROM post WHERE user_email = '$mail' AND image_title = '$title' AND image_description = '$caption'";
      echo $q1;
      $que = mysql_fetch_array(mysql_query($q1));
      foreach ($cat as $key => $value) {
        $c = $_POST['category'][$key];
        echo $c;
        $sel = "SELECT * FROM tag WHERE user_email = '$mail' AND tag_id = '$c'";
        echo $sel;
        $rem = mysql_fetch_array(mysql_query($sel));
        $q = "INSERT INTO post_tag VALUES ('".$que['post_id']."','".$rem['tag_id']."')";
        echo $q;
        $result = mysql_query($q);
      }
      if ($result) {
        echo "<script type='text/javascript'>alert('POST ADDED'); document.location = 'index.php?page=post_list';</script>";
        //header("Location: index.php?page=post_add");
      }
    }else{
      echo "<script type='text/javascript'>alert('FAILED TO ADD'); document.location = 'index.php?page=post_list';</script>";
       //   header("Location: index.php?page=post_add");
    }
  }
?>     