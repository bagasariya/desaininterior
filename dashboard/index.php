<?php
  error_reporting(0);
  require_once '../conn/connection.php';
  require_once "../functions.php";

  if (isset($_SESSION['logged_in'])) {
    if (!login_check()) {
      header("Location: signout.php");
      exit(0);
    }else{
      $mail = $_SESSION['logged_in'];
    }
  }else{
    header("location: ../");
  }

  // session_start();
  $page = (empty($_GET['page'])) ? "welcome" : $_GET['page'];
  // echo $page;
  $select12 = mysql_query("SELECT * FROM user WHERE user_email = '$mail'");
  $res = mysql_fetch_array($select12);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DESAIN INTERIOR</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/desaininterior/dashboard/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/desaininterior/dashboard/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/desaininterior/dashboard/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="plugins/iCheck/flat/blue.css"> -->
  <!-- Morris chart -->
  <!-- <link rel="stylesheet" href="plugins/morris/morris.css"> -->
  <!-- jvectormap -->
  <!-- <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css"> -->
  <!-- Date Picker -->
  <!-- <link rel="stylesheet" href="plugins/datepicker/datepicker3.css"> -->
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css"> -->
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/desaininterior/dashboard/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="/desaininterior/dashboard/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="/desaininterior/dashboard/plugins/select2/select2.min.css">
  <base href="/desaininterior/dashboard/">
    <!-- bootstrap wysihtml5 - text editor -->
  <!-- <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script>
    // var val= 0;

    function addCon() {
      // val++;

      var newCon = "<div class='col-md-6'><div class='form-group'><select name='media[]' class='form-control'><option name='media'>Facebook</option><option name='media'>Instagram</option><option name='media'>Twitter</option><option name='media'>Youtube</option></select></div></div><div class='col-sm-6 form-group'><input type='text' name='url[]' class='form-control' placeholder='URL' value='https://'></div>";

      $('#idNew').append(newCon);
    }
  </script>
</head>
<body class="hold-transition skin-yellow sidebar-mini ">
<div class="wrapper fixed">
  <header class="main-header">
    <!-- Logo -->
    <a href="../dashboard/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>D</b>I</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Desain</b> Interior</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
<!-- <p>HAY</p -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= ($res['user_logo'] != NULL or $res['user_logo'] != '') ? '../images/user/'.$res['user_logo'] : '../images/user/icon.png'; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs">
              <?php
                // echo "Hello ".$res['user_name'];
                echo "Hello, ".$res['user_name'];
              ?>
                </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= ($res['user_logo'] != NULL or $res['user_logo'] != '') ? '../images/user/'.$res['user_logo'] : '../images/user/icon.png'; ?>" class="img-circle" alt="User Image">
                <p>
                  <?php
                    echo $res['user_real_name'];
                  ?>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="index.php?page=pi" class="btn btn-warning btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="index.php?page=signout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="index.php?page=welcome">
            <i class="glyphicon glyphicon-home"></i>
            <span>Dashboard</span>
          </a>
        </li>

         <?php
          if($_SESSION['user'] == "moderator"){
            include "sidebar_moderator.php";
          }else{
            include "sidebar.php";
          }
         ?>
    </section>
  </aside>

  <?php
    include "$page.php";
  ?>

  <footer class="main-footer" style="height: 1%;">
    <div class="pull-right hidden-xs">
      <b>Share Your Artistic</b>
    </div>
    <strong>Copyright &copy; 2017 <a href="">Portarto</a>.</strong>
  </footer>

<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="dist/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<!-- <script src="plugins/input-mask/jquery.inputmask.js"></script> -->
<!-- <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script> -->
<!-- <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script> -->
<!-- date-range-picker -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script> -->
<!-- <script src="plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- bootstrap datepicker -->
<!-- <script src="plugins/datepicker/bootstrap-datepicker.js"></script> -->
<!-- bootstrap color picker -->
<!-- <script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script> -->
<!-- bootstrap time picker -->
<!-- <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script> -->
<!-- SlimScroll 1.3.0 -->
<!-- <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script> -->
<!-- iCheck 1.0.1 -->
<!-- <script src="plugins/iCheck/icheck.min.js"></script> -->
<!-- FastClick -->
<!-- <script src="plugins/fastclick/fastclick.js"></script> -->
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    $(".select2").select2();
  })
</script>
</body>
</html>
