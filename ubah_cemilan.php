<?php

include('header.php');



error_reporting(0);



include('framework/functions/func_cemilan.php');



$cemilan_ID  = mysqli_real_escape_string($koneksi, (int) $_GET['cemilan_ID']);



$query    = mysqli_query($koneksi, "SELECT * FROM tbl_menu_cemilan WHERE cemilan_ID='$cemilan_ID'");



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

              <div class="title_left">

                <h3>Menu <small>cemilan</small></h3>

              </div>

            </div>

          </div>

<!-- background content -->

          <div class="clearfix"></div>

<!-- main content -->        

            <div class="row">



              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">

                    <h2>Form edit menu</h2>

                    <ul class="nav navbar-right panel_toolbox">

                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>

                      </li>

                    </ul>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                    <br />

                    <form id="tambah_menu" action="?action=edit_cemilan" method="post" data-parsley-validate class="form-horizontal form-label-left">



                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama menu <font color="red">*</font>

                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input type="hidden" name="cemilan_ID" value="<?php echo $data['cemilan_ID'] ?>">

                          <input type="text" name="cemilan_nama" value="<?php echo $data['cemilan_nama'] ?>" id="cemilan_nama" required="required" class="form-control col-md-7 col-xs-12">

                        </div>

                      </div>

                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Isi menu <font color="red">*</font>

                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <textarea id="cemilan_isi" required="required" name="cemilan_isi" class="form-control col-md-7 col-xs-12"><?php echo $data['cemilan_isi'] ?></textarea>

                        </div>

                      </div>

                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga <font color="red">*</font></label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input id="cemilan_harga" class="form-control col-md-7 col-xs-12" value="<?php echo $data['cemilan_harga'] ?>" type="number" name="cemilan_harga" required="required">

                        </div>

                      </div>

                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <font color="red">*</font></label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

			  <select name="cemilan_status" required="required" id="cemilan_status" class="form-control">

                            <option value="<?php echo $data['cemilan_status'] ?>">

                              <?php 

                              if ($data['cemilan_status'] == 1) {

                                echo "Tersedia </option>
                                <option value='0'>Tidak Tersedia</option>
                                ";

                              }

                              else {

                                echo "Tidak Tersedia </option>
                                <option value='1'>Tersedia</option>
                                ";

                              }

                              ?>

                          </select>

                        </div>

                      </div>

                      <div class="ln_solid"></div>

                      <div class="form-group">

                        <div class="col-md-6 col-md-offset-3">

                          <input type="hidden" name="action" value="submit_cemilan"> 

                          <button id="submit_cemilan" name="submit_cemilan" value="submit_cemilan" type="submit" style="float: right" class="btn btn-success"><span class='glyphicon glyphicon-floppy-disk'> Update</span></button>

                        </div>

                      </div>

  

                    </form>

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



