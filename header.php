<?php

// if (isset($_GET['login'])) {
//   setcookie('logIdentifier', $_GET['login']);
// }

error_reporting(0);

include('load.php');

include('framework/functions/func_pengguna.php');

// include('framework/functions/func_tamu.php');

// SESSION_START();

// $log = $_COOKIE['logIdentifier'];
$session = $_SESSION['ID'];

if ($_SESSION['status'] != "login") {
  echo "<script>
        alert('Login Dulu doooong');
        location.replace('http://localhost/jamaahpk_db/login');
        </script>
        ";
}

function pengguna($session, $koneksi){

  $query = mysqli_query($koneksi, "SELECT pengguna_nama, pengguna_ID FROM tbl_pengguna WHERE pengguna_ID='$session'");

  $pengguna = mysqli_fetch_array($query);

  return $pengguna['pengguna_nama'];

}

?>

<!DOCTYPE html>


<html lang="en">

  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

	  <link rel="icon" type="image/png" href="assets/images/pkh.jpg">

    <title>PKH SISTEM JAMAAH</title>

    <!-- Bootstrap -->
    <link href="assets/theme/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/theme/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <!-- <link href="assets/theme/vendors/nprogress/nprogress.css" rel="stylesheet"> -->
    <!-- iCheck -->
    <!-- <link href="assets/theme/vendors/iCheck/skins/flat/green.css" rel="stylesheet"> -->
    <!-- bootstrap-wysiwyg -->
    <link href="assets/theme/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="assets/theme/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="assets/theme/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="assets/theme/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="assets/theme/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="assets/theme/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
        <!-- Animate.css -->
    <link href="assets/theme/vendors/animate.css/animate.min.css" rel="stylesheet">


     <!-- Datatables -->
    <link href="assets/theme/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="assets/theme/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="assets/theme/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="assets/theme/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="assets/theme/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom theme Style -->
    <link href="assets/theme/build/css/custom.min.css" rel="stylesheet">
    <link href="assets/css/costum.css" rel="stylesheet">

    <style type="text/css">
      
      .btn {
      
        border-radius: 8px;
      
      }

      #blurtrigger1 {
        
        transition: 0.3s;
      
      }


    </style>




  </head>

  <body class="nav-md">

    <div class="container body">

      <div class="main_container">

        <div class="col-md-3 left_col" id="blurtrigger1">

          <div class="left_col scroll-view">

            <div class="navbar nav_title" style="border: 0;">

              <a class="site_title"><i class="fa fa-dashboard"></i> <span>Sistem PKH</span></a>

            </div>

            <div class="clearfix"></div>


            <!-- menu profile quick info -->

            <div class="profile clearfix">

              <div class="profile_pic">

                <img src="assets/images/pkh.jpg" alt="..." class="img-circle profile_img">

              </div>

              <div class="profile_info">

                <span>Selamat Datang,</span>

                <h2><?php echo pengguna($session,$koneksi);
                 ?></h2>

              </div>

            </div>

            <!-- /menu profile quick info -->



            <br />



            <!-- sidebar menu -->

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

              <div class="menu_section">

                <h3>General</h3>

                <!-- <br>Login sebagai: <?php echo $_SESSION["pengguna_nama"]; ?></br>  -->

                <ul class="nav side-menu">

                   <li><a href="home"><i class="fa fa-home"></i> Home</a>

                  <li><a href="daftar_pengguna"><i class="fa fa-user"></i> Pengguna</a>

                  </li>

                  <li><a><i class="fa fa-users"></i> Tamu <span class="fa fa-chevron-down"></span></a>

                    <ul class="nav child_menu">

                      <li><a href="daftar_registrasi">List Registrasi</a></li>

                      <li><a href="jenis_kegiatan">Jenis Kegiatan</a></li>

                      <li><a href="jenis_tamu">Jenis Tamu</a></li>

                    </ul>

                  </li>

                  <li><a href="form_keuangan"><i class="fa fa-dollar"></i> Keuangan</a>

                  </li>


                  <li><a><i class="fa fa-cutlery"></i> Menu Makanan <span class="fa fa-chevron-down"></span></a>

                    <ul class="nav child_menu">

                      <li><a href="form_tabel_makanan">List Makanan</a></li>

                      <li><a href="form_tabel_cemilan">List Cemilan</a></li>

                    </ul>

                  </li>

                  <li><a><i class="fa fa-edit"></i> Formulir <span class="fa fa-chevron-down"></span></a>

                    <ul class="nav child_menu">

                      <li><a href="tambah_registrasi">Tambah Registrasi</a></li>

                      <li><a href="tambah_pengguna">Form Tambah Admin</a></li>

                    </ul>

                  </li>

                </ul>

              </div>

            </div>

            <!-- /sidebar menu -->

          </div>

        </div>



        <!-- top navigation -->

        <div class="top_nav" id="blurtrigger2">

          <div class="nav_menu">

            <nav>

              <div class="nav toggle">

                <a id="menu_toggle"><i class="fa fa-bars"></i></a>

              </div>



              <ul class="nav navbar-nav navbar-right">

                <li>

                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                    <img src="assets/images/pkh.jpg" alt=""><?php echo pengguna($session, $koneksi); ?>

                    <span class=" fa fa-angle-down"></span>

                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right" style="width: 50px">

                    <li>
                      <form method="post" action="?action=logout" style="margin-top: 10px; margin-left: 10px;">
                        
                        <input type="hidden" name="action" value="logout_pengguna">
                        
                        <button style="border: none; background-color: white; color: black;" id="logout_pengguna" type="submit" name="logout_pengguna" value="logout_pengguna" ><font size="4px"> Log Out <span class="fa fa-sign-out"></span></font></button>
                    
                    </form>
                    
                    </li>

                    <div>

                  </ul>

                </li>

              </ul>

            </nav>

          </div>

        </div>

        <!-- /top navigation -->