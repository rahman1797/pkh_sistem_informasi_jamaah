<?php

error_reporting(0);

// include('framework/functions/func_pengguna.php');

include('header.php');

?>

        <!-- page content -->
        <div class="right_col" role="main">
        
          <div class="">
        
            <div class="page-title">
        
              <div class="title_left">
        
                <h3>Registrasi Pengguna/Admin Baru</h3>
        
              </div>
        
            </div>
        
            <div class="clearfix"></div>

            <div class="row">
        
              <div class="col-md-12 col-sm-12 col-xs-12">
        
                <div class="x_panel">
        
                  <div class="x_title">
        
                    <h2>Form Tambah Pengguna</h2>
        
                    <ul class="nav navbar-right panel_toolbox">
        
                     <!--  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        
                      </li> -->
        
                    </ul>
        
                    <div class="clearfix"></div>
        
                  </div>
        
                  <div class="x_content animated fadeIn">

                    <form class="form-horizontal form-label-left" action="?action=insert_pengguna"  method="post">

                      <div class="item form-group">
        
                        <label for="password" class="control-label col-md-3">Username <span style="color: red" class="required">*</span></label>
        
                        <div class="input-group col-md-6 col-sm-6 col-xs-12">
        
                          <input id="username" type="text" name="username" class="form-control col-md-7 col-xs-12" required="required">
        
                        </div>
        
                      </div>

                      <div class="item form-group">
        
                        <label for="password" class="control-label col-md-3">Password <span style="color: red" class="required">*</span></label>
        
                        <div class="input-group col-md-6 col-sm-6 col-xs-12" id="show_hide_password">
        
                          <input id="password" type="password" name="password" class="form-control" required="required">

                          <div class="input-group-addon">
                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                          </div>
        
                        </div>
        
                      </div>

                      <div class="item form-group">
        
                        <label for="password" class="control-label col-md-3">Repeat Password <span style="color: red" class="required">*</span></label>
        
                        <div class="input-group col-md-6 col-sm-6 col-xs-12"  id="show_hide_password">
        
                          <input id="password2" type="password" data-validate-linked="password" name="password2" class="form-control col-md-7 col-xs-12" required="required">

                          <div class="input-group-addon">
                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                          </div>
        
                        </div>
        
                      </div>

                      <div class="item form-group">
        
                        <label class="control-label col-md-3">Email <span style="color: red" class="required">*</span></label>
        
                        <div class="input-group col-md-6 col-sm-6 col-xs-12">
        
                          <input id="email" type="email" name="email" class="form-control col-md-7 col-xs-12" required="required">
        
                        </div>
        
                      </div>

                      <div class="item form-group">
        
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Lengkap <span style="color: red" class="required
                          ">*</span>
                        </label>
                        
                        <div class="input-group col-md-6 col-sm-6 col-xs-12">
                        
                          <input type="text" id="nama" required="required" name="nama" class="form-control col-md-7 col-xs-12">
                        
                        </div>
                      
                      </div>

                      <div class="ln_solid"></div>
                      
                      <div class="form-group">
                      
                        <div class="col-md-6 col-md-offset-3">
                      
                          <a href="daftar_pengguna" class="btn btn-danger">
                      
                        <span class='glyphicon glyphicon-chevron-left'> Kembali</span>
                      
                       </a>
                      
                          <input type="hidden" name="action" value="submit_pengguna">
                      
                          <button id="submit_pengguna" type="submit" name="submit_pengguna" value="submit_pengguna" style="float: right;" class="btn btn-success"><span class='glyphicon glyphicon-floppy-disk'> Submit</span></button>
                      
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
