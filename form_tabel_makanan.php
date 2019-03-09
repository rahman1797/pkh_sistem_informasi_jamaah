<?php



  include('header.php');



  include('framework/functions/func_makanan.php');



  $query = mysqli_query($koneksi, "SELECT * FROM tbl_menu_makanan");



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

                    <h2>Form tambah menu</h2>

                    <ul class="nav navbar-right panel_toolbox">

                      <li style="float: right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>

                      </li>

                    </ul>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                    <br />

                    <form id="tambah_menu" action="?action=insert_makanan" method="post" data-parsley-validate class="form-horizontal form-label-left">



                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama menu <font color="red">*</font>

                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input type="text" name="makanan_nama" id="makanan_nama" required="required" class="form-control col-md-7 col-xs-12">

                        </div>

                      </div>

                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Isi menu <font color="red">*</font>

                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

			  <textarea id="makanan_isi" required="required" name="makanan_isi" class="form-control col-md-7 col-xs-12"></textarea>

                        </div>

                      </div>

                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga <font color="red">*</font></label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input id="makanan_harga" class="money form-control col-md-7 col-xs-12" type="text" name="makanan_harga" required="required" placeholder="Rp.">

                        </div>

                      </div>

                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <font color="red">*</font></label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <select name="makanan_status" required="required" id="makanan_status" class="form-control">

                            <option value="1">Tersedia</option>

                            <option value="0">Tidak Tersedia</option>

                          </select>

                        </div>

                      </div>

                      <div class="ln_solid"></div>

                      <div class="form-group">

                        <div class="col-md-6 col-md-offset-3">

                          <input type="hidden" name="action" value="submit_makanan"> 

                          <button id="submit_makanan" name="submit_makanan" value="submit_makanan" type="submit" style="float: right" class="btn btn-success"><span class='glyphicon glyphicon-floppy-disk'> Submit</span></button>

                        </div>

                      </div>

  

                    </form>

                  </div>

                </div>

              </div>



     

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">

                    <h2>Tabel Menu Makanan</h2>

                    <ul class="nav navbar-right panel_toolbox">

                      <li style="float: right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>

                      </li>

                    </ul>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

        

                    <table id="datatable" class="table table-striped">

                      

                    <!-- header tabel -->

                      <thead>

                        <tr>

                          <th><center><strong>Nama Menu </th>

                          <th><center>Isi Menu </th>

                          <th><center>Harga </th>

                          <th><center>Status </th>

                          <th><center>Aksi </th>

                        </tr>

                      </thead>



                      <tbody>

                        <?php 



                         

                          while ($data = mysqli_fetch_array($query)) {

                            $makanan_ID = $data['makanan_ID'];

                            echo "<tr>";

                            echo "<td><center>" .$data['makanan_nama'] . "</td>";

                            echo "<td><center>" .$data['makanan_isi'] . "</td>";

                            echo "<td><center>Rp " . number_format($data['makanan_harga']) . "</td>";

                            if ($data['makanan_status'] == 1) {

                              echo "<td><center>Tersedia</td>";

                            }

                            else {

                              echo "<td><center>Tidak Tersedia</td>"; 

                            }



                            echo "<td><center>



                                <a href='ubah_makanan?makanan_ID=$makanan_ID'>



                                  <button class='btn btn-info btn-sm' >



                                    <span class='glyphicon glyphicon-edit'> </span>



                                  </button>



                                </a>    



                                



                                <a href='framework/functions/func_makanan?delete_makanan=$makanan_ID' onclick='return konfirmasi()' role='button' class='btn btn-danger btn-sm'>



                                  <span class='glyphicon glyphicon-trash'> </span>



                                </a>



                              </td>";



                            echo "</tr>";

                          }



                      ?>         

                      </tbody>

                    </table> 

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



    <script type="text/javascript" src="assets/js/simple.money.format.js"></script>



     <script type="text/javascript" language="JavaScript">



            function konfirmasi()



            {



                tanya = confirm("Anda Yakin Akan Menghapus Data ?");



                if (tanya == true) return true;



                else return false;



            }



            $('.money').simpleMoneyFormat();



    </script>