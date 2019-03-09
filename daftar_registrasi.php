<?php
  
  include('header.php');
  
  $query = mysqli_query($koneksi, "SELECT * FROM tbl_registrasi");

  function cek_rombongan($id_registrasi, $koneksi){
    
    $query = mysqli_query($koneksi, "SELECT id_registrasi FROM tbl_rombongan WHERE id_registrasi=$id_registrasi");

    $count = mysqli_num_rows($query);
    
    if ($count > 0) {
     
      return 1;
    
    }

    else {

      return 0;
    
    }
  
  }

  function nama_jenis_tamu($id_jenis_tamu, $koneksi){

    $query = mysqli_query($koneksi, "SELECT * FROM tbl_jenis_tamu WHERE jenis_tamu_ID=$id_jenis_tamu");

    $jenis_tamu = mysqli_fetch_array($query);

    return $jenis_tamu['jenis_tamu_nama'];

  }

  function nama_jenis_kegiatan($id_jenis_kegiatan, $koneksi){

     $query = mysqli_query($koneksi, "SELECT * FROM tbl_jenis_kegiatan WHERE jenis_kegiatan_ID=$id_jenis_kegiatan");

     $jenis_kegiatan = mysqli_fetch_array($query);

     return $jenis_kegiatan['jenis_kegiatan_nama'];

  }

?>

        <!-- page content -->

        <div class="right_col" role="main">

          <div class="">

            <div class="page-title">

              <div class="title_left">

                <h3>Halaman Administrator <small>Basis Data</small></h3>

              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">

                    <h2>Daftar Registrasi<small>Administrator</small></h2>

                    <ul class="nav navbar-right panel_toolbox">

                      <li>

                        <div style="margin-right: 20px">

                          <div>

                              <a href="tambah_registrasi.php" class="btn btn-default"><span class='glyphicon glyphicon-plus-sign'><font color="black"> Tambahkan Registrasi</font></span></a>

                          </div>

                        </div>

                      </li>

                      <li style="float: right;"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>

                      </li>

                    </ul>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content animated fadeIn">

                      <table id="datatable-responsive" class="table table-striped dt-responsive nowrap" width="100%">
                      
                      <thead>
                      
                        <tr>
                      
                          <th><center>No. </th>

                          <th><center>ID Registrasi</th>
                      
                          <th><center>Waktu Kedatangan </th>
                      
                          <th><center>Waktu Kepulangan </th>
                      
                          <th><center>Nama PIC </th>
                      
                          <th><center>Telepon PIC </th>
                      
                          <th><center>Email PIC </th>
                      
                          <th>Alamat PIC </th>
                      
                          <th>Kota PIC </th>
                      
                          <th>Jenis kegiatan </th>
                      
                          <th>Jenis Tamu </th>
                      
                          <th>Jumlah Pria </th>
                      
                          <th>Jumlah Wanita </th>
                      
                          <th>Daftar rombongan </th>
                      
                          <th>Opsi Konsumsi </th>
                      
                          <th>Pola Konsumsi </th>
                      
                          <th>Status </th>
                      
                          <th>Aksi</th>
                      
                        </tr>
                      
                      </thead>
                      
                      <tbody>
                      
                        <?php 
                      
                          $a = 1;

                          date_default_timezone_set("Asia/Jakarta");

                          $date_now = (new DateTime())->format('Y-m-d H:i:s');

                          while ($data = mysqli_fetch_array($query) ) {
               
                              $id_registrasi = $data['registrasi_ID'];

                              $id_jenis_tamu = $data['id_jenis_tamu'];

                              $id_jenis_kegiatan = $data['id_jenis_kegiatan'];

                              // echo cek_rombongan($id_registrasi, $koneksi);

                              echo "<tr>";
                      
                              echo "<td>". $a++. "</td>" ;

                              // ACARA SUDAH BERAKHIR
                              if ($date_now > $data['registrasi_waktu_pulang'] ) 
                              {
                              
                                echo "<td><center><font size='4px' style='margin-right: 8px'><span class='fa fa-circle'></font><strong> " . $id_registrasi . "</span></td>" ;
                              
                              }

                              // ACARA SEDANG BERJALAN
                              elseif (($date_now > $data['registrasi_waktu_datang']) && ($date_now < $data['registrasi_waktu_pulang'])) 
                              {
                              
                                echo "<td><center><font size='4px' style='margin-right: 8px' color='#29f213'><span class='fa fa-circle'></font><strong> " . $id_registrasi . "</span></td>";
                              
                              }

                              // ACARA BELUM MULAI
                              elseif ($date_now < $data['registrasi_waktu_datang']) 
                              {

                                // JIKA ACARA AKAN DIMULAI < 2 HARI
                                if ((strtotime($data['registrasi_waktu_datang']) - strtotime($date_now)) <172800) 
                                {
                                 
                                  echo "<td><center><font size='4px' style='margin-right: 8px' color='orange'><span class='fa fa-circle'></font><strong> " . $id_registrasi . "</span></td>" ; 
                                
                                }
                                
                                else 
                                {

                                  echo "<td><center><font size='4px' style='margin-right: 8px' color='red'><span class='fa fa-circle'></font><strong> " . $id_registrasi . "</span></td>" ;  

                                }
                                 
                              
                              }


                              echo "<td><center>" . date('d/M/Y H:i:s', strtotime($data['registrasi_waktu_datang'])) . "</td>" ;
                      
                              echo "<td><center>" . date('d/M/Y H:i:s', strtotime($data['registrasi_waktu_pulang'])) . "</td>" ;
                      
                              echo "<td><center>" . $data['registrasi_PIC_nama'] . "</td>" ;
                      
                              echo "<td><center>" . $data['registrasi_PIC_telp'] . "</td>" ;
                      
                              echo "<td><center>" . $data['registrasi_PIC_email'] . "</td>" ;
                      
                              echo "<td><center>" . $data['registrasi_PIC_alamat'] . "</td>" ;
                      
                              echo "<td><center>" . $data['registrasi_PIC_kota'] . "</td>" ;
                      
                              // JENIS KEGIATAN
                              echo "<td><center>" . nama_jenis_kegiatan($id_jenis_kegiatan, $koneksi) . "</td>" ;       
                              
                              // JENIS TAMU
                              echo "<td><center>" . nama_jenis_tamu($id_jenis_tamu, $koneksi) . "</td>" ;

                      
                              echo "<td><center>" . $data['registrasi_jumlah_lk'] . " Orang</td>" ;
                      
                              echo "<td><center>" . $data['registrasi_jumlah_pr'] . " Orang</td>" ;

                              if (cek_rombongan($id_registrasi, $koneksi) == 1) {
                                 echo "<td><center><a href='form_tabel_rombongan?id_registrasi=$id_registrasi' class='btn btn-info btn-sm'> Lihat disini</a></td>" ;
                              }

                              else {
                                echo "<td><center><a href='form_tabel_rombongan?id_registrasi=$id_registrasi' class='btn btn-danger btn-sm'> Belum Terisi</a></td>" ;
                              }
                              
                              // FIELD NAMA OPSI MAKANAN/ KONSUMSI

                              if ($data['registrasi_opsi_makanan'] == 1) {
                                echo "<td><center> Katering </td> ";
                              }
                              
                              else {
                                echo "<td><center> Bawa Sendiri </td>" ;
                              }
                              
                              // OPSI POLA KONSUMSI
                              if ($data['registrasi_opsi_makanan'] == 0)
                              {

                                echo "<td><center><a class='btn btn-default btn-sm' disabled>Lihat disini</a></td>" ;
                              
                              } 

                              else {
                                echo "<td><center><a href='form_pola_makan?id_registrasi=$id_registrasi' class='btn btn-info btn-sm'>Lihat disini</a></td>" ;
                              }
                                       
                              
                              // STATUS REGISTRASI
                              if ($data['registrasi_status'] == 0) 
                              {

                                echo "<td><center><strong><font color='red'>Not Confirmed</td>" ;

                              }

                              else 
                              {
                                
                                echo "<td><center><strong>Accepted</td>" ;
                                
                              }
                                                                                   
                              // BUTTON EDIT DAN DELETE
                              echo "<td><center>

                                <a href='ubah_registrasi?id_registrasi=$id_registrasi' class='btn btn-info btn-sm'><span class='glyphicon glyphicon-edit'> Edit</span></a>
                              
                                 <a href='framework/functions/func_tamu?delete_regis=$id_registrasi' onclick='return konfirmasi()' role='button' class='btn btn-danger btn-sm'> <span class='glyphicon glyphicon-trash'> Delete</span>

                                </a>

                              </td>";

                              echo '</tr>';
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