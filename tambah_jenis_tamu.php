<?php
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
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" action="?action=insert_list_tamu"  method="post">

                      <p>Isilah dengan data yang valid</p>

                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3">Jenis Tamu <span style="color: red" class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nama_tamu" type="text" name="nama_tamu" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="daftar_tamu.php" class="btn btn-danger">
                        <span class='glyphicon glyphicon-chevron-left'> Kembali</span>
                       </a>
                          <input type="hidden" name="action" value="submit_tamu">
                          <button id="submit_pengguna" type="submit" name="submit_tamu" value="submit_tamu" style="float: right;" class="btn btn-success"><span class='glyphicon glyphicon-save'> Simpan</span></button>
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
