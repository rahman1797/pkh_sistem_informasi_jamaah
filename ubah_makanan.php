<?php

include('header.php');



error_reporting(0);



include('framework/functions/func_makanan.php');



$makanan_ID  = mysqli_real_escape_string($koneksi, (int) $_GET['makanan_ID']);



$query    = mysqli_query($koneksi, "SELECT * FROM tbl_menu_makanan WHERE makanan_ID='$makanan_ID'");



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

                <h3>Menu <small>makanan</small></h3>

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

                    <form id="tambah_menu" action="?action=edit_makanan" method="post" data-parsley-validate class="form-horizontal form-label-left">



                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama menu <font color="red">*</font>

                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input type="hidden" name="makanan_ID" value="<?php echo $data['makanan_ID'] ?>">

                          <input type="text" name="makanan_nama" value="<?php echo $data['makanan_nama'] ?>" id="makanan_nama" required="required" class="form-control col-md-7 col-xs-12">

                        </div>

                      </div>

                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Isi menu <font color="red">*</font>

                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

			  <textarea id="makanan_isi" required="required" name="makanan_isi" class="form-control col-md-7 col-xs-12"><?php echo $data['makanan_isi'] ?></textarea>

                        </div>

                      </div>

                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga <font color="red">*</font></label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input id="makanan_harga" class="form-control col-md-7 col-xs-12" value="<?php echo $data['makanan_harga'] ?>" type="number" name="makanan_harga" required="required">

                        </div>

                      </div>

                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <font color="red">*</font></label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <select name="makanan_status" required="required" id="makanan_status" class="form-control">

                            <option value="<?php echo $data['makanan_status'] ?>">

                              <?php 

                              if ($data['makanan_status'] == 1) {

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

                          <input type="hidden" name="action" value="submit_makanan"> 

                          <button id="submit_makanan" name="submit_makanan" value="submit_makanan" type="submit" style="float: right" class="btn btn-success"><span class='glyphicon glyphicon-floppy-disk'> Update</span></button>

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



