<?php



include('header.php');



include('framework/functions/func_tamu.php');

 $registrasi_ID  = mysqli_real_escape_string($koneksi, (int) $_GET['id_registrasi']);

  $query    = mysqli_query($koneksi, "SELECT * FROM tbl_registrasi WHERE registrasi_ID='$registrasi_ID'");

  $data     = mysqli_fetch_array($query);



if ($data == 0) {

    echo "<script>

          window.alert('Data tidak ditemukan');

          window.location.replace('daftar_registrasi');

          </script>

    ";

  }

?>



        <!-- page content -->



        <div class="right_col" role="main">



          <div class="">



            <div class="page-title">



              <div class="title_left">



                <h3>Ubah Data Registrasi</h3>



              </div>



            </div>



            <div class="clearfix"></div>



            <div class="row">



              <form class="form-horizontal form-label-left" data-parsley-validate action="?action=edit_registrasi" method="post">
              <input type="hidden" readonly="" name="regis_ID" id="regis_ID" value="<?php echo $data['registrasi_ID'] ?>">



                <div class="col-md-12 col-sm-12 col-xs-12">



                  <div class="x_panel">



                    <div class="x_title">



                      <h2> WAKTU KEDATANGAN </h2>



                      <ul class="nav navbar-right panel_toolbox">



                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>



                        </li>



                      </ul>



                      <div class="clearfix"></div>



                    </div>



                    <div class="x_content">





                      <div class="form-group">



                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="acara_mulai">Acara mulai <span style="color: red" class="

                          required">*</span></label>

                        

                        <div class="col-md-6 col-sm-6 col-xs-12">

                        

                          <div class='input-group date' id='myDatepicker'>

                        

                            <input type='text' name="registrasi_waktu_datang" value="<?php echo $data['registrasi_waktu_datang'] ?>" id="registrasi_waktu_datang" placeholder="Masukkan tanggal dan waktu" class="form-control" 

                            required="required" />

                            

                            <span class="input-group-addon">

                            

                               <span class="glyphicon glyphicon-calendar"></span>

                            

                            </span>

                        </div>

                        

                        </div>

                      

                      </div>







                      <div class="form-group">



                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="acara_berakhir">Acara berakhir <span style="color: red" class

                          ="required">*</span></label>

                        

                        <div class="col-md-6 col-sm-6 col-xs-12">

                        

                          <div class='input-group date' id='myDatepicker1'>

                        

                            <input type='datetimepicker' value="<?php echo $data['registrasi_waktu_pulang'] ?>" name="registrasi_waktu_pulang" id="registrasi_waktu_pulang" class="form-control" required="required" 

                            placeholder="Masukkan tanggal dan waktu" />

                            

                            <span class="input-group-addon">

                            

                               <span class="glyphicon glyphicon-calendar"></span>

                            

                            </span>

                        

                        </div>

                        

                        </div>

                      

                      </div>

                      

                      </section>

                  

                  </div>

                

                </div>

              

              </div>





              <div class="col-md-12 col-sm-12 col-xs-12">



                  <div class="x_panel">



                    <div class="x_title">



                      <h2> PENANGGUNG JAWAB (PIC) </h2>



                      <ul class="nav navbar-right panel_toolbox">



                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>



                        </li>



                      </ul>



                      <div class="clearfix"></div>



                    </div>



                    <div class="x_content">

                      



                      <div class="item form-group">



                        <label for="password" class="control-label col-md-3">Nama PIC <span style="color: red" class="required">*</span></label>



                        <div class="col-md-6 col-sm-6 col-xs-12">



                          <input id="registrasi_PIC_nama" type="text" value="<?php echo $data['registrasi_PIC_nama'] ?>" name="registrasi_PIC_nama" class="form-control col-md-7 col-xs-12" required="required">

                     

                        </div>

                    

                      </div>



                     

                      <div class="item form-group">

                      

                        <label for="password" class="control-label col-md-3">Nomor Telepon <span style="color: red" class="required">*</span></label>

                      

                        <div class="col-md-6 col-sm-6 col-xs-12">

                      

                          <input id="registrasi_PIC_telp" type="number" name="registrasi_PIC_telp" value="<?php echo $data['registrasi_PIC_telp'] ?>" class="form-control col-md-7 col-xs-12" required="required">

                        

                        </div>

                      

                      </div>



                      <div class="item form-group">

                      

                        <label class="control-label col-md-3">Email <span style="color: red" class="required">*</span></label>

                      

                        <div class="col-md-6 col-sm-6 col-xs-12">

                      

                          <input id="registrasi_PIC_email" type="text" name="registrasi_PIC_email" value="<?php echo $data['registrasi_PIC_email'] ?>" class="form-control col-md-7 col-xs-12" required="required">


                      

                        </div>

                      

                      </div>



                      <div class="item form-group">

                      

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Alamat <span style="color: red" class="required">*



                        </span>

                        

                        </label>

                        

                        <div class="col-md-6 col-sm-6 col-xs-12">

                        

                          <textarea id="registrasi_PIC_alamat" required="required" name="registrasi_PIC_alamat" class="form-control col-md-7 col-xs-12"><?php echo $data['registrasi_PIC_alamat'] ?></textarea>

                        

                        </div>



                      </div>



                      <div class="item form-group">



                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kota/Kabupaten <span style="color: red" class="required">*</span>



                        </label>



                        <div class="col-md-6 col-sm-6 col-xs-12">



<select name="registrasi_PIC_kota" id="registrasi_PIC_kota" required="required" class="form-control col-md-7 col-xs-12" required="required" >



                                   <!--  <option value="<?php echo $data['registrasi_PIC_kota'] ?>"><?php echo $data['registrasi_PIC_kota'] ?></option> -->

                                    

                                    <?php

                                      

                                      $query_kota = mysqli_query($koneksi,"SELECT * FROM regencies ORDER BY name_reg");

                                    

                                      $array = [];

                                    

                                      while ($row_kota = mysqli_fetch_array($query_kota)) {

                                       

                                        array_push($array, $row_kota['name_reg']);

                                    

                                      }

                                      ?>

                                      



                                </select>   

                        

                        </div>



                      </div>



                    </section> 

                  

                  </div>

                

                </div>

              

              </div>



              <div class="col-md-12 col-sm-12 col-xs-12">



                  <div class="x_panel">



                    <div class="x_title">



                      <h2> RINCIAN KEGIATAN </h2>



                      <ul class="nav navbar-right panel_toolbox">



                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>



                        </li>



                      </ul>



                      <div class="clearfix"></div>



                    </div>



                    <div class="x_content">





                      <div class="item form-group">



                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kegiatan <span style="color: red" class="required">*</span>



                        </label>



                        <div class="col-md-6 col-sm-6 col-xs-12">



                                <select name="id_jenis_kegiatan" required="required" id="id_jenis_kegiatan" class="form-control col-md-7 col-xs-12">

                                  <?php

                                    $id_kegiatan = $data['id_jenis_kegiatan'];

                                    $query_kegiatan = mysqli_query($koneksi, "SELECT * FROM tbl_jenis_kegiatan WHERE jenis_kegiatan_ID='$id_kegiatan'");     

                                    $data_kegiatan = mysqli_fetch_array($query_kegiatan);

                                    ?>

                                    <option value="<?php echo $data_kegiatan['jenis_kegiatan_ID']; ?>"><?php echo $data_kegiatan['jenis_kegiatan_nama']; ?></option>

                                    

                                    <?php

                                    $kegiatan = mysqli_query($koneksi, "SELECT * FROM tbl_jenis_kegiatan");     

                                    while ($dat_kegiatan = mysqli_fetch_array($kegiatan)) { 

                                    ?>

                                      <option value="<?php echo $dat_kegiatan['jenis_kegiatan_ID']; ?>"><?php echo $dat_kegiatan['jenis_kegiatan_nama']; ?></option>

                                  

                                   <?php 

                                    }

                                  ?>

                    

                                             

                                </select>   

                        </div>



                      </div>



                      

                      <div class="item form-group">

                      

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Tamu <span style="color: red" class="required">*</span>

                      

                        </label>

                      

                        <div class="col-md-6 col-sm-6 col-xs-12">

                      

                                 <select name="id_jenis_tamu" required="required" id="id_jenis_tamu" class="form-control col-md-7 col-xs-12">

                    

                                  <?php

                                    $id_tamu = $data['id_jenis_tamu'];

                                    $query_tamu = mysqli_query($koneksi, "SELECT * FROM tbl_jenis_tamu WHERE jenis_tamu_ID='$id_tamu'");     

                                    $data_tamu = mysqli_fetch_array($query_tamu);

                                   ?>

                                    <option value="<?php echo $data_tamu['jenis_tamu_ID']; ?>"><?php echo $data_tamu['jenis_tamu_nama']; ?></option>

                                    

                                   <?php

                                    $tamu = mysqli_query($koneksi, "SELECT * FROM tbl_jenis_tamu");     

                                    while ($dat_tamu = mysqli_fetch_array($tamu)) { 

                                  ?>

                                    <option value="<?php echo $dat_tamu['jenis_tamu_ID']; ?>"><?php echo $dat_tamu['jenis_tamu_nama']; ?></option>

                                  

                                 <?php 

                                    }

                                  ?>

                    

                                </select>   

                        

                        </div>

                      

                      </div>



                       <div class="item form-group">

                      

                        <label class="control-label col-md-3">Jumlah Pria <span style="color: red" class="required">*</span></label>

                      

                        <div class="col-md-6 col-sm-6 col-xs-12">

                      

                          <input id="registrasi_jumlah_lk" min="0" type="number" value="<?php echo $data['registrasi_jumlah_lk'] ?>" name="registrasi_jumlah_lk" class="form-control col-md-7 col-xs-12" required="required">

                     

                        </div>

                     

                      </div>



                       <div class="item form-group">

                     

                        <label class="control-label col-md-3">Jumlah Wanita <span style="color: red" class="required">*</span></label>

                     

                        <div class="col-md-6 col-sm-6 col-xs-12">

                     

                          <input id="registrasi_jumlah_pr" min="0" type="number" value="<?php echo $data['registrasi_jumlah_pr'] ?>" name="registrasi_jumlah_pr" class="form-control col-md-7 col-xs-12" required="required">

                     

                        </div>

                     

                      </div>

                    

                    </section>



                  

                  </div>

                

                </div>

              

              </div>



              <div class="col-md-12 col-sm-12 col-xs-12">



                  <div class="x_panel">



                    <div class="x_title">



                       <h2> OPSI KONSUMSI </h2>



                      <ul class="nav navbar-right panel_toolbox">



                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>



                        </li>



                      </ul>



                      <div class="clearfix"></div>



                    </div>



                    <div class="x_content">           



                    

                      <div class="item form-group">

                    

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Opsi Konsumsi <span style="color: red" class="required">*</span>

                    

                        </label>

                    

                        <div class="col-md-6 col-sm-6 col-xs-12">

                                

                              <select name="registrasi_opsi_makanan" required="required" id="registrasi_opsi_makanan" class="form-control col-md-7 col-xs-12">

                    

                                    <option value='<?php echo $data['registrasi_opsi_makanan'] ?>' >

                                      

                                      <?php 

                                        if ($data['registrasi_opsi_makanan']==1) {

                                          echo "Katering"; 

                                        }



                                        else

                                        {

                                          echo "Sendiri"; 

                                        }



                                      ?>

                                      </option>

                    

                                    <option value="1">Katering</option>

                    

                                    <option value="0">Sendiri</option>

                    

                                </select>   



                               

                    

                        </div>

                    

                      </div>

                    

                    </section>



                  

                  </div>

                

                </div>

              

              </div>



              <div class="col-md-12 col-sm-12 col-xs-12">



                  <div class="x_panel">



                    <div class="x_title">



                       <h2> STATUS PERSETUJUAN </h2>



                      <ul class="nav navbar-right panel_toolbox">



                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>



                        </li>



                      </ul>



                      <div class="clearfix"></div>



                    </div>



                    <div class="x_content">

                

                    

                      <div class="item form-group">

                    

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span style="color: red" class="required">*</span>

                    

                        </label>

                    

                        <div class="col-md-6 col-sm-6 col-xs-12">

                    

                                <select name="registrasi_status" required="required" id="registrasi_status" class="form-control col-md-7 col-xs-12">

                    

                                    <option value="<?php echo $data['registrasi_status'] ?>">



                                      <?php 

                                        if ($data['registrasi_status']==1) {

                                          echo "Accepted"; 

                                        }



                                        else

                                        {

                                          echo "not confirmed"; 

                                        }



                                      ?>



                                    </option>

                    

                                    <option value="0">not confirmed</option>

                    

                                    <option value="1">Accepted</option>

                    

                                </select>   

                    

                        </div>

                    

                      </div>

                    

                    </section>

                    

                      <div class="ln_solid"></div>

                    

                      <div class="form-group">

                    

                        <div class="col-md-6 col-md-offset-3">

                    

                          <a href="daftar_registrasi" class="btn btn-danger">

                    

                        <span class='glyphicon glyphicon-chevron-left'> Cancel</span>

                    

                       </a>

                    

                          <input type="hidden" name="action" value="edit_registrasi">

                          <button id="edit_registrasi" type="submit" onclick="konfirmasi()" name="edit_registrasi" value="edit_registrasi" style="float: right;" class="btn btn-success"><span class='glyphicon glyphicon-save'> Ubah</span></button>

                        

                        </div>

                      

                      </div>                 

                  

                  </div>

                

                </div>

              

              </div>

          

            </form>

            

            </div>

          

          </div>

        

        </div>

       

        <!-- /page content -->



         <!-- FOOTER -->

        <?php

       

            include('footer.php');

       

        ?>

        <!-- /FOOTER -->



<script>



    function konfirmasi()

            {

                tanya = confirm("Apakah data yang di tambah sudah benar ?");

                if (tanya == true) return true;

                else return false;

            }



    $('#myDatepicker').datetimepicker({

       format:'YYYY/MM/DD hh:mm:ss'

    });

    $('#myDatepicker1').datetimepicker({

       format:'YYYY/MM/DD hh:mm:ss'

    });



    // Pilihan Kota PIC

    $(document).ready(function() {

        var kota = <?php echo json_encode($array);?>;

        $("#registrasi_PIC_kota").select2({

          data: kota

        });

      });



  </script>

