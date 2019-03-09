<?php

include('header.php');

include('framework/functions/func_makanan.php');

$id_registrasi = $_GET['id_registrasi'];

$query = mysqli_query($koneksi, "SELECT * FROM tbl_pola_menu_makanan WHERE id_registrasi=$id_registrasi");

?>

<!-- page content -->

<div class="right_col" role="main">

  <div class="">

    <div class="page-title"></div>

    <div class="clearfix"></div>

<!-- TABEL POLA -->

          <div class="row">

              <div class="col-md-6 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">

                    <h2>List Pola</h2>

                    <ul class="nav navbar-right panel_toolbox">

                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>

                      </li>

                    </ul>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                    <table class="table table-striped">

                    <?php 

                      $TotalHarga = 0;
                      
                      while($data = mysqli_fetch_array($query)){

                        $makanan = explode(",", $data['pola_makanan'] );

                        $cemilan = explode(",", $data['pola_cemilan'] );

                        $pola_ID = $data['pola_ID'];

                        $hargaMakanan1 = mysqli_query($koneksi, "SELECT makanan_harga FROM tbl_menu_makanan WHERE makanan_nama = '$makanan[0]'");

                        $hargaMakanan2 = mysqli_query($koneksi, "SELECT makanan_harga FROM tbl_menu_makanan WHERE makanan_nama = '$makanan[1]'");

                        $hargaMakanan3 = mysqli_query($koneksi, "SELECT makanan_harga FROM tbl_menu_makanan WHERE makanan_nama = '$makanan[2]'");

                        $hargaCemilan1 = mysqli_query($koneksi, "SELECT cemilan_harga FROM tbl_menu_cemilan WHERE cemilan_nama = '$cemilan[0]'");

                        $hargaCemilan2 = mysqli_query($koneksi, "SELECT cemilan_harga FROM tbl_menu_cemilan WHERE cemilan_nama = '$cemilan[1]'");

                        $hargaCemilan3 = mysqli_query($koneksi, "SELECT cemilan_harga FROM tbl_menu_cemilan WHERE cemilan_nama = '$cemilan[2]'");

                        $TotalHarga += (mysqli_fetch_array($hargaMakanan1)[0] + mysqli_fetch_array($hargaMakanan2)[0] + mysqli_fetch_array($hargaMakanan3)[0] + mysqli_fetch_array($hargaCemilan1)[0] + mysqli_fetch_array($hargaCemilan2)[0] + mysqli_fetch_array($hargaCemilan3)[0]);

                        echo "<tr>";

                        echo "<th> Tanggal: ". $data['pola_tanggal'] . "</th>";

                        echo "<td>
                                <a href='framework/functions/func_makanan?delete_pola=$pola_ID' onclick='return konfirmasi()' role='button' class='btn btn-danger btn-sm'>

                                  <span class='glyphicon glyphicon-trash'> Delete</span>

                                </a>
                              
                              </td>";

                        echo "</tr>";

                        echo "<td> Paket Makanan: "."<li>". $makanan[0]."</li>" . "<li>". $makanan[1]."</li>"."<li>". $makanan[2]."</li>". "</td>";
                        echo "<td> Paket Cemilan: "."<li>". $cemilan[0]."</li>" . "<li>". $cemilan[1]."</li>"."<li>". $cemilan[2]."</li>". "</td>";

                      }

                      echo "Total Harga : Rp " .number_format($TotalHarga);

                    ?>                     

                    </table>

                  </div>

                </div>

              </div>

              <div class="col-md-6 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">

                    <h2>Daftarkan Pola</h2>

                    <ul class="nav navbar-right panel_toolbox">

                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>

                      </li>

                    </ul>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                    <form method="post" class="form-horizontal" action="?action=insert_pola">

                      <input type="hidden" name="id_registrasi" value="<?php echo $id_registrasi ?>">

                      <div class="item form-group">

                        <div class="col-md-9 col-sm-6 col-xs-12">

                          <label for="pola_tanggal">Tanggal <font style="color: red">*</font> :</label>
                          
                          <div class='input-group date' id='myDatepicker'>
                        
                            <input type='text' name="pola_tanggal" id="pola_tanggal" placeholder="Masukkan tanggal" class="form-control" required="required" />
                            
                            <span class="input-group-addon">
                            
                               <span class="glyphicon glyphicon-calendar"></span>
                            
                            </span>
                        
                          </div>

                        </div>

                      </div>

                      <div class="item form-group pull-right">

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <label for="pola_makanan1">Paket Makanan Pagi :</label>

                          <select id="pola_makanan1" name="pola_makanan1" class="form-control col-md-7 col-xs-12">

                            <option value="">-Pilih Paket-</option> 

                            <?php
                                
                                $queryMakanan = mysqli_query($koneksi,"SELECT makanan_nama FROM tbl_menu_makanan WHERE makanan_status = 1");

                                while ($row = mysqli_fetch_array($queryMakanan)) {
                                
                                ?>
                                
                                    <option value="<?php echo $row['makanan_nama']; ?>">
                                
                                        <?php echo $row['makanan_nama']; ?>
                                
                                    </option>
                                
                                <?php
                                
                                }
                            
                            ?>
                          
                          </select>

                      </div>              

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <label for="pola_cemilan1">Paket Cemilan Pagi :</label>

                          <select id="pola_cemilan1" name="pola_cemilan1" class="form-control col-md-7 col-xs-12">

                            <option value="">-Pilih Paket-</option>

                            <?php
                               
                                $queryCemilan = mysqli_query($koneksi,"SELECT cemilan_nama FROM tbl_menu_cemilan WHERE cemilan_status = 1");

                                while ($row = mysqli_fetch_array($queryCemilan)) {
                               
                                ?>
                               
                                    <option value="<?php echo $row['cemilan_nama']; ?>">
                               
                                        <?php echo $row['cemilan_nama']; ?>
                               
                                    </option>
                               
                                <?php
                               
                                }
                            
                            ?>

                          </select>

                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <label for="pola_makanan2">Paket Makanan Siang :</label>

                          <select id="pola_makanan2" name="pola_makanan2" class="form-control col-md-7 col-xs-12">

                            <option value="">-Pilih Paket-</option> 

                            <?php
                                
                                $queryMakanan = mysqli_query($koneksi,"SELECT makanan_nama FROM tbl_menu_makanan WHERE makanan_status = 1");

                                while ($row = mysqli_fetch_array($queryMakanan)) {
                         
                                ?>
                         
                                    <option value="<?php echo $row['makanan_nama']; ?>">
                         
                                        <?php echo $row['makanan_nama']; ?>
                         
                                    </option>
                         
                                <?php
                         
                                }
                         
                            ?>
                          
                          </select>

                      </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <label for="pola_cemilan2">Paket Cemilan Siang :</label>

                          <select id="pola_cemilan2" name="pola_cemilan2" class="form-control col-md-7 col-xs-12">

                            <option value="">-Pilih Paket-</option>

                            <?php
                               
                                $queryCemilan = mysqli_query($koneksi,"SELECT cemilan_nama FROM tbl_menu_cemilan WHERE cemilan_status = 1");

                                while ($row = mysqli_fetch_array($queryCemilan)) {
                              
                                ?>
                              
                                    <option value="<?php echo $row['cemilan_nama']; ?>">
                              
                                        <?php echo $row['cemilan_nama']; ?>
                              
                                    </option>
                              
                                <?php
                              
                                }
                            
                            ?>

                          </select>

                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <label for="pola_makanan3">Paket Makanan Malam :</label>

                          <select id="pola_makanan3" name="pola_makanan3" class="form-control col-md-7 col-xs-12">

                            <option value="">-Pilih Paket-</option> 

                            <?php
                                
                                $queryMakanan = mysqli_query($koneksi,"SELECT makanan_nama FROM tbl_menu_makanan WHERE makanan_status = 1");

                                while ($row = mysqli_fetch_array($queryMakanan)) {
                  
                                ?>
                  
                                    <option value="<?php echo $row['makanan_nama']; ?>">
                  
                                        <?php echo $row['makanan_nama']; ?>
                  
                                    </option>
                  
                                <?php
                  
                                }
                  
                            ?>
                          
                          </select>

                      </div>                     

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <label for="pola_cemilan3">Paket Cemilan Malam :</label>

                          <select id="pola_cemilan3" name="pola_cemilan3" class="form-control col-md-7 col-xs-12">

                            <option value="">-Pilih Paket-</option>

                            <?php
                               
                                $queryCemilan = mysqli_query($koneksi,"SELECT cemilan_nama FROM tbl_menu_cemilan WHERE cemilan_status = 1");

                                while ($row = mysqli_fetch_array($queryCemilan)) {
                            
                                ?>
                            
                                    <option value="<?php echo $row['cemilan_nama']; ?>">
                            
                                        <?php echo $row['cemilan_nama']; ?>
                            
                                    </option>
                            
                                <?php
                            
                                }
                            
                            ?>

                          </select>

                        </div>

                       <p> 

                       <div class="col-md-12 col-sm-6 col-xs-12"> 

                        note: Pilihan Dapat dikosongkan
                   
                       <input type="hidden" name="action" value="submit_pola">
                        
                       <button id="submit_pola" type="submit" name="submit_pola" value="submit_pola" style="float: right; margin-top: 20px;" class="btn btn-success"><span class='glyphicon glyphicon-save'> Tambah</span></button>


                       </div>

                    </form>
                    
                  </div>
                    
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" style="margin-top: 20px">Lihat Daftar Makanan</button>
                    
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal1" style="margin-top: 20px">Lihat Daftar Cemilan</button>
               
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

    </div>

  </div>



<!-- MODAL MAKANAN -->

<div class="container-modal">

  <div class="modal fade" id="myModal" role="dialog"  >
  
    <div class="modal-dialog"  style="width: 550px;" >
    
      <!-- Modal content-->
      <div class="modal-content">
       
        <div class="modal-header" style="background-color: #2A3F54; color: white" >
          
          <h4 class="modal-title"><i class="fa fa-cutlery"></i><strong> Daftar Makanan</strong></h4>
      
        </div>
      
        <div class="modal-body">
      
             <table class="table table-striped">
      
              <thead>
               
                <tr>
               
                  <th><center><strong>Nama Menu </th>
               
                  <th><center>Isi Menu </th>
               
                  <th><center>Harga </th>
               
                  <th><center>Status </th>

                </tr>
              
              </thead>

              <tbody>
              
                <?php 

                 $query = mysqli_query($koneksi, "SELECT * FROM tbl_menu_makanan");

                  while ($data = mysqli_fetch_array($query)) {
              
                    $makanan_ID = $data['makanan_ID'];
              
                    echo "<tr>";
              
                    echo "<td><center>" .$data['makanan_nama'] . "</td>";
              
                    echo "<td><center>" .$data['makanan_isi'] . "</td>";
              
                    echo "<td><center>" .$data['makanan_harga'] . "</td>";
              
                    if ($data['makanan_status'] == 1) {
              
                      echo "<td><center>Tersedia</td>";
              
                    }
              
                    else {
              
                      echo "<td><center>Tidak Tersedia</td>"; 
              
                    }
                
                  }

              ?>         
             
              </tbody>
            
            </table> 

        </div>
        
        <div class="modal-footer">
        
          <a href="form_tabel_makanan" class="btn-info btn-sm btn pull-left" >Edit Makanan</a>
        
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
        </div>
      
      </div>
    
    </div>
    
  </div>
    
</div>


<!-- MODAL CEMILAN -->
<div class="container-modal">

  <div class="modal fade" id="myModal1" role="dialog"  >

    <div class="modal-dialog"  style="width: 550px;" >
    
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header" style="background-color: #2A3F54; color: white" >
          
          <h4 class="modal-title"><i class="fa fa-cutlery"></i><strong> Daftar Cemilan</strong></h4>

        </div>

        <div class="modal-body">

             <table class="table table-striped">

                <thead>
               
                  <tr>
               
                    <th><center><strong>Nama Menu </th>
               
                    <th><center>Isi Menu </th>
               
                    <th><center>Harga </th>
               
                    <th><center>Status </th>
   
                  </tr>
   
                </thead>

                <tbody>
   
                  <?php 

                   $query = mysqli_query($koneksi, "SELECT * FROM tbl_menu_cemilan");

                    while ($data = mysqli_fetch_array($query)) {
         
                      $cemilan_ID = $data['cemilan_ID'];
         
                      echo "<tr>";
         
                      echo "<td><center>" .$data['cemilan_nama'] . "</td>";
         
                      echo "<td><center>" .$data['cemilan_isi'] . "</td>";
         
                      echo "<td><center>" .$data['cemilan_harga'] . "</td>";
         
                      if ($data['cemilan_status'] == 1) {
         
                        echo "<td><center>Tersedia</td>";
         
                      }
         
                      else {
         
                        echo "<td><center>Tidak Tersedia</td>"; 
         
                      }

                      echo "</tr>";
         
                    }

                ?>         
         
                </tbody>
         
              </table> 

        </div>
        
        <div class="modal-footer">
        
          <a href="form_tabel_cemilan" class="btn-info btn-sm btn pull-left" >Edit Cemilan</a>
        
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
        </div>
      
      </div>



<script type="text/javascript" language="JavaScript">

 function konfirmasi() {

      tanya = confirm("Anda Yakin Akan Menghapus Data ?");

      if (tanya == true) return true;

      else return false;

  }    

  $('#myDatepicker').datetimepicker({
     format:'YYYY/MM/DD'
  });


</script>