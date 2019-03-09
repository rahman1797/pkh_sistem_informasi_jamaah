<?php

include('header.php');

include('framework/functions/func_jenis_kegiatan.php');

$kegiatan_ID  = mysqli_real_escape_string($koneksi, (int) $_GET['jenis_kegiatan_ID']);

$query    = mysqli_query($koneksi, "SELECT * FROM tbl_jenis_kegiatan WHERE jenis_kegiatan_ID='$kegiatan_ID'");

$data     = mysqli_fetch_array($query);


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

                    <h2>Form Ubah Jenis kegiatan</h2>

                    <ul class="nav navbar-right panel_toolbox">

                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>

                      </li>

                    </ul>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">



                    <form class="form-horizontal form-label-left" action="?action=edit_jenis_kegiatan" novalidate method="post">

                      <p>Isilah dengan data yang valid</p>

                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3">Jenis kegiatan <span style="color: red" class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" name="jenis_kegiatan_ID" value="<?php echo $data['jenis_kegiatan_ID'] ?>">

                          <input id="jenis_kegiatan" type="text" value="<?php echo $data['jenis_kegiatan_nama'] ?>" name="jenis_kegiatan" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="jenis_kegiatan.php" class="btn btn-danger">
                        <span class='glyphicon glyphicon-chevron-left'> Kembali</span>
                       </a>
                          <input type="hidden" name="action" value="submit_jenis_kegiatan">
                          <button id="submit_kegiatan" type="submit" name="submit_jenis_kegiatan" value="submit_jenis_kegiatan" style="float: right;" class="btn btn-success"><span class='glyphicon glyphicon-save'> Simpan</span></button>
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



