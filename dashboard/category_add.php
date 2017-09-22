<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Add Category</h3>
            </div>
            <form class="form-horizontal" action="" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Category Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Ex: kitchen" name="category">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="reset" class="btn btn-default" value="Cancel" name="cancel">
                <input type="submit" class="btn btn-warning pull-right" value="Submit" name="submit">
              </div>
            </form>
            <?php
              if (isset($_POST['submit'])) {
                $cat = $_POST['category'];
                $select = mysql_num_rows(mysql_query("SELECT * FROM tag WHERE user_email='$mail' AND image_tag='$cat'"));
                if($select > 0 ){
                  // nggawe mocal a iki
                  echo "<script type='text/javascript'>alert('CATEGORY ALREADY EXISTS')</script>";
                } else {
                  $res = mysql_query("INSERT INTO tag VALUES ('','$mail','$cat')");
                  if($res) {
                    echo "<script type='text/javascript'>alert('CATEGORY ADDED'); document.location = 'index.php?page=category_list'</script>";
                    
                  } else {
                    echo "<script type='text/javascript'>alert('FAILED TO ADD');</script>"; 
                    // echo $sql;
                  }
                }
              }
            ?>
          </div>