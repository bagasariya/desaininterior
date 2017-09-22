<?php
  error_reporting(0);
  require_once "functions.php";
  include 'conn/connection.php';
  include 'PHPMailer/PHPMailerAutoLoad.php';
  session_start();
  if ($_SESSION['logged_in'] != null) {
    header("location: dashboard/");
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Desain Interior</title>
<!-- <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'> -->
<!-- <link href="http://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css" rel="stylesheet" type="text/css"> -->
<link href="dist/mdl.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/material.cyan-light_blue.min.css">
<link rel="stylesheet" href="css/material.css">
<link rel="stylesheet" href="css/styles.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>  -->
<script src="dist/mdl-min.js"></script>
<style>
.btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #5D9CEC;
  border-bottom: 3px solid #4A89DC;
  border-radius: 5px;
  color: #fff;
  cursor: pointer;
  margin:30px 10px;
}
</style>
<script>
  function validate(){

    var a = document.getElementById("password").value;
    var b = document.getElementById("confirm_password").value;
    if (a!=b) {
      alert("Passwords do not match");
      return false;
    }
  }

</script>
</head>
<body class="bg">
  <!-- <img src="images/bg.png" class="bg"> -->
  <div align="center">
  <form method="post" action="">
    <div id="kotak" style="border: 1px solid orange; margin-top: 5%;">
      <div class="mdl-container">
          <img src="images/logo.png" style="width:50%; margin-top: 10px">
        <div><br/>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-upgraded">
          <input class="mdl-textfield__input" type="email" id="email" placeholder="Email" name="email" required>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-upgraded">
          <input class="mdl-textfield__input" type="text" id="nama" placeholder="Full Name" name="nama" required>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-upgraded">
          <input class="mdl-textfield__input" type="text" id="username" placeholder="Username" name="username" required pattern="[a-zA-Z]*">
        </div>
        <div class="mdl-textfield">
          <input class="mdl-textfield__input" type="password" id="password" placeholder="Password" name="password" required pattern="[a-zA-Z0-9]{8,}" value="">
        </div>
        <div class="mdl-textfield">
          <input class="mdl-textfield__input" type="password" id="confirm_password" placeholder="Re-Password" name="confirm_password" required onchange="validate()" value="">
        </div>
        <div> 
        <!-- Accent-colored raised button -->
          <input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" name="submit1" value="create">
        </div>
        </div>
      </div>
    </div>
  </form>

      <?php
        if(isset($_POST['submit1'])){
          $email = $_POST['email'];
          $nama = $_POST['nama'];
          $username = $_POST['username'];
          $pass = $_POST['password'];
          $rpass = $_POST['confirm_password'];

          $sql1 = "SELECT * FROM user WHERE user_email = '$email'";
          $res1 = mysql_query($sql1);
          if(mysql_num_rows($res1) == 0){
            $queryy = mysql_query("INSERT INTO user VALUES ('$email','$pass','$username','$nama','icon.png',null,0,null,null,'free')");

            $enkrip = base64_encode($email);
            // echo $enkrip;
            if (!empty($queryy)) {
              $link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."activation.php?id=".$enkrip."";
                // echo "querynya jalan apa enggak yaaaa";
              $mail = new PHPMailer;
             
              $mail->IsSMTP(); // telling the class to use SMTP
              $mail->SMTPAuth = true;
              $mail->SMTPSecure = "tsl";
            //   $mail->Host = "ssl://smtp.gmail.com";
              $mail->Host = "tls://74.125.200.109";
              $mail->Port = 587;
              
              $mail->Username = "portartoid@gmail.com"; //buat login ke akun gmail
              $mail->Password = "emailportarto1234"; //password buat login e akun gmail
              // $mail->SMTPDebug = 2;
              $mail->setFrom('portartoid@gmail.com', 'noreply'); // email yg mau ngirim
              $mail->addAddress($_POST['email']); // diirim ke siapa
              $mail->Subject = 'AP Email Confirmation'; // subject email
              $mail->isHTML(true);
              //isi email
              $mail->Body = "<b>Your Confirmation Link </b> <br> Click on this link to activate your account <br> You can not login to your new account until you have confirmed your activation <br><br> <a href=".$link.">".$link."</a>";

            //   echo "sampe sini jalan?";
              if(!$mail->send()) {
                echo "<script type='text/javascript'>alert('REGISTER UNSUCCESSFUL');</script>";
                //echo $mail->ErrorInfo;
              } else {

                mkdir(dirname(__FILE__)."/u/"."$username"); // Create Directory
                
                $sc = 'sc/index.php'; 
                $dt = 'u/'.$username.'/index.php';
                echo "<a href=$sc>sc</a><br>";
                echo "<a href=$dt>dt</a>";
               
                copy($sc, $dt);

                //recurse_copy($SourceDir,$username); // Copy files from source directory to target directory

               echo "<script type='text/javascript'>alert('REGISTER SUCCESSFUL, LINK ACTIVATION HAS SENT TO YOUR EMAIL');</script>";
            //   echo "terus ini jalan apa enggak?";


              }
            } else {
              echo "<script type='text/javascript'>alert('Terjadi error pada pendaftaran');</script>";
            }
          }else{
            echo "<script type='text/javascript'>alert('EMAIL HAVE BEEN USED');</script>";
          }
        }
      ?>
    </div>
  </div>
</div>
</center>
<script>
  $('#btn-1').mdl({
    type: 'modal',
    fullscreen:false,
    overlayClick:true
  });
  </script>
  </div>
</body> 
</html>
