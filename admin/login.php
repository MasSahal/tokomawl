<?php
session_start(); 
//skrip koneksi
$koneksi = new mysqli("localhost","root","","toko");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
  <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <title>Login</title>
</head>
<div class="container">
  <div class="row text-center">
    <div class="col-md-12">
      <br><br>
      <h2>MAWL SHOP : Login</h2>
      <h5>(login yourself to get access)</h5>
      
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>  Enter Details To Login</strong>
        </div>
        <div class="panel-body">
          <form role="form" method="post">
            <br>
            <div class="form-group input-group">
              <span class="input-group-addon">
                <i class="fa fa-user ml-2"></i>
              </span>
              <input type="text" class="form-control" name="user" placeholder="Username">
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">
                <i class="fa fa-lock ml-2"></i>
              </span>
              <input type="password" class="form-control" name="pass" placeholder="Password">
            </div>
            <div class="form-group">
              <label class="checkbox-inline">
                <input type="checkbox" name="">Remember Me
              </label>
              <span class="pull-right">
                <a href="#">Forget password ? </a>
              </span>
            </div>
              <button class="btn btn-primary" name="login">Login</button>
            <hr>
            Not register ? <a href="#">Click Here </a>
          </form>
          <?php 
            if (isset($_POST['login'])) 
            {
              $ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]' AND 
                password ='$_POST[pass]'");
              $yangcocok = $ambil->num_rows;
              if ($yangcocok==1) 
              {
                $_SESSION['admin']=$ambil->fetch_assoc();
                echo "<div class='alert alert-info'>Login Sukses</div>";
                echo "<meta http-equiv='refresh' content='1;url=index.php'>";
              }
              else
              {
                echo "<div class='alert alert-danger'>Login Gagal</div>";
                echo "<meta http-equiv='refresh' content='1;url=login.php'>";
              }
            }
           ?>
        </div>
      </div>
    </div>
  </div>
</div>


  <center class="bg-dark text-light">
      <small>
      <a href="https://www.facebook.com/nashiruddin.sahal" class="mx-2" target="_blank"><i class="fa fa-facebook-square text-light"></i> Kyzaky </a>
      <a href="https://www.instagram.com/abu_sahl7/" class="mx-2" target="_blank"><i class="fa fa-instagram text-light"></i> Kyzaky_SE </a><br>
        </small>
      <small>Copyright &copy; Maulana</small>
   </center>
</body>
</html>
