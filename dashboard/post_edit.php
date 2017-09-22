<?php
  $id = $_GET['id'];
  $select = mysql_query("SELECT * FROM post WHERE post_id = '$id'");
  $res = mysql_fetch_array($select);

  $link = "index.php?page=post_delete&id=$id";
  $stat = $res['status'];

?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Post
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-cloud-upload"></i> Post</a></li>
      <li class="active">Edit Post</li>
    </ol>
  </section>

<form class="form-horizontal" method="post" action="">
  <section class="content">
    <div class="box box-warning">
      <div class="row">
        <div class="col-md-12">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Post</h3>
          </div>
        </div>
     
        <div class="col-md-8">
            <div class="box-body">
              
              <div class="form-group">
                <label for="inputTitle" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Title" value="<?php echo $res['image_title']; ?>">
                </div>
              </div>
              
              <div class="form-group">
                <label for="inputLink" class="col-sm-2 col-xs-2 control-label">Image Link</label>
                <div class="input-group input-group-sm col-sm-10" style="padding: 0px 13px 0 13px;">
                    <input type="text" class="form-control" id="imagename" name="iurl" placeholder="Image URL" value="<?php echo $res['image_url']; ?>">
                        <span class="input-group-btn">
                          <input type="button" class="btn btn-info btn-flat" onclick="document.getElementById('image-placeholder').src = document.getElementById('imagename').value; document.getElementById('image-placeholder').alt = document.getElementById('imagename').value" value="GO!">
                        </span>
                  
                </div>
              </div>

              <div class="form-group">
                <label for="inputCaption" class="col-sm-2 control-label">Caption</label>
                <div class="col-sm-10">
                  <textarea type="text" class="form-control" id="inputCaption" name="caption"6><?php echo $res['image_description']; ?></textarea>
                </div>
              </div>
              
              <div class="">
                <div class="form-group">
                    <label for="inputSelect" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">
                      <?php
                        $h = "SELECT * from view_posttag_tag where post_id = '$id'";
                        $show = mysql_query($h);
                        while ($row = mysql_fetch_array($show)) {
                          $idt = $row['tag_id'];
                          $it = $row['image_tag'];
                          echo $it . "<a href='delete_cat.php?idp=$id&idt=$idt'> delete</a><br/>";
                        }

                      ?>
                      <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" name="category[]">
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
                        <?php
                          if ($stat == 'draft') {
                            echo "
                            <option>Draft</option>
                            <option>Published</option>";
                          } else {
                            echo "
                            <option>Published</option>
                            <option>Draft</option>";
                          }

                        ?>
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
              
              <img class="col-md-11 img-responsive" id="image-placeholder" src="<?php echo $res['image_url']; ?>" style="object-fit: cover" alt=""/>
            </div>
          </div>
        </div>
        <div class="">
          <div class="col-md-12">
            <div class="box-footer">
              <input type="submit" name="cancel" class="btn btn-default" value="Cancel">
              <a href="<?php echo $link;?>" class="btn btn-warning" onclick="return confirm('Are you sure want to delete?');">Delete</a>
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

    $qq = "UPDATE post SET image_url='$link', image_title='$title', image_description = '$caption', status = '$save' WHERE post_id = '$id'";
    $res = mysql_query($qq);
    echo $qq;
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
    if ($res) {
      // echo "<script type='text/javascript'>alert('POST EDITED'); document.location = 'index.php?page=post_list';</script>";
    }else{
      echo "<script type='text/javascript'>alert('FAILED TO EDIT');</script>";
    }
  }
?> 
