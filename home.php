<?php

  error_reporting(0);

  include('header.php');

  include ('framework/functions/func_todolist.php');

// FUNGSI TODOLIST
    if (isset($_POST['todolist'])) 
    {
      echo insert_todolist($koneksi);
      return;
    }

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

  // function nama_jenis_tamu($id_jenis_tamu, $koneksi){

  //   $query = mysqli_query($koneksi, "SELECT * FROM tbl_jenis_tamu WHERE jenis_tamu_ID=$id_jenis_tamu");

  //   $jenis_tamu = mysqli_fetch_array($query);

  //   return $jenis_tamu['jenis_tamu_nama'];

  // }

  // function nama_jenis_kegiatan($id_jenis_kegiatan, $koneksi){

  //    $query = mysqli_query($koneksi, "SELECT * FROM tbl_jenis_kegiatan WHERE jenis_kegiatan_ID=$id_jenis_kegiatan");

  //    $jenis_kegiatan = mysqli_fetch_array($query);

  //    return $jenis_kegiatan['jenis_kegiatan_nama'];

  // }

  $task = mysqli_query($koneksi, "SELECT * FROM tbl_todolist");

  $query_pengguna = mysqli_query($koneksi, "SELECT pengguna_ID FROM tbl_pengguna");

  $count_pengguna = mysqli_num_rows($query_pengguna);


  $query_registrasi = mysqli_query($koneksi, "SELECT registrasi_ID, registrasi_waktu_datang, registrasi_waktu_pulang FROM tbl_registrasi");

  $count_registrasi = mysqli_num_rows($query_registrasi);

  $query_registrasi_blm_konfirmasi = mysqli_query($koneksi, "SELECT * FROM tbl_registrasi WHERE registrasi_status ='0'");

 

  $query_kegiatan = mysqli_query($koneksi, "SELECT jenis_kegiatan_ID FROM tbl_jenis_kegiatan");

  $count_kegiatan = mysqli_num_rows($query_kegiatan);

  $query_tamu = mysqli_query($koneksi, "SELECT jenis_tamu_ID FROM tbl_jenis_tamu");

  $count_tamu = mysqli_num_rows($query_tamu);

  //CHART

  $var1 = mysqli_num_rows(mysqli_query($koneksi, "SELECT id_jenis_tamu FROM tbl_registrasi WHERE id_jenis_tamu ='1'"));

  $var2 = mysqli_num_rows(mysqli_query($koneksi, "SELECT id_jenis_tamu FROM tbl_registrasi WHERE id_jenis_tamu ='2'"));

  $var3 = mysqli_num_rows(mysqli_query($koneksi, "SELECT id_jenis_tamu FROM tbl_registrasi WHERE id_jenis_tamu ='3'"));

  $var4 = mysqli_num_rows(mysqli_query($koneksi, "SELECT id_jenis_tamu FROM tbl_registrasi"));
  
?>

<?php 
                    

  date_default_timezone_set("Asia/Jakarta");

  $date_now = (new DateTime())->format('Y-m-d H:i:s');

  $_SESSION['Event'] = 0;
  $_SESSION['Event2'] = 0;
  $_SESSION['EventRun'] = 0;
  $_SESSION['EventEnd'] = 0;

  while ($data = mysqli_fetch_array($query_registrasi) ) {

      // ACARA SUDAH BERAKHIR
      if ($date_now > $data['registrasi_waktu_pulang'] ) 
      {

        $_SESSION['EventEnd']++   ;

      }

      // ACARA SEDANG BERJALAN
      elseif (($date_now > $data['registrasi_waktu_datang']) && ($date_now < $data['registrasi_waktu_pulang'])) 
      {

        $_SESSION['EventRun']++;
      
      }

      // ACARA BELUM MULAI
      elseif ($date_now < $data['registrasi_waktu_datang']) 
      {

        // JIKA ACARA AKAN DIMULAI < 2 HARI
        if ((strtotime($data['registrasi_waktu_datang']) - strtotime($date_now)) <172800) 
        {
          
          $_SESSION['Event2']++;
        
        }
        
        else 
        {

          $_SESSION['Event']++;

        }
         
      
      }

  }                                          

?>

<style type="text/css">

.blur > :not(#myModal) {
    -webkit-filter: blur(10px) grayscale(100%);
}

</style>

<!-- page content -->

<div class="right_col" role="main" id="blurtrigger3">

  <div class="row tile_count">

    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">

      <span class="count_top"><i class="fa fa-user"></i> Total Users/ Admin</span>

      <div class="count"><?php echo $count_pengguna; ?></div>

      <a href="daftar_pengguna"><i class="green">Klik Selengkapnya</span></i></a>

    </div>

    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">

      <span class="count_top"><i class="fa fa-folder-o"></i> Total Registrasi</span>

      <div class="count"><?php echo $count_registrasi; ?></div>

      <a href="daftar_registrasi"><i class="green">Klik Selengkapnya</span></i></a>

    </div>

    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">

      <span class="count_top"><i class="fa fa-user"></i> Jenis Kegiatan</span>

      <div class="count green"><?php echo $count_kegiatan; ?></div>

      <a href="jenis_kegiatan"><i class="green">Klik Selengkapnya</span></i></a>

    </div>

    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">

      <span class="count_top"><i class="fa fa-user"></i> Jenis Tamu</span>

      <div class="count"><?php echo $count_tamu; ?></div>

      <a href="jenis_tamu"><i class="green">Klik Selengkapnya</span></i></a>

    </div>

    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">

      <span class="count_top"><i class="fa fa-user"></i> Registrasi</span>

      <div>Belum Terkonfirmasi</div>

      <button style="margin-top: 10px" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Lihat Disini</
        button>
    
    </div>
    
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    
      <span class="count_top"><i class="fa fa-dollar"></i> Saldo keseluruhan </span>

      <?php
        $keuangan = mysqli_query($koneksi, "SELECT keuangan_masuk, keuangan_keluar FROM tbl_keuangan");

        $saldo = 0;
              while($dataSaldo = mysqli_fetch_array($keuangan)){

                $saldo += $dataSaldo['keuangan_masuk'] - $dataSaldo['keuangan_keluar'] ; 
              }
      ?>

      <div style="font-size: 20px"> <?php echo "Rp ".number_format($saldo); ?> </div>
    
      <a href="form_keuangan"><i class="green">Klik Selengkapnya</span></i></a>
    
    </div>
  
  </div>

  <div class="row">
  
    <div class="col-md-12 col-sm-12 col-xs-12">
  
      <div class="dashboard_graph">

        <div class="col-md-9 col-sm-9 col-xs-12">

          <div id="chart_plot_01" class="demo-placeholder">

             <div id="columnchart_values"></div>

          </div>

        </div>

        <div class="col-md-3 col-sm-3 col-xs-12 bg-white">

          <div class="x_title">

            <h2>Persentase Kunjungan Tamu</h2>

            <div class="clearfix"></div>

          </div>

          <div class="col-md-12 col-sm-12 col-xs-6">

            <div>

              <p>Mahasiswa/Pelajar</p>

              <div class="">

                <div class="progress progress_md" style="width: 100%;">

                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo ($var1/$var4)*100 ?>"><?php echo 
                  floor(($var1/$var4)*100)."%" ?></div>
              
                </div>
              
              </div>
            
            </div>
            
            <div>
            
              <p>Instansi</p>
            
              <div class="">
            
                <div class="progress progress_md" style="width: 100%;">
            
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo ($var2/$var4)*100 ?>"><?php echo floor(($var2/$var4)*100)."%" ?></div>
                
                </div>
              
              </div>
            
            </div>
          
          </div>
          
          <div class="col-md-12 col-sm-12 col-xs-6">
          
            <div>
          
              <p>Organisasi</p>
          
              <div class="">
          
                <div class="progress progress_md" style="width: 100%;">
          
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo ($var3/$var4)*100 ?>"><?php echo floor(($var3/$var4)*100)."%" ?></div>
                
                </div>
              
              </div>
            
            </div>
            
            <div>
            
              <p>Lain-lain</p>
            
              <div class="">
            
                <div class="progress progress_md" style="width: 100%;">
            
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo (($var4 - ($var1 + $var2 + $var3))/$var4)*100 ?>"><?php echo floor((($var4 - ($var1 + $var2 + $var3))/$var4)*100)."%"; ?></div>
                
                </div>
              
              </div>
            
            </div>
          
          </div>

        </div>

        <div class="clearfix"></div>
      
      </div>
    
    </div>

  </div>
  
  <p>

  <div class="row">

    <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Catatan</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li>

                        <div style="margin-right: 20px">

                          <div>

                              <button href="" class="btn btn-default" data-toggle="modal" data-target="#todolistModal"><span class='glyphicon glyphicon-plus-sign'><font color="black"> Tambahkan Catatan</font></span></button>

                          </div>

                        </div>

                      </li>
            <li style="float: right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <table id="datatable" class="table">
            
          <!-- header tabel -->
            <thead>
              <tr>
                <th width="20%"><center>Tanggal dibuat</th>
         
                <th width="70%"><center>Keterangan </th>
               
                <th><center>Delete</th>
              </tr>
            </thead>

            <tbody>
              <?php 

                date_default_timezone_set("Asia/Jakarta");

                $date_now = (new DateTime())->format('Y-m-d H:i:s');
                
                while ($todolist = mysqli_fetch_array($task)) {
                  $todolist_ID = $todolist['todolist_ID'];
                  echo "<tr>";
                  echo "<td><center>" .date("d/M/Y H:i:s", strtotime($todolist['todolist_dibuat'])) . "</td>";
                  

                  if ($todolist['todolist_status'] == 1) {

                      echo "<td><center><strike>" .$todolist['todolist_keterangan'] . "</strike></td>";
                  
                      echo "<td><center>

                        <a href='framework/functions/func_todolist?uncheck_todolist=$todolist_ID' onclick='return konfirmasiunCheck()' role='button' class='btn btn-danger btn-sm'>

                          <span class='fa fa-ban'></span>

                        </a> 

                      ";
                  
                  }

                  else {

                    echo "<td><center>" .$todolist['todolist_keterangan'] . "</td>";
                   
                    echo "<td><center>

                        <a href='framework/functions/func_todolist?check_todolist=$todolist_ID' onclick='return konfirmasiCheck()' role='button' class='btn btn-info btn-sm'>

                          <span class='fa fa-check'></span>

                        </a> 

                      ";
                  
                  }
                  echo "<center>

                      <a href='framework/functions/func_todolist?delete_todolist=$todolist_ID' onclick='return konfirmasi()' role='button' class='btn btn-danger btn-sm'>

                        <span class='glyphicon glyphicon-trash'></span>

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

    <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Keberlangsungan Acara</h2>
          <ul class="nav navbar-right panel_toolbox">
          
            <li style="float: right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <div class="col-xs-6">
            
            <strong>Status</strong> <p><p>
            
            <font style='margin-right: 8px' color='#29f213'><span class='fa fa-circle'></font></span>Sedang berlangsung :<p>

            <font style='margin-right: 8px'><span class='fa fa-circle'></font></span>Telah selesai :<p>

            <font style='margin-right: 8px' color='red'><span class='fa fa-circle'></font></span>Belum berjalan :<p>

            <font style='margin-right: 8px' color='orange'><span class='fa fa-circle'></font></span>Akan berjalan (H-2) :     

          </div>

          <div class="col-xs-3"><center>

            <strong>Jumlah Acara</strong> <p><p>
            
            <?php echo $_SESSION['EventRun']. '<p>'; ?>

            <?php echo $_SESSION['EventEnd']. '<p>'; ?>

            <?php echo $_SESSION['Event']. '<p>'; ?>

            <?php echo $_SESSION['Event2']; ?>
          
          </div></center>
           
        </div>
      </div>
    </div>

  </div>

</div>
        
<!-- /page content -->


<!-- MODAL REGISTRASI -->

<div class="container-modal">
 
  <div class="modal fade" id="myModal" role="dialog"  >
 
    <div class="modal-dialog"  style="width: 870px;" >
    
<!-- Modal content-->
     
      <div class="modal-content">
 
        <div class="modal-header" style="background-color: #2A3F54; color: white" >
 
          <a href="daftar_registrasi" class="btn btn-default pull-right">Selengkapnya</a>
 
          <h4 class="modal-title"><i class="fa fa-folder-o"></i><strong> Registrasi (Not Confirmed)</strong></h4>
 
        </div>
 
        <div class="modal-body">
 
             <table id="datatable" class="table table-striped">

               <thead>

                <tr>

                  <th><center>ID Registrasi</th>

                  <th><center>Tanggal</th>

                  <th><center>PIC</th>

                  <th><center>Status </th>

                  <th><center>Aksi</th>

                </tr>

              </thead>

              <tbody>

                <?php  
                
                  while ( $row_registrasi = mysqli_fetch_array($query_registrasi_blm_konfirmasi)) {

                    $id_registrasi = $row_registrasi['registrasi_ID'];

                    $id_jenis_tamu = $row_registrasi['id_jenis_tamu'];

                    $id_jenis_kegiatan = $row_registrasi['id_jenis_kegiatan'];

                    echo "<tr>";

                    echo "<td><center>". $row_registrasi['registrasi_ID'] . "</td>";

                    echo "<td><center>". $row_registrasi['registrasi_waktu_datang'] ." s/d ". $row_registrasi['registrasi_waktu_datang'] . "</td>";

                    echo "<td><center>". $row_registrasi['registrasi_PIC_nama'] . "</td>";

                    if ($row_registrasi['registrasi_status'] == 0) {

                      echo "<td><center><strong><font color='red'>Not Confirmed</td>" ;

                    }

                    else {
                      
                      echo "<td><center><strong>Accepted</td>" ;
                      
                    }

// BUTTON EDIT DAN DELETE
                   
                      echo "<td><center>

                        <a href='ubah_registrasi?id_registrasi=$id_registrasi' class='btn btn-info btn-sm'><span class='glyphicon glyphicon-edit'> Edit</span></a>
                      
                         <a href='framework/functions/func_tamu?delete_regis=$id_registrasi' onclick='return konfirmasi()' role='button' class='btn btn-danger btn-sm'> <span class='glyphicon glyphicon-trash'> Delete</span>

                        </a>

                      </td>";

                    echo "</tr>";
                
                  }

               ?>

              </tbody>
            
            </table> 
      
        </div>
      
        <div class="modal-footer">
      
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      
        </div>
      
      </div>
      
    </div>
  
  </div>

</div>
  

<!-- FOOTER -->

<?php

 include('footer.php');

?>

<!-- /FOOTER -->

<script type="text/javascript" src="assets\js\loader.js"></script>

<script type="text/javascript" language="JavaScript">

  function konfirmasi()

  {

      tanya = confirm("Anda Yakin Akan Menghapus Data ?");

      if (tanya == true) return true;

      else return false;

  }

   function konfirmasiCheck()

  {

      tanya = confirm("Ingin menutup catatan ?");

      if (tanya == true) return true;

      else return false;

  }

     function konfirmasiunCheck()

  {

      tanya = confirm("Ingin membuka catatan ?");

      if (tanya == true) return true;

      else return false;

  }

// PEMANGGILAN FUNGSI BLUE PADA MODAL

  $('#myModal').on('show.bs.modal', function () {
    $('#blurtrigger1').addClass('blur'),
    $('#blurtrigger2').addClass('blur'),
    $('#blurtrigger3').addClass('blur');
  })

  $('#myModal').on('hide.bs.modal', function () {
    $('#blurtrigger1').removeClass('blur'),
    $('#blurtrigger2').removeClass('blur'),
    $('#blurtrigger3').removeClass('blur');
  })

// PEMANGGILAN GRAFIK

  google.charts.load("current", {packages:['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ["Element", "Jumlah", { role: "style" } ],
      ["Mahasiswa/Pelajar", <?php echo $var1; ?>, "#008080"],
      ["Instansi", <?php echo $var2; ?>, "#008080"],
      ["Organisasi", <?php echo $var3; ?>, "#008080"],
      ["Lain-lain", <?php echo ($var4 - ($var1 + $var2 + $var3)); ?>, "color: #008080"]
    ]);

    var view = new google.visualization.DataView(data);

    var options = {
      title: "Jumlah Pengunjung Berdasarkan Jenis Tamu",
      height: 280,
      bar: {groupWidth: "50%"},
      legend: { position: "none" },
    };

    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
    chart.draw(view, options);
  }

// RESIZE GRAFIK

  $(window).resize(function(){
     drawChart();
  });

</script>


<!-- MODAL PEMASUKKAN -->

<div class="container-modal">

  <div class="modal fade" id="todolistModal" role="dialog"  >
    
    <div class="modal-dialog"  style="width: 550px;" >
    
      <!-- Modal content-->
    
      <div class="modal-content">
    
        <div class="modal-header" style="background-color: #2A3F54; color: white" >
          
          <h4 class="modal-title"><i class="fa fa-dollar"></i><strong> Form Tambah Catatan</strong></h4>
    
        </div>
    
        <div class="modal-body">

          <form method="post" class="form-horizontal" action="">

            <!-- FORM INPUT CATATAN -->

            <div class="item form-group">

              <div class="col-md-12 col-sm-6 col-xs-12">

                <label for="catatan_keluar">Catatan <font style="color: red">*</font> :</label>
                
                <textarea rows="5" name="todolist" id="todolist" placeholder="Masukkan keterangan" 
                  class="form-control" required="required"></textarea>

                <input type="hidden" name="dateNow" value="<?php echo $date_now ?>">

              </div>

            </div>

             <div class="col-md-12 col-sm-6 col-xs-12"> 
                
               <button type="submit" style="margin-top: 20px;" class="btn btn-success"><span class='glyphicon glyphicon-save'> Tambah Catatan</span></button>

             </div>

           </form> 
       
        </div>
       
        <div class="modal-footer">
       
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
        </div>
      
      </div>
    
    </div>
    
  </div>
    
</div>
