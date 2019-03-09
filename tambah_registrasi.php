<?php

include('header.php');

include('framework/functions/func_tamu.php');

?>

        <!-- page content -->

        <div class="right_col" role="main">

          <div class="">

            <div class="page-title">

              <div class="title_left">

                <h3>Registrasi Tamu Baru</h3>

              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">

              <form class="form-horizontal form-label-left" id="myForm" novalidate action="?action=insert_registrasi" method="post">

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


                      <div class="item form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="acara_mulai">Acara mulai <span style="color: red" class="
                          required">*</span></label>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                          <div class='input-group date' id='myDatepicker'>
                        
                            <input type='text' id="myDatepicker" name="registrasi_waktu_datang" id="registrasi_waktu_datang" placeholder="Masukkan tanggal dan waktu" 
                            class="form-control" required="required" readonly="readonly">
                            
                            <span class="input-group-addon">
                            
                               <span class="glyphicon glyphicon-calendar"></span>
                            
                            </span>
                        </div>
                        
                        </div>
                      
                      </div>



                      <div class="item form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="acara_berakhir">Acara berakhir <span style="color: red" class
                          ="required">*</span></label>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                          <div class='input-group date' id='myDatepicker1'>
                        
                            <input type='datetimepicker' name="registrasi_waktu_pulang" id="registrasi_waktu_pulang" class="form-control" required
                            ="required" placeholder="Masukkan tanggal dan waktu" readonly="readonly">
                            
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

                          <input id="registrasi_PIC_nama" type="text" name="registrasi_PIC_nama" class="form-control col-md-7 col-xs-12" required="
                          required">
                     
                        </div>
                    
                      </div>

                     
                      <div class="item form-group">
                      
                        <label for="password" class="control-label col-md-3">Nomor Telepon <span style="color: red" class="required">*</span></label>
                      
                        <div class="col-md-6 col-sm-6 col-xs-12">
                      
                          <input id="registrasi_PIC_telp" type="number" name="registrasi_PIC_telp" class="form-control col-md-7 col-xs-12" required="
                          required">
                        
                        </div>
                      
                      </div>

                      <div class="item form-group">
                      
                        <label class="control-label col-md-3">Email <span style="color: red" class="required">*</span></label>
                      
                        <div class="col-md-6 col-sm-6 col-xs-12">
                      
                          <input id="registrasi_PIC_email" type="email" name="registrasi_PIC_email" class="form-control col-md-7 col-xs-12" required="required">
                      
                        </div>
                      
                      </div>

                      <div class="item form-group">
                      
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Alamat <span style="color: red" class="required">*

                        </span>
                        
                        </label>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                          <textarea id="registrasi_PIC_alamat" required="required" name="registrasi_PIC_alamat" class="form-control col-md-7 col-xs-12" placeholder="Alamat lengkap"></textarea>
                        
                        </div>

                      </div>

                      <div class="item form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kota/Kabupaten <span style="color: red" class="required">*</span>

                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                                <select name="registrasi_PIC_kota" id="registrasi_PIC_kota" required="required" class="form-control col-md-7 col-xs-12" required="required" >

                                    <option value="">-Pilih Kota/Kabupaten-</option>
                                    
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

                                <select name="id_jenis_kegiatan" required="required" id="jenis_kegiatan" class="form-control 
                                col-md-7 col-xs-12">
                                
                                    <option value='' >-Pilih Jenis Kegiatan-</option>

                                    <?php
                                      $query_kegiatan = mysqli_query($koneksi,"SELECT * FROM tbl_jenis_kegiatan");
                                      
                                      while ($row_kegiatan = mysqli_fetch_array($query_kegiatan)) {
                                      
                                      ?>
                                          <option id="id_jenis_kegiatan" value="<?php echo $row_kegiatan['jenis_kegiatan_ID']; ?>">
                                          
                                              <?php echo $row_kegiatan['jenis_kegiatan_nama']; ?>
                                          
                                          </option>
                                      
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
                      
                                    <option value='' >-Pilih Jenis Tamu-</option>

                                    <?php
                                      $query = mysqli_query($koneksi,"SELECT * FROM tbl_jenis_tamu");

                                      while ($row = mysqli_fetch_array($query)) {
                                      ?>
                                          <option id="id_jenis_tamu" value="<?php echo $row['jenis_tamu_ID']; ?>">
                                              <?php echo $row['jenis_tamu_nama']; ?>
                                          </option>
                                      <?php
                                      }
                                      ?>
                      
                                </select>   
                        
                        </div>
                      
                      </div>

                       <div class="item form-group">
                      
                        <label class="control-label col-md-3">Jumlah Pria <span style="color: red" class="required">*</span></label>
                      
                        <div class="col-md-6 col-sm-6 col-xs-12">
                      
                          <input id="registrasi_jumlah_lk" min="0" type="number" name="registrasi_jumlah_lk" class="form-control col-md-7 col-xs-12" required="required">
                     
                        </div>
                     
                      </div>

                       <div class="item form-group">
                     
                        <label class="control-label col-md-3">Jumlah Wanita <span style="color: red" class="required">*</span></label>
                     
                        <div class="col-md-6 col-sm-6 col-xs-12">
                     
                          <input id="registrasi_jumlah_pr" min="0" type="number" name="registrasi_jumlah_pr" class="form-control col-md-7 col-xs-12" required="required">
                     
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
                    
                                    <option value=''>-Pilih konsumsi-</option>
                    
                                    <option value="1">Katering</option>
                    
                                    <option value="0">Bawa Sendiri</option>
                    
                                </select>   

                                <!-- <input type="hidden" name="id_pola_menu_makanan" value="1"> -->
                    
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
                    
                                    <option value="">---Pilih Status---</option>
                    
                                    <option value="0">not confirmed</option>
                    
                                    <option value="1">Accepted</option>
                    
                                </select>   
                    
                        </div>
                    
                      </div>
                    
                    </section>
                    
                      <div class="ln_solid"></div>
                    
                      <div class="form-group">
                    
                        <div class="col-md-6 col-md-offset-3">
                    
                          <a href="daftar_registrasi" class="btn btn-danger" style="float: right;">
                    
                        <span class='glyphicon glyphicon-chevron-left'> Kembali</span>
                    
                       </a>
                    
                          <button type="reset" class="btn btn-default">Reset</button>
                          
                          <input type="hidden" name="action" value="submit_registrasi">
                          <button id="submit_registrasi" type="submit" onclick="konfirmasi()" name="submit_registrasi" value="submit_registrasi" style="float: right;" class="btn btn-success"><span class='glyphicon glyphicon-floppy-disk'> Submit</span></button>
                        
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
       format:'YYYY/MM/DD HH:mm',
       ignoreReadonly: true,
       allowInputToggle: true
    });

    $('#myDatepicker1').datetimepicker({
       format:'YYYY/MM/DD HH:mm',
       ignoreReadonly: true,
       allowInputToggle: true
    });

    // Pilihan Kota PIC
    $(document).ready(function() {
        var kota = <?php echo json_encode($array);?>;
        $("#registrasi_PIC_kota").select2({
          data: kota
        });
      });

  </script>
