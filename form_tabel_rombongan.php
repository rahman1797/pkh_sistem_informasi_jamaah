<?php

include('header.php');

include('framework/functions/func_tamu.php');

$id_registrasi = $_GET['id_registrasi'];

$query = mysqli_query($koneksi, "SELECT * FROM tbl_rombongan WHERE id_registrasi=$id_registrasi");

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

                    <h2>Form Registrasi Rombongan</h2>

                    <ul class="nav navbar-right panel_toolbox">

                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>

                      </li>

                    </ul>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">



                    <form class="form-horizontal form-label-left" action="?action=insert_rombongan" data-parsley-validate method="post">



                      <p>Isilah dengan data yang valid</p>



                      <span class="section">Data Pribadi</span>



                      <div class="item form-group">

                    <!--     <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Registrasi

                        </label> -->

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input id="id_registrasi" class="form-control col-md-7 col-xs-12" name="id_registrasi" value="<?php echo $id_registrasi ?>" required="required" type="hidden" 
                          readonly="">
                        
                        </div>
                      
                      </div>
                      
                      <div class="item form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Lengkap <span style="color: red" class="required">*</span>

                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input type="text" id="rombongan_nama" name="rombongan_nama" required="required" class="form-control col-md-7 col-xs-12">

                        </div>

                      </div>

                      <div class="item form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Email <span style="color: red" class="required">*</span>

                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input type="text" id="rombongan_email" name="rombongan_email" required="required" class="form-control col-md-7 col-xs-12">

                        </div>

                      </div>

                      <div class="item form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Telepon <span style="color: red" class="required">*</span>

                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input type="number" id="rombongan_telp" name="rombongan_telp" required="required" class="form-control col-md-7 col-xs-12">

                        </div>

                      </div>
                    

                      <div class="ln_solid"></div>

                      <div class="form-group">

                        <div class="col-md-6 col-md-offset-3">

                          <a href="daftar_registrasi" class="btn btn-danger">

                             <span class='glyphicon glyphicon-chevron-left'> Kembali</span>

                           </a>

                          <input type="hidden" name="action" value="submit_rombongan"> 
                          <button id="submit_rombongan" name="submit_rombongan" value="submit_rombongan" type="submit" style="float: right" class="btn btn-success"><span class='glyphicon glyphicon-save'> Tambah</span></button>

                        </div>

                      </div>

                    </form>

                  </div>

                </div>

              </div>

            </div>



<!-- Tabel -->

          <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">

                    <h2>List Rombongan</h2>

                    <ul class="nav navbar-right panel_toolbox">

                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>

                      </li>

                    </ul>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">


                    <table id="datatable" class="table table-striped">

                      
                    <!-- header tabel -->

                      <thead>

                        <tr>

                          <th><center>No</th>

                          <!-- <th><strong><center>ID Registrasi</th> -->

                          <th><center>Nama Lengkap</th>

                          <th><center>Email</th>

                          <th><center>Telepon</th>

                          <th><center>Aksi</th></strong>

                        </tr>

                      </thead>


                      <tbody>

                        <?php                     

                        $no = 1;

                        while ($data = mysqli_fetch_array($query)) {
                          
                          $rombongan_ID = $data['rombongan_ID'];

                          echo "<tr>";

                          echo "<td><center>" . $no++ . "</td>";                          

                          // echo "<td><center>" . $data['id_registrasi'] . "</td>";

                          echo "<td><center>" . $data['rombongan_nama'] . "</td>";

                          echo "<td><center>" . $data['rombongan_email'] . "</td>";

                          echo "<td><center>" . $data['rombongan_telp'] . "</td>";

                            echo "<td><center>

                                <a href='ubah_rombongan?rombongan_ID=$rombongan_ID'>

                                  <button class='btn btn-info btn-sm' >

                                    <span class='glyphicon glyphicon-edit'> Edit</span>

                                  </button>

                                </a>    

                                

                                <a href='framework/functions/func_tamu?delete_rombongan=$rombongan_ID' onclick='return konfirmasi()' role='button' class='btn btn-danger btn-sm'>

                                  <span class='glyphicon glyphicon-trash'> Delete</span>

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

<!-- tabel -->

          </div>

        </div>

        <!-- /page content -->


         <!-- FOOTER -->

        <?php

            include('footer.php');

        ?>

        <!-- /FOOTER -->

      </div>

    </div>

     <script type="text/javascript" language="JavaScript">

            function konfirmasi()

            {

                tanya = confirm("Anda Yakin Akan Menghapus Data ?");

                if (tanya == true) return true;

                else return false;

            }

    </script>
