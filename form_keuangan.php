<?php

include('header.php');

include('framework/functions/func_keuangan.php');

$queryPemasukan = mysqli_query($koneksi, "SELECT keuangan_ID,keuangan_masuk, keuangan_tanggal, keuangan_catatan FROM tbl_keuangan WHERE keuangan_masuk > 0");

$queryPengeluaran = mysqli_query($koneksi, "SELECT keuangan_ID,keuangan_keluar, keuangan_tanggal, keuangan_catatan FROM tbl_keuangan WHERE keuangan_keluar > 0");

$bulan = $_POST['bulan'];

$tahun = $_POST['tahun'];

$keuangan = mysqli_query($koneksi, "SELECT * FROM tbl_keuangan WHERE month(keuangan_tanggal)='$bulan' AND year(keuangan_tanggal)='$tahun'"); 

?>

<style type="text/css">

.blur > :not(#myModal) {
   
    -webkit-filter: blur(10px) grayscale(100%);

}

</style>

<!-- page content -->

        <div class="right_col" role="main" id="blurtrigger3">

          <div class="">

            <div class="page-title"></div>

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

              </div>

            </div>

<!-- TABEL PEMASUKKAN -->

          <div class="row">

              <div class="col-md-6 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">

                    <h2>Pemasukan Keseluruhan</h2>

                    <ul class="nav navbar-right panel_toolbox">

                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>

                      </li>

                    </ul>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content animated fadeIn">

                    <table id="datatable" class="table table-striped">

                    <thead>

                    <tr>

                    	<th><center>Tanggal</th>

                    	<th><center>Pemasukkan</th>

                    	<th><center>Catatan</th>

                    	<th><center>Aksi</th>

                    </thead>

                    <tbody>

                        <?php 

                          $totalpemasukkan = 0;
                         
                          while($data = mysqli_fetch_array($queryPemasukan)){

                          	$id = $data['keuangan_ID'];

                            echo "<tr>";

                            echo "<td><center>" . date('d/M/Y', strtotime($data['keuangan_tanggal'])) . "</td>";

                            echo "<td><center>RP " . number_format($data['keuangan_masuk']) . "</td>";

                            if ($data['keuangan_catatan']) {
                         
                            	echo "<td><center>" . $data['keuangan_catatan'] . "</td>";
                         
                            }
                         
                            else {
                         
                            	echo "<td><center>_</td>";
                         
                            }

                            echo "<td>
                                    <a href='framework/functions/func_keuangan?delete_keuangan=$id' onclick='return konfirmasi()' role='button' class='btn btn-danger btn-sm'>

                                      <span class='glyphicon glyphicon-trash'></span>

                                    </a></td>";

                            echo "</tr>";
                            
                            $totalpemasukkan += $data['keuangan_masuk']; 

                          }

                          echo "Total Pemasukkan : Rp " .number_format($totalpemasukkan);

                        ?>

                      </tbody>

                    </table>

                     <button class="btn-sm btn btn-info" data-toggle="modal" data-target="#myModal">Tambahkan Pemasukkan</button>

                  </div>

                </div>

              </div>

<!-- TABEL PENGELUARAN -->

              <div class="col-md-6 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">

                    <h2>Pengeluaran Keseluruhan</h2>

                    <ul class="nav navbar-right panel_toolbox">

                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>

                      </li>

                    </ul>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content animated fadeIn">

                    <table id="datatable1" class="table table-striped">

                    <thead>

                    <tr>

                    	<th><center>Tanggal</th>

                    	<th><center>Pengeluaran</th>

                    	<th><center>Catatan</th>

                    	<th><center>Aksi</th>

                    </thead>

                    <tbody>
                       
                        <?php 

                          $totalpengeluaran = 0;
                         
                          while($data = mysqli_fetch_array($queryPengeluaran)){

                          	$id = $data['keuangan_ID'];

                            echo "<tr>";

                            echo "<td><center>" . date('d/M/Y', strtotime($data['keuangan_tanggal'])) . "</td>";

                            echo "<td><center>Rp " . number_format($data['keuangan_keluar']) . "</td>";

                            if ($data['keuangan_catatan']) {
                          
                            	echo "<td><center>" . $data['keuangan_catatan'] . "</td>";
                          
                            }
                          
                            else {
                          
                            	echo "<td><center>_</td>";
                          
                            }

                             echo "<td>
                                    <a href='framework/functions/func_keuangan?delete_keuangan=$id' onclick='return konfirmasi()' role='button' class='btn btn-danger btn-sm'>

                                      <span class='glyphicon glyphicon-trash'></span>

                                    </a></td>";

                            echo "</tr>";
                            
                            $totalpengeluaran += $data['keuangan_keluar']; 

                          }

                          echo "Total Pengeluaran : Rp " .number_format($totalpengeluaran);

                        ?>

                    </tbody>

                    </table>

                    <button class="btn-sm btn btn-info" data-toggle="modal" data-target="#myModal1">Tambahkan Pengeluaran</button>

                  </div>

                </div>

              </div>
    
             </div>

           </div>

<!-- KEUANGAN BULAN DAN TAHUN -->

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">              
                      
                      <form method="post" class="form-horizontal" action="form_keuangan.php">

                        <div class="item form-group">

                          <div class="col-md-3 col-sm-3 col-xs-3">
                            
                            <label for="bulan">Bulan:</label>

                            <select name="bulan" id="bulan" class="form-control">
                            
                              <option value="01">Januari</option>
                            
                              <option value="02">Februari</option>
                            
                              <option value="03">Maret</option>
                            
                              <option value="04">April</option>
                            
                              <option value="05">Mei</option>
                            
                              <option value="06">Juni</option>
                            
                              <option value="07">Juli</option>
                            
                              <option value="08">Agustus</option>
                            
                              <option value="09">September</option>
                            
                              <option value="10">Oktober</option>
                            
                              <option value="11">November</option>
                            
                              <option value="12">Desember</option>
                            
                            </select>

                          </div>
                          
                          <div class="col-md-3 col-sm-3 col-xs-3">

                            <label for="tahun">Tahun:</label>
                            
                              <select name="tahun" id="tahun" class="form-control">
                            
                                <?php 

                                  $qry = mysqli_query($koneksi, "SELECT keuangan_tanggal FROM tbl_keuangan GROUP BY year(keuangan_tanggal)");
                            
                                  while ($tahun = mysqli_fetch_array($qry)) {
                            
                                    $data = explode('-', $tahun['keuangan_tanggal']);
                            
                                    $tahun = $data[0];
                            
                                    echo "<option value='$tahun'>".$tahun."</option>";
                            
                                  }

                            
                                 ?>
                            
                              </select>
                            
                            </div>
                            
                            <button type="submit" style="margin: 20px;" class="btn btn-info btn-md">Proses</button>

                          </div>
                       
                      </form>

                    <h2>Laporan Keuangan Berdasarkan Bulan dan Tahun</h2>
                    
                    <ul class="nav navbar-right panel_toolbox">

                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>

                      </li>

                    </ul>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">


                    <table id="datatable2" class="table table-striped">

                      
                    <!-- header tabel -->

                      <thead>

                        <tr>

                          <th><center>No</th>

                          <th><center>Tanggal</th>

                          <th><center>Pemasukkan</th>

                          <th><center>Pengeluaran</th>

                          <th><center>Catatan</th>

                        </tr>

                      </thead>


                      <tbody>

                        <?php                     

                        $no = 1;

                        $count_pemasukkan = 0;

                        $count_pengeluaran = 0;

                        $array = [];

                        while ($uang = mysqli_fetch_array($keuangan)) {

                          $count_pemasukkan += $uang['keuangan_masuk']; 

                          $count_pengeluaran += $uang['keuangan_keluar'];

                          echo "<tr>";

                          echo "<td><center>" . $no++ . "</td>";                          

                          echo "<td><center>" . date('d/M/Y', strtotime($uang['keuangan_tanggal'])) . "</td>";

                          echo "<td><center>Rp " . number_format($uang['keuangan_masuk']) . "</td>";

                          echo "<td><center>Rp " . number_format($uang['keuangan_keluar']) . "</td>";

                          echo "<td><center>" . $uang['keuangan_catatan'] . "</td>";

                          echo "</tr>";                   
                        
                        }     

                        echo "Pemasukkan: Rp" . number_format($count_pemasukkan) . "<p>";
                        
                        echo "Pengeluaran: Rp" . number_format($count_pengeluaran) . "<p>";

                        if (($count_pemasukkan - $count_pengeluaran) > 0) {
                         
                          echo "Saldo: Rp <font color='green'><strong>" . number_format($count_pemasukkan - $count_pengeluaran) . "</font><p>";
                        
                        }

                        else {
                        
                          echo "Saldo: Rp <font color='red'><strong>" . number_format($count_pemasukkan - $count_pengeluaran) . "</font><p>";
                        
                        }

                        ?>            

                      </tbody>

                    </table>

                  </div>

                </div>

              </div>

            </div>

<!-- GRAFIK KEUANGAN TAHUNAN -->            

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">              
                      
                      <h2>Grafik Keuangan Tahunan</h2>

                    <ul class="nav navbar-right panel_toolbox">

                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>

                      </li>

                    </ul>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                    <div id="chart_div1" class="demo-placeholder"></div>

                  </div>

                </div>

              </div>

            </div>
          
          </div>
        



<!-- /page content -->


<!-- MODAL PEMASUKKAN -->

<div class="container-modal">

  <div class="modal fade" id="myModal" role="dialog"  >
    
    <div class="modal-dialog"  style="width: 550px;" >
    
      <!-- Modal content-->
    
      <div class="modal-content">
    
        <div class="modal-header" style="background-color: #2A3F54; color: white" >
          
          <h4 class="modal-title"><i class="fa fa-dollar"></i><strong> Form Tambah Pemasukkan</strong></h4>
    
        </div>
    
        <div class="modal-body">

          <form method="post" class="form-horizontal" action="?action=insert_keuangan">

            <!-- FORM INPUT CATATAN -->

            <div class="item form-group">

              <div class="col-md-12 col-sm-6 col-xs-12">

                <label for="catatan_keluar">Catatan Pemasukan <font style="color: red">*</font> :</label>
                
                <textarea rows="5" name="keuangan_catatan" id="keuangan_catatan" placeholder="Masukkan keterangan" 
                  class="form-control" required="required"></textarea>

              </div>

            </div>

            <!-- FORM INPUT TANGGAL -->

            <div class="item form-group pull-right">

              <div class="col-md-6 col-sm-6 col-xs-12">

                <label for="keuangan_tanggal">Tanggal <font style="color: red">*</font> :</label>
                
                <div class='input-group date' id='myDatepicker'>
              
                  <input type='text' name="keuangan_tanggal" id="keuangan_tanggal" placeholder="Masukkan tanggal" 
                  class="form-control" required="required" />
                  
                  <span class="input-group-addon">
                  
                     <span class="glyphicon glyphicon-calendar"></span>
                  
                  </span>
              
                </div>

              </div>
      
              <!-- FORM INPUT NOMINAL PEMASUKKAN -->

              <div class="input-group col-md-6 col-sm-6 col-xs-12">

                <label for="pola_cemilan1">Nominal Pemasukan :</label>

                <input type="text" class="money form-control" name="keuangan_masuk" id="keuangan_masuk" placeholder="Rp."></span>

              </div>

             <div class="col-md-12 col-sm-6 col-xs-12"> 
         
               <input type="hidden" name="action" value="submit_keuangan">
                
               <button id="submit_keuangan" type="submit" name="submit_keuangan" value="submit_keuangan" style="margin-top: 20px;" class="btn btn-success"><span class='glyphicon glyphicon-save'> Tambah Pemasukkan</span></button>

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



<!-- MODAL PENGELUARAN -->

<div class="container-modal">

  <div class="modal fade" id="myModal1" role="dialog"  >

    <div class="modal-dialog"  style="width: 550px;" >
    
      <!-- Modal content-->

      <div class="modal-content">

        <div class="modal-header" style="background-color: #2A3F54; color: white" >
          
          <h4 class="modal-title"><i class="fa fa-dollar"></i><strong> Form Tambah Pengeluaran</strong></h4>

        </div>

        <div class="modal-body">

          <form method="post" class="form-horizontal" action="?action=insert_keuangan">

            <!-- FORM INPUT CATATAN -->

            <div class="item form-group">

              <div class="col-md-12 col-sm-6 col-xs-12">

                <label for="catatan_keluar">Catatan Pengeluaran <font style="color: red">*</font> :</label>
                
                <textarea rows="5" name="keuangan_catatan" id="keuangan_catatan" placeholder="Masukkan keterangan" 
                  class="form-control" required="required"></textarea>
            
              </div>

            </div>

            <!-- FORM INPUT TANGGAL -->

            <div class="item form-group pull-right">

              <div class="col-md-6 col-sm-6 col-xs-12">

                <label for="keuangan_tanggal">Tanggal <font style="color: red">*</font> :</label>
                
                <div class='input-group date' id='myDatepicker1'>
              
                  <input type='text' name="keuangan_tanggal" id="keuangan_tanggal" placeholder="Masukkan tanggal" class="form-control" required="required" />
                  
                  <span class="input-group-addon">
                  
                     <span class="glyphicon glyphicon-calendar"></span>
                  
                  </span>
              
                </div>

            </div>
           
            <!-- FORM INPUT NOMINAL PENGELUARAN -->

            <div class="col-md-6 col-sm-6 col-xs-12">

              <label for="pola_cemilan1">Nominal Pengeluaran :</label>

              <input type="text" class="money form-control" name="keuangan_keluar" id="keuangan_keluar" placeholder="Rp.">

            </div>

            <div class="col-md-12 col-sm-6 col-xs-12"> 
         
              <input type="hidden" name="action" value="submit_keuangan">
              
              <button id="submit_keuangan" type="submit" name="submit_keuangan" value="submit_keuangan" style="margin-top: 20px;" class="btn btn-success"><span class='glyphicon glyphicon-save'> Tambah Pengeluaran</span></button>

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





<!-- FOOTER -->

<?php

  include('footer.php');

?>

<!-- /FOOTER -->



<script type="text/javascript" src="assets\js\loader.js"></script>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
     
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
 
<script type="text/javascript" src="assets/js/simple.money.format.js"></script>

<script type="text/javascript" language="JavaScript">

function konfirmasi() {

  tanya = confirm("Anda Yakin Akan Menghapus Data ?");

  if (tanya == true) return true;

  else return false;

}
    
// PEMANGGILAN KALENDER            

$('#myDatepicker').datetimepicker({
   format:'YYYY/MM/DD'
});

$('#myDatepicker1').datetimepicker({
   format:'YYYY/MM/DD'
});

// PEMANGGILAN DATATABLE

$(document).ready(function() {
  $('#datatable1').DataTable();
});

$(document).ready(function() {
  $('#datatable2').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'print'
        ]
    });
});

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

$('#myModal1').on('show.bs.modal', function () {
   $('#blurtrigger1').addClass('blur'),
   $('#blurtrigger2').addClass('blur'),
   $('#blurtrigger3').addClass('blur');
})

$('#myModal1').on('hide.bs.modal', function () {
   $('#blurtrigger1').removeClass('blur'),
   $('#blurtrigger2').removeClass('blur'),
   $('#blurtrigger3').removeClass('blur');
})

// PEMANGGILAN GRAFIK KEUANGAN

google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(ChartKeuangan);

function ChartKeuangan() {

  <?php

    $tahun = date('Y');
    $tahun1 = date('Y') - 1;
    $tahun2 = date('Y') - 2;
    $tahun3 = date('Y') - 3;

    $masukTotalY1 = 0;
    $keluarTotalY1 = 0;
    $count = mysqli_query($koneksi, "SELECT keuangan_keluar, keuangan_masuk FROM tbl_keuangan WHERE year(keuangan_tanggal)='$tahun1'");
    while ($data = mysqli_fetch_array($count)) {
      $masukTotalY1 += $data['keuangan_masuk'];
      $keluarTotalY1 += $data['keuangan_keluar'];
    }

    $masukTotalY2 = 0;
    $keluarTotalY2 = 0;
    $count = mysqli_query($koneksi, "SELECT keuangan_keluar, keuangan_masuk FROM tbl_keuangan WHERE year(keuangan_tanggal)='$tahun2'");
    while ($data = mysqli_fetch_array($count)) {
      $masukTotalY2 += $data['keuangan_masuk'];
      $keluarTotalY2 += $data['keuangan_keluar'];
    }

    $masukTotalY3 = 0;
    $keluarTotalY3 = 0;
    $count = mysqli_query($koneksi, "SELECT keuangan_keluar, keuangan_masuk FROM tbl_keuangan WHERE year(keuangan_tanggal)='$tahun3'");
    while ($data = mysqli_fetch_array($count)) {
      $masukTotalY3 += $data['keuangan_masuk'];
      $keluarTotalY3 += $data['keuangan_keluar'];
    }

    $masukTotalY = 0;
    $keluarTotalY = 0;
    $count = mysqli_query($koneksi, "SELECT keuangan_keluar, keuangan_masuk FROM tbl_keuangan WHERE year(keuangan_tanggal)='$tahun'");
    while ($data = mysqli_fetch_array($count)) {
      $masukTotalY += $data['keuangan_masuk'];
      $keluarTotalY += $data['keuangan_keluar'];
    }

  ?>

  var data = google.visualization.arrayToDataTable([
    ['Tahun', 'Pemasukkan', 'Pengeluaran'],
  
    ['Total',  <?php echo $masukTotalY + $masukTotalY1 + $masukTotalY2 + $masukTotalY3 ?>, <?php echo $keluarTotalY + $keluarTotalY1 + $keluarTotalY2 + $keluarTotalY3 ?>],
    [<?php echo $tahun-3 ?>, <?php echo $masukTotalY3 ?>, <?php echo $keluarTotalY3 ?>],
    [<?php echo $tahun-2 ?>, <?php echo $masukTotalY2 ?>, <?php echo $keluarTotalY2 ?>],
    [<?php echo $tahun-1 ?>, <?php echo $masukTotalY1 ?>, <?php echo $keluarTotalY1 ?>],
    [<?php echo $tahun ?>, <?php echo $masukTotalY ?>, <?php echo $keluarTotalY ?>]
  ]);

  var options = {
    title: 'Laporan Keuangan Interval 4 Tahun',
    bar: {groupWidth: "69%"},
    legend: { position: "bottom" },
  };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
    chart.draw(data, options);
  }

// RESIZE GRAFIK      

$(window).resize(function(){
  ChartKeuangan();
});


$('.money').simpleMoneyFormat();

</script>
