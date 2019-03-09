<?php
include('header.php');

error_reporting(0);

include('framework/functions/func_tamu.php');

$rombongan_ID  = mysqli_real_escape_string($koneksi, (int) $_GET['rombongan_ID']);

$query    = mysqli_query($koneksi, "SELECT * FROM tbl_rombongan WHERE rombongan_ID='$rombongan_ID'");

$data     = mysqli_fetch_array($query);

  // if ($data == 0) {
  //   echo "<script>
  //         window.alert('Data tidak ditemukan');
  //         window.location.replace('daftar_pengguna');
  //         </script>
  //   ";
  // }

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
                    <h2>Form Ubah Rombongan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" action="?action=edit_rombongan" novalidate method="post">

                      <p>Isilah dengan data yang valid</p>

                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3">Nama Lengkap <span style="color: red" class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" name="id_registrasi" value="<?php echo $data['id_registrasi'] ?>">
                          <input type="hidden" name="rombongan_ID" value="<?php echo $data['rombongan_ID'] ?>">
                          <input id="rombongan_nama" type="text" value="<?php echo $data['rombongan_nama'] ?>" name="rombongan_nama" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3">Email <span style="color: red" class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="rombongan_email" type="text" name="rombongan_email" value="<?php echo $data['rombongan_email'] ?>" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Telepon <span style="color: red" class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="rombongan_telp" required="required" value="<?php echo $data['rombongan_telp'] ?>" name="rombongan_telp" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="daftar_pengguna" class="btn btn-danger">
                        <span class='glyphicon glyphicon-chevron-left'> Kembali</span>
                       </a>
                          <input type="hidden" name="action" value="submit_rombongan">
                          <button id="submit_rombongan" name="submit_rombongan" value="submit_rombongan" type="submit" style="float: right;" class="btn btn-success"><span class='glyphicon glyphicon-save'> Simpan</span></button>
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

