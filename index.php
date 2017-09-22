<?php
  error_reporting(0);
  require_once "functions.php";
  include "conn/connection.php";
  //pilih user secara random untuk ditampilkan pada halaman home
  $query = "SELECT * FROM view_user_post WHERE status='published' ORDER BY rand() LIMIT 4";
  // echo $query;
  session_start();

  if (isset($_POST['submit123'])) {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $sql = "SELECT * FROM user WHERE user_email = '$email' AND user_pass='$password' AND user_status ='1'";
    $res = mysql_query($sql);
    $a = mysql_fetch_array($res);
    if(mysql_num_rows($res) != 0) {
      $_SESSION['logged_in'] = $email;
      $_SESSION['user'] = $a['user_type'];
      login_validate();
      echo "<script type='text/javascript'>document.location = 'dashboard/'</script>";    
    } else {
      echo "<script type='text/javascript'>alert('Username atau Password Salah');</script>";
    }
  }
?>
<!DOCTYPE html>
<html>     
<title>Portarto</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-orange.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<!-- <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css"> -->
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
</style>
<body>
<!-- Top menu -->
<div class="w3-top">
  <div class="w3-bar w3-theme-d2 w3-left-align">
      <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
      <a href="dashboard/" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Portofolio</a>
      <a href="#about" class="w3-bar-item w3-button w3-hide-small w3-hover-white">About Us</a>
      <a href="#service" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Service</a>
      <a href="#contackt" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Contact</a>
      <?php
        if($_SESSION['logged_in'] == null){
          echo "
            <div class='w3-dropdown-click w3-right w3-hover-white'>
              <button class='w3-button w3-hover-white' onclick='myFunction()'>Login</button>
              <div id='Demo' class='w3-dropdown-content w3-border' style='right:0; min-width:300px; margin-top: 1px;'>
                <form class='w3-container' method='post' style='margin-top: 13px;'>
                  <label class='w3-text-teal'>First Name</label>
                  <input class='w3-input w3-border w3-light-grey' type='email' name='email' required>
                   <br>
                  <label class='w3-text-teal'>Last Name</label>
                  <input class='w3-input w3-border w3-light-grey' type='password' name='password' required pattern='[a-zA-Z0-9]{8,}' id='password'>
                  <br>
                  <input type='submit' class='w3-btn w3-blue-grey' value='Submit' name='submit123'>
                  <br>
                  <p>Belum punya Akun? <a href='signup.php' id='btn-1'>Sign Up</a></p>
                </form> 
              </div>
            </div>
          ";
          
        }else{
          echo "
          <div class='w3-dropdown-click w3-right w3-hover-white'>
              <button class='w3-button w3-hover-white' onclick='myFunction()'>Setting</button>
              <div id='Demo' class='w3-dropdown-content w3-border' style='right:0;'>
                  <a href='dashboard/' class='w3-button w3-blue-grey w3-block'>User</a>
                  <a href='logout.php' class='w3-button w3-blue-grey w3-block'>Logout</a>
              </div>
            </div>
          ";
        }
      ?>
  </div>
</div>
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">

  <!-- First Photo Grid-->
  <div class="w3-row-padding w3-padding-64 w3-center" id="porto">
    <?php
    $res = mysql_query($query);
      while ($row = mysql_fetch_array($res)){
        echo $row['image_link'];
    ?>
    
    <div class="w3-quarter">
      <img src="<?php echo $row['image_url']; ?>" alt="Sandwich" style="width:100%">
      <div class="w3-container">
        <h3><a href="/u/<?php echo $row['user_name']; ?>"> <?php echo $row['user_real_name']; ?> </a></h3>
        <p><?php echo $row['image_description']; ?></p>
      </div>
    </div>

    <?php } ?>
  </div>
  <!-- Second Photo Grid-->
  <!-- <div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="/w3images/mountains.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>Lorem Ipsum</b></p>
        <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
  </div> -->
  <hr id="about">

  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center">  
    <h3>About Us</h3><br>
    <img src="/w3images/chef.jpg" alt="Me" class="w3-image" style="display:block;margin:auto" width="800" height="533">
    <div class="w3-padding-32">
      <h4><b>I am Who I Am!</b></h4>
      <h6><i>With Passion For Real, Good Food</i></h6>
      <p>Just me, myself and I, exploring the universe of unknownment. I have a heart of love and an interest of lorem ipsum and mauris neque quam blog. I want to share my world with you. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
    </div>
  </div>
  
  <hr id="team">
  <div class="w3-container w3-padding-64 w3-center" id="team">
    <h2>OUR TEAM</h2>
    <p>Meet the team - our office rats:</p>

    <div class="w3-row"><br>

    <div class="w3-quarter">
      <img src="/w3images/avatar.jpg" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Prayoga Bagas Ariya Wibawa</h3>
      <p>Web Designer</p>
    </div>

    <div class="w3-quarter">
      <img src="/w3images/avatar.jpg" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Katya Lindi Chandrika</h3>
      <p>Support</p>
    </div>

    <div class="w3-quarter">
      <img src="/w3images/avatar.jpg" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Ni'matul Rochmaniyah</h3>
      <p>Boss man</p>
    </div>

    <div class="w3-quarter">
      <img src="/w3images/avatar.jpg" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Debby Dwi Safitri</h3>
      <p>Fixer</p>
    </div>
  <hr id="service">

  <!-- About Section -->
  <!-- div class="w3-container w3-padding-64 w3-center">  
    <h3>Service</h3><br>
    <img src="/w3images/chef.jpg" alt="Me" class="w3-image" style="display:block;margin:auto" width="800" height="533">
    <div class="w3-padding-32">
      <h4><b>I am Who I Am!</b></h4>
      <h6><i>With Passion For Real, Good Food</i></h6>
      <p>Just me, myself and I, exploring the universe of unknownment. I have a heart of love and an interest of lorem ipsum and mauris neque quam blog. I want to share my world with you. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
    </div>
  </div> -->
  <div class="w3-row-padding w3-center w3-padding-64" id="pricing">
    <h2>PRICE</h2>
    <p>Choose a pricing plan that fits your needs.</p><br>
    <div class="w3-half w3-margin-bottom">
      <ul class="w3-ul w3-border w3-hover-shadow">
        <li class="w3-theme">
          <p class="w3-xlarge">Basic / Free</p>
        </li>
        <li class="w3-padding-16"><b>10GB</b> Storage</li>
        <li class="w3-padding-16"><b>10</b> Emails</li>
        <li class="w3-padding-16"><b>10</b> Domains</li>
        <li class="w3-padding-16"><b>Endless</b> Support</li>
        <li class="w3-padding-16">
          <h2 class="w3-wide"><i class=""></i>Free</h2>
          <span class="w3-opacity">-</span>
        </li>
      </ul>
    </div>

    <div class="w3-half w3-margin-bottom">
      <ul class="w3-ul w3-border w3-hover-shadow">
        <li class="w3-theme-l2">
          <p class="w3-xlarge">Paid</p>
        </li>
        <li class="w3-padding-16"><b>25GB</b> Storage</li>
        <li class="w3-padding-16"><b>25</b> Emails</li>
        <li class="w3-padding-16"><b>25</b> Domains</li>
        <li class="w3-padding-16"><b>Endless</b> Support</li>
        <li class="w3-padding-16">
          <h2 class="w3-wide"><i class="fa fa-usd"></i> 25</h2>
          <span class="w3-opacity">per month</span>
        </li>
      </ul>
    </div>
</div>
  <hr>

  <hr id="contact">

  <div class="w3-container w3-padding-64 w3-center w3-theme-15">
    <div class="w3-col m5">
    <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Contact Us</span></div>
      <h3>Address</h3>
      <p>Jl. Kauman 17 A-B Klojen, Malang, Jawa Timur.</p>
      <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>  Malang, Jawa Timur</p>
      <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>  +00 1515151515</p>
      <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>  test@test.com</p>
    </div>
    <div class="w3-col m7">
      <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="/action_page.php" target="_blank">
      <div class="w3-section">      
        <label>Name</label>
        <input class="w3-input" type="text" name="Name" required>
      </div>
      <div class="w3-section">      
        <label>Email</label>
        <input class="w3-input" type="text" name="Email" required>
      </div>
      <div class="w3-section">      
        <label>Message</label>
        <input class="w3-input" type="text" name="Message" required>
      </div>  
      <input class="w3-check" type="checkbox" checked name="Like">
      <label>I Like it!</label>
      <button type="submit" class="w3-button w3-right w3-theme">Send</button>
      </form>
    </div>
  </div>


  
  <!-- Footer -->
  <footer class="w3-row-padding w3-padding-32">
      <p style="text-align: center;">Powereed by AP</p>
  </footer>

<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}

function myFunction() {
    var x = document.getElementById("Demo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
var input = document.getElementById("password");
input.oninvalid = function(event){
  event.target.setCustomValidity("Password minimal 8");
}
</script>
</body>
</html>
