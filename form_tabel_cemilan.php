<?php



  include('header.php');



  include('framework/functions/func_cemilan.php');



  $query = mysqli_query($koneksi, "SELECT * FROM tbl_menu_cemilan");



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

                    <h2>Form tambah menu</h2>

                    <ul class="nav navbar-right panel_toolbox">

                      <li style="float: right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>

                      </li>

                    </ul>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                    <br />

                    <form id="tambah_menu" action="?action=insert_cemilan" method="post" data-parsley-validate class="form-horizontal form-label-left">



                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama menu <font color="red">*</font>

                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input type="text" name="cemilan_nama" id="cemilan_nama" required="required" class="form-control col-md-7 col-xs-12">

                        </div>

                      </div>

                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Isi menu <font color="red">*</font>

                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          

			  <textarea id="cemilan_isi" required="required" name="cemilan_isi" class="form-control col-md-7 col-xs-12"></textarea>

                        </div>

                      </div>

                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga <font color="red">*</font></label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input id="cemilan_harga" class=" money form-control col-md-7 col-xs-12" type="text" name="cemilan_harga" required="required" placeholder="Rp.">

                        </div>

                      </div>

                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <font color="red">*</font></label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <select name="cemilan_status" required="required" id="cemilan_status" class="form-control">

                            <option value="1">Tersedia</option>

                            <option value="0">Tidak Tersedia</option>

                          </select>

                        </div>

                      </div>

                      <div class="ln_solid"></div>

                      <div class="form-group">

                        <div class="col-md-6 col-md-offset-3">

                          <input type="hidden" name="action" value="submit_cemilan"> 

                          <button id="submit_cemilan" name="submit_cemilan" value="submit_cemilan" type="submit" style="float: right" class="btn btn-success"><span class='glyphicon glyphicon-floppy-disk'> Submit</span></button>

                        </div>

                      </div>

  

                    </form>

                  </div>

                </div>

              </div>



     

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">

                    <h2>Tabel Menu cemilan</h2>

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

                            $cemilan_ID = $data['cemilan_ID'];

                            echo "<tr>";

                            echo "<td><center>" .$data['cemilan_nama'] . "</td>";

                            echo "<td><center>" .$data['cemilan_isi'] . "</td>";

                            echo "<td><center>Rp " . number_format($data['cemilan_harga']) . "</td>";

                            if ($data['cemilan_status'] == 1) {

                              echo "<td><center>Tersedia</td>";

                            }

                            else {

                              echo "<td><center>Tidak Tersedia</td>"; 

                            }



                            echo "<td><center>



                                <a href='ubah_cemilan?cemilan_ID=$cemilan_ID'>



                                  <button class='btn btn-info btn-sm' >



                                    <span class='glyphicon glyphicon-edit'> </span>



                                  </button>



                                </a>    



                                



                                <a href='framework/functions/func_cemilan?delete_cemilan=$cemilan_ID' onclick='return konfirmasi()' role='button' class='btn btn-danger btn-sm'>



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