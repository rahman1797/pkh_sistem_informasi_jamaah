<?php

//error_reporting(0);

// if ($_GET['log'] > 1) {
//   setcookie('logIdentifier', 0);
// }

include('framework/library/koneksi.php');

include('framework/functions/func_pengguna.php');

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Admin </title>

    <!-- Bootstrap -->
    <link href="assets/theme/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/theme/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/theme/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="assets/theme/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="assets/theme/build/css/custom.css" rel="stylesheet">

<!--     <link href="assets/mdb/css/mdb.min.css" rel="stylesheet"> -->

<style type="text/css">
 
  .btn {

    border-radius: 8px;

  }

</style>

  </head>

  <body class="login animated fadeInLeft">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="?action=login" method="post">
<!-- <?php echo $_COOKIE['logIdentifier']; ?> -->
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="required" id="pengguna_username" name="pengguna_username" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="required" id="pengguna_pass" name="pengguna_pass" />
              </div>
              <div>
                <input type="hidden" name="action" value="login_pengguna">
                <button id="login_pengguna" type="submit" name="login_pengguna" value="login_pengguna" class="btn btn-default submit">Log in</button>
              <!--   <a class="btn btn-default submit">Log in</a> -->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Lupa Password ?
                  <a href="#signup" class="to_register"> Klik Disini </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-dashboard"></i> Sistem Informasi Jamaah!</h1>
                  <p>©2018 All Rights Reserved. Theme by Colorlib</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Kontak Kami</h1>
              <div style="height: 50px">
                Email : Kurmamedia@gmail.com
              </div>
              <div>
                Telepon : 08128010827
              </div>
              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Sudah Ingat ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-dashboard"></i> Sistem Informasi Jamaah!</h1>
                  <p>©2018 All Rights Reserved. Theme by Colorlib</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
