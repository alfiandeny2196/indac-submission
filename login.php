<?php
if (isset($_GET['resp'])) {
    if ($_GET['resp'] == 0){
        $resp = "LOGIN GAGAL, Username Tidak Ditemukan!";
    } else {
        $resp = "LOGIN GAGAL, Password salah!";
    }
} else {
    $resp = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Indaco Submission</title>
  <link rel="icon" type="image/x-icon" href="image/logo_green.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body">
    <div class="login-logo">
        <img src="image/ic.png" width="90%">
    </div>
      <form action="login_act.php" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-8">
          </div>
          <div class="col-4">
            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block">Log In &nbsp; <i class="fas fa-sign-in-alt"></i></button>
          </div>
        </div>
      </form>
      <br>
      <p align="center" style="color: red;"><b><?php echo $resp; ?></b></p>
      <p align="center">&copy;<b>INDACO</b> Submission</p>
    </div>
  </div>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
