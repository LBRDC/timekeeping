<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/lbrdc-logo-nobg.webp" rel="icon">
  <title>LBRDC Timekeep | Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.css" rel="stylesheet">
  <!-- sweetalert2 css -->
  <link href="vendor/sweetalert2/old/sweetalert.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-login">
  <!-- Center Wrapper -->
  <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
    <!-- Login -->
    <div class="container-login">
      <div class="row justify-content-center">
        <div>
          <div class="card shadow-sm w-100">
            <div class="card-body p-0">
              <div class="row">
                <div class="col-lg-12">
                  <div class="login-form">
                    <div class="text-center">
                      <img class="mb-4" src="img/logo/lbrdc-banner-nobg.webp" alt="banner" style="max-width: 300px;">
                      <h6 class="text-gray-900 mb-4">Biometrics and Attendance Management System</h6>
                    </div>
                    <form id="loginFrm" method="post">
                      <div class="form-group">
                        <input type="text" class="form-control" id="lgn_username" aria-describedby="usernameHelp" placeholder="Username" required>
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" id="lgn_password" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block" id="lgn_btn">Login</button>
                        <!--<a href="javascript:void(0)" class="btn btn-success btn-block">Login</a>-->
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END Login -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <!-- sweetalert2 -->
  <script src="vendor/sweetalert2/old/sweetalert.min.js"></script>
  <!-- LOGIN JS -->
  <script type="module" src="./js/functions.js"></script>
  <script type="module" src="./js/login.js"></script>

</body>

</html>