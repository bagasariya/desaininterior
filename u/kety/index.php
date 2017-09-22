<?php
  require_once "../../conn/connection.php";
   
  $url = dirname(__FILE__);
  $arr = explode("\\", $url);
  $m = $arr[5];

  $jumlahBarisPertabel=6;
  $halamanke=1;

  if (isset($_GET['halamanke'])) {
    $halamanke = $_GET['halamanke'];
  }else{
    $halamanke = 1;
  }
  $barispertama = ($halamanke-1)*$jumlahBarisPertabel;

  if (isset($_GET['category'])) {
    $cat = $_GET['category']; 
    $qn = "SELECT * FROM view_post_tag WHERE p_user = '$m' AND p_status='published' AND tag_id = '$cat'";
    $resn = mysql_query($qn);

    $q = "SELECT * FROM view_post_tag WHERE p_user = '$m' AND p_status='published' AND tag_id = '$cat' LIMIT $barispertama, $jumlahBarisPertabel";
    // echo $q;
    $res = mysql_query($q);

    $q2 = "SELECT * FROM view_post_tag WHERE p_user = '$m' AND p_status='published' AND tag_id = '$cat' LIMIT $barispertama, $jumlahBarisPertabel";
    $res2 = mysql_query($q2);

    $q3 = "SELECT * FROM view_post_tag WHERE p_user = '$m' AND p_status='published' AND tag_id = '$cat' LIMIT $barispertama, $jumlahBarisPertabel";
    $res3 = mysql_query($q3);
  } else {
    $qn = "SELECT * FROM view_post WHERE p_user = '$m' AND p_status='published'";
    $resn = mysql_query($qn);

    $q = "SELECT * FROM view_post WHERE p_user = '$m' AND p_status='published' LIMIT $barispertama, $jumlahBarisPertabel";
    $res = mysql_query($q);

    $q2 = "SELECT * FROM view_post WHERE p_user = '$m' AND p_status='published' LIMIT $barispertama, $jumlahBarisPertabel";
    $res2 = mysql_query($q2);

    $q3 = "SELECT * FROM view_post WHERE p_user = '$m' AND p_status='published' LIMIT $barispertama, $jumlahBarisPertabel";
    $res3 = mysql_query($q3);
  }
  

  $q_user = "SELECT * FROM user WHERE user_name = '$m'";
  // echo $q_user;
  $r_user = mysql_query($q_user);
  $d_user = mysql_fetch_array($r_user);

  $q_contact = "SELECT * FROM view_contact WHERE user_name = '$m'";
  $r_contact = mysql_query($q_contact);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="imagetoolbar" content="no" />
    <title>Portarto</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script>
        !window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
    </script>
    <script type="text/javascript" src="../../fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="../../fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="../../fancybox/jquery.fancybox-1.3.4.css" media="screen" />

    <link rel="stylesheet" href="../../css/w3.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <!-- <link rel="stylesheet" href="../../css/bootstrap.css"> --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script type="text/javascript">
        $(document).ready(function() {
            /*
            *   Examples - images
            */

            $("a#example1").fancybox();

            $("a#example2").fancybox({
                'overlayShow'   : false,
                'transitionIn'  : 'elastic',
                'transitionOut' : 'elastic'
            });

            $("a#example3").fancybox({
                'transitionIn'  : 'none',
                'transitionOut' : 'none'    
            });

            $("a#example4").fancybox({
                'opacity'       : true,
                'overlayShow'   : false,
                'transitionIn'  : 'elastic',
                'transitionOut' : 'none'
            });

            $("a#example5").fancybox();

            $("a#example6").fancybox({
                'titlePosition'     : 'outside',
                'overlayColor'      : '#000',
                'overlayOpacity'    : 0.9
            });

            $("a#example7").fancybox({
                'titlePosition' : 'inside'
            });

            $("a#example8").fancybox({
                'titlePosition' : 'over'
            });

            $("a[rel=example_group]").fancybox({
                'transitionIn'      : 'none',
                'transitionOut'     : 'none',
                'titlePosition'     : 'over',
                'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
                    return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
                }
            });

            /*
            *   Examples - various
            */

            $("#various1").fancybox({
                'titlePosition'     : 'inside',
                'transitionIn'      : 'none',
                'transitionOut'     : 'none'
            });

            $("#various2").fancybox();

            $("#various3").fancybox({
                'width'             : '75%',
                'height'            : '75%',
                'autoScale'         : false,
                'transitionIn'      : 'none',
                'transitionOut'     : 'none',
                'type'              : 'iframe'
            });

            $("#various4").fancybox({
                'padding'           : 0,
                'autoScale'         : false,
                'transitionIn'      : 'none',
                'transitionOut'     : 'none'
            });
        });
    </script>
    <style>
        body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
        body {font-size:16px;}
        .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
        .w3-half img:hover{opacity:1}

        #content {
            width: 700px;
            margin: 40px auto 0 auto;
            padding: 0 60px 30px 60px;
            border: solid 1px #cbcbcb;
            background: #fafafa;
            -moz-box-shadow: 0px 0px 10px #cbcbcb;
            -webkit-box-shadow: 0px 0px 10px #cbcbcb;
        }

        .dropdown-menu {
            min-width: 200px;
          }

          .dropdown-menu.columns-2 {
            min-width: 400px;
          }
          .dropdown-menu.columns-3 {
            min-width: 600px;
          }
          .dropdown-menu li a {
            padding: 5px 15px;
            font-weight: 300;
          }
          .multi-column-dropdown {
            list-style: none;
          }
          .multi-column-dropdown li a {
            display: block;
            clear: both;
            line-height: 1.428571429;
            color: #333;
            white-space: normal;
          }
          .multi-column-dropdown li a:hover {
            text-decoration: none;
            color: #262626;
            background-color: #f5f5f5;
          }

        .fa {
          padding: 5px;
          font-size: 7px;
          width: 20px;
          text-align: center;
          text-decoration: none;
          margin: 5px 2px;
          text-align: center;
          border-radius: 50%;
        }

        .fa:hover {
            opacity: 0.7;
        }

        .fa-facebook {
          background: #3B5998;
          color: white;
        }

        .fa-instagram {
          background: #125688;
          color: white;
        }

        .fa-twitter {
          background: #55ACEE;
          color: white;
        }

        .fa-youtube {
          background: #bb0000;
          color: white;
        }

        .fa-envelope-o {
          background: #a4c639;
          color: white;
        }


          @media (max-width: 767px) {
            .dropdown-menu.multi-column {
              min-width: 240px !important;
              overflow-x: hidden;
            }
          }
          
          @media (max-width: 480px) {
            .content {
              width: 90%;
              margin: 50px auto;
              padding: 10px;
            }
          }
    </style>
</head>
<body>
<nav class="w3-sidebar w3-blue-grey w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:250px" id="mySidebar"><br>
  <div class="w3-display-container">
    <center><img src="../../images/user/<?php echo $d_user['user_logo']; ?>" class="w3-circle"style="max-width:150px; min-height:150px;"></center>
    <center><h3 class="w3-padding-0"><b><?php echo $d_user['user_real_name']; ?></b></h3></center>

    <div class="w3-container">
      <p style="padding-left: 5px;font-size: 12px; text-align: justify;"><?php echo $d_user['user_desc']; ?></p>

      <p style="padding-left: 5px;font-size: 12px; text-align: justify;">Telephone: <?php echo $d_user['user_tel']; ?></p>

      <div class="w3-bottomcenter">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php
          while ($d_con = mysql_fetch_array($r_contact)) {
            if ($d_con['user_contact'] == 'Instagram') {
              echo "<a target='_blank' href='" . $d_con['user_contact_url'] ."' class='fa fa-instagram'></a>";
            } else if ($d_con['user_contact'] == 'Youtube') {
              echo "<a target='_blank' href='" . $d_con['user_contact_url'] ."' class='fa fa-youtube'></a>";
            } else if ($d_con['user_contact'] == 'Facebook') {
              echo "<a target='_blank' href='" . $d_con['user_contact_url'] ."' class='fa fa-facebook'></a>";
            } else {
              echo "<a target='_blank' href='" . $d_con['user_contact_url'] ."' class='fa fa-twitter'></a>";
            }
          }
        ?>
        <a href="mailto:<?php echo $d_user['user_email'];?>" class="fa fa-envelope-o"></a>
      </div>
    </div>
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-blue-grey w3-large">
  <div class="w3-bar-item w3-padding-24 w3-wide">Portarto</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main" style="margin-left:250px">
     <!-- Push down content on small screens -->
    <div class="w3-hide-large" style="margin-top:83px"></div>

    <!-- Header -->
    <header>
    <div class="w3-bar w3-light-grey">
      <div style="margin-left:5%;">
      <a href="index.php?halaman=1" class="w3-bar-item w3-button">Home</a>
      <div class="w3-dropdown-click">
        <button class="w3-button" onclick="myFunction()">Dropdown</button>
        <div id="Demo" class="w3-dropdown-content w3-bar-block w3-card-4" style="z-index:100;">
          <?php
            $cat = "SELECT * FROM view_tag_user WHERE user_name = '$m'";
            $c_res = mysql_query($cat);
            while ($c_data = mysql_fetch_array($c_res)) {
              echo "<a href='index.php?category=" . $c_data['tag_id'] . "&halaman=1' class='w3-bar-item w3-button'>" . $c_data['image_tag']. "</a>";
            }
          ?>
        </div>
      </div>
      </div>
    </div>
    </header>

    <div class="w3-row-padding w3-row w3-grayscale-min" style="margin-left: 40px">
        <div class="w3-half">
        <?php
            while ($data = mysql_fetch_array($res)) {
              if ($data['p_id'] % 2 == 1) {
                echo "<a target= '_blank' href='" . $data['image_url'] . "' title='" . $data['p_desc'] . "'>";
                echo "<a rel='example_group' href='" . $data['image_url'] . "' title='" . $data['p_desc'] . "'><img alt='' style='width:100%' src='" .$data['image_url'] . "' /></a>";
                echo "</a>";
              }
            }
        ?>
        </div>
        <div class="w3-half">
        <?php
            while ($data2 = mysql_fetch_array($res2)) {
              if ($data2['p_id'] % 2 == 0) {
                echo "<a target= '_blank' href='" . $data2['image_url'] . "' title='" . $data2['p_desc'] . "'>";
                echo "<a rel='example_group' href='" . $data2['image_url'] . "' title='" . $data2['p_desc'] . "'><img alt='' style='width:100%' src='" .$data2['image_url'] . "' /></a>";
                echo "</a>";
              }
            }
        ?>
        </div>
    </div>
    <div class="w3-bar w3-large">
    <center>
        <!-- <li><a href="#">&laquo;</a></li> -->
        <?php
          if (isset($_GET['category'])) {
            $cat = $_GET['category'];
            $num_rows = mysql_num_rows($resn);
            $z = ceil($num_rows/$jumlahBarisPertabel);
            for ($x=1; $x<=$z; $x++) { 
              echo "<a href='index.php?category=$cat&halamanke=".$x."' class='w3-button w3-orange'>".$x."</a></li>";
            }
          }else{
            $num_rows = mysql_num_rows($resn);
            $z = ceil($num_rows/$jumlahBarisPertabel);
            for ($x=1; $x<=$z; $x++) { 
              echo "<a href='index.php?halamanke=".$x."' class='w3-button w3-orange'>".$x."</a></li>";
            }
          }
          
        ?>
        <!-- <li><a href="#">&raquo;</a></li> -->
    </center>
  </div>
</div>
<footer class="w3-light-grey w3-container" style="margin-top:75px;padding-right:58px"><p class="w3-right">Copyright &copy; All Reserverd</p></div>
>
  
</footer>
<script>
function myFunction() {
    var x = document.getElementById("Demo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
</body>
</html>