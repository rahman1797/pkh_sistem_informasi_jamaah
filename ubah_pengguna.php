<?php
include('header.php');

error_reporting(0);

// include('framework/functions/func_pengguna.php');

$pengguna_ID  = mysqli_real_escape_string($koneksi, (int) $_GET['pengguna_ID']);

$query    = mysqli_query($koneksi, "SELECT * FROM tbl_pengguna WHERE pengguna_ID='$pengguna_ID'");

$data     = mysqli_fetch_array($query);

  if ($session != $pengguna_ID) {
    echo "<script>
          window.alert('Tidak dapat merubah user ini');
          window.location.replace('daftar_pengguna');
          </script>
    ";
  }
  
$username_before = $data['pengguna_username'];

?>

        <!-- page content -->
        <div class="right_col" role="main">
       
          <div class="">
       
            <div class="page-title">
       
            </div>
       
            <div class="clearfix"></div>

            <div class="row">
       
              <div class="col-md-12 col-sm-12 col-xs-12">
       
                <div class="x_panel">
       
                  <div class="x_title">
       
                    <h2>Form Ubah Pengguna</h2>
       
                    <ul class="nav navbar-right panel_toolbox">
       
                     <!--  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
       
                      </li> -->
       
                    </ul>
       
                    <div class="clearfix"></div>
       
                  </div>
       
                  <div class="x_content animated fadeIn">


                    <form class="form-horizontal form-label-left" action="?action=edit_pengguna" novalidate method="post">

                      <div class="item form-group">
                  
                        <label for="password" class="control-label col-md-3">Username <span style="color: red" class="required">*</span></label>
                  
                        <div class="input-group col-md-6 col-sm-6 col-xs-12">
                  
                          <input type="hidden" name="pengguna_ID" value="<?php echo $data['pengguna_ID'] ?>">
                  
                          <input id="username" type="text" value="<?php echo $data['pengguna_username'] ?>" name="username" class="form-control col-md-7 col-xs-12" required="required">

                          <input type="hidden" name="get_username" value="<?php echo $data['pengguna_username'] ?>">
                 
                        </div>
                 
                      </div>

                      <div class="item form-group">
                 
                        <label for="password" class="control-label col-md-3">Password <span style="color: red" class="required">*</span></label>
                 
                        <div class="input-group col-md-6 col-sm-6 col-xs-12" id="show_hide_password">
                 
                          <input id="password" type="password" name="password" value="<?php echo $data['pengguna_pass'] ?>" class="form-control col-md-7 col-xs-12" required="required">

                           <div class="input-group-addon">
                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                          </div>
                 
                        </div>
                 
                      </div>

                 
                      <div class="item form-group">
                 
                        <label for="password" class="control-label col-md-3">Repeat Password <span style="color: red" class="required">*</span></label>
                 
                        <div class="input-group col-md-6 col-sm-6 col-xs-12" id="show_hide_password">
                 
                          <input id="password2" value="<?php echo $data['pengguna_pass'] ?>" type="password" data-validate-linked="password" name="password2" class="form-control col-md-7 col-xs-12" required="required">

                           <div class="input-group-addon">
                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                          </div>
                 
                        </div>
                 
                      </div>

                      <div class="item form-group">
                 
                        <label class="control-label col-md-3">Email <span style="color: red" class="required">*</span></label>
                 
                        <div class="input-group col-md-6 col-sm-6 col-xs-12">
                 
                          <input id="email" type="email" name="email" value="<?php echo $data['pengguna_email'] ?>" class="form-control col-md-7 col-xs-12" required="required">
                 
                        </div>
                 
                      </div>

                      <div class="item form-group">
                 
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Lengkap <span style="color: red" class="required">*</span>
                        </label>
     
                        <div class="input-group col-md-6 col-sm-6 col-xs-12">
     
                          <input type="text" id="nama" required="required" value="<?php echo $data['pengguna_nama'] ?>" name="nama" class="form-control col-md-7 col-xs-12">
     
                        </div>
     
                      </div>

                      

                      <div class="ln_solid"></div>
     
                      <div class="form-group">
     
                        <div class="col-md-6 col-md-offset-3">
     
                          <a href="daftar_pengguna" class="btn btn-danger" style="float: right;">
     
                        <span class='glyphicon glyphicon-chevron-left'> Kembali</span>
     
                       </a>
     
                          <input type="hidden" name="action" value="submit_pengguna">
     
                          <button id="submit_pengguna" name="submit_pengguna" value="submit_pengguna" type="submit" style="float: right;" class="btn btn-success"><span class='glyphicon glyphicon-floppy-disk'> Update</span></button>
     
                        </div>
     
                      </div>
     
                    </form>
     
                  </div>
     
                </div>
     
              </div>
     
            </div>
     
          </div>
     
        </div>
        <!-- /page content -->

         <!-- FOOTER -->
        <?php
            include('footer.php');
        ?>
        <!-- /FOOTER -->


<script type="text/javascript">
          $(document).ready(function() {
              $("#show_hide_password a").on('click', function(event) {
                  event.preventDefault();
                  if($('#show_hide_password input').attr("type") == "text"){
                      $('#show_hide_password input').attr('type', 'password');
                      $('#show_hide_password i').addClass( "fa-eye-slash" );
                      $('#show_hide_password i').removeClass( "fa-eye" );
                  }else if($('#show_hide_password input').attr("type") == "password"){
                      $('#show_hide_password input').attr('type', 'text');
                      $('#show_hide_password i').removeClass( "fa-eye-slash" );
                      $('#show_hide_password i').addClass( "fa-eye" );
                  }
              });
          });

          // $(document).ready(function() {
          //     $("#show_hide_password2 a").on('click', function(event) {
          //         event.preventDefault();
          //         if($('#show_hide_password2 input').attr("type") == "text"){
          //             $('#show_hide_password2 input').attr('type', 'password');
          //             $('#show_hide_password2 i').addClass( "fa-eye-slash" );
          //             $('#show_hide_password2 i').removeClass( "fa-eye" );
          //         }else if($('#show_hide_password2 input').attr("type") == "password"){
          //             $('#show_hide_password2 input').attr('type', 'text');
          //             $('#show_hide_password2 i').removeClass( "fa-eye-slash" );
          //             $('#show_hide_password2 i').addClass( "fa-eye" );
          //         }
          //     });
          // });
</script>
