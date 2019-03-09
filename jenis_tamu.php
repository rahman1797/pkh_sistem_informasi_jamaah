<?php

  include('header.php');

  include('framework/functions/func_jenis_tamu.php');

  $query = mysqli_query($koneksi, "SELECT * FROM tbl_jenis_tamu");

?>

  
  <!-- page content -->
  
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Daftar <small>Jenis Tamu</small></h3>
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
                    <h2>Form tambah tamu</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="tambah_menu" action="?action=insert_jenis_tamu" method="post" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Tamu <font color="red">*</font>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="jenis_tamu" id="jenis_tamu" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <input type="hidden" name="action" value="submit_jenis_tamu"> 
                          <button id="submit_cemilan" name="submit_jenis_tamu" value="submit_jenis_tamu" type="submit" style="float: right" class="btn btn-success"><span class='glyphicon glyphicon-save'> Tambah</span></button>
                        </div>
                      </div>
  
                    </form>
                  </div>
                </div>
              </div>

     
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel Jenis Tamu</h2>
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
                          <th><center>Nama Tamu </th>
                         
                          <th><center>Aksi </th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php 

                         $no = 1;
                          while ($data = mysqli_fetch_array($query)) {
                            $jenis_tamu_ID = $data['jenis_tamu_ID'];
                            echo "<tr>";
                            echo "<td><center>" . $no++;
                            echo "<td><center>" .$data['jenis_tamu_nama'] . "</td>";

                            if ($jenis_tamu_ID == 1 || $jenis_tamu_ID == 2 || $jenis_tamu_ID == 3 || $jenis_tamu_ID == 4) {
                              echo "<td><center>Locked</td>";
                            }

                            else {

                            echo "<td><center>

                                <a href='ubah_jenis_tamu?jenis_tamu_ID=$jenis_tamu_ID'>

                                  <button class='btn btn-info btn-sm' >

                                    <span class='glyphicon glyphicon-edit'> Edit</span>

                                  </button>

                                </a>    

                                

                                <a href='framework/functions/func_jenis_tamu?delete_jenis_tamu=$jenis_tamu_ID' onclick='return konfirmasi()' role='button' class='btn btn-danger btn-sm'>

                                  <span class='glyphicon glyphicon-trash'> Delete</span>

                                </a>

                              </td>";
                            }
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


     <script type="text/javascript" language="JavaScript">

            function konfirmasi()

            {

                tanya = confirm("Anda Yakin Akan Menghapus Data ?");

                if (tanya == true) return true;

                else return false;

            }

    </script>