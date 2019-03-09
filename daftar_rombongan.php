 <!-- Bootstrap -->
    <link href="assets/theme/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
   
     <!-- Datatables -->
    <link href="assets/theme/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    
    <link href="assets/theme/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom theme Style -->
    <link href="assets/theme/build/css/custom.min.css" rel="stylesheet">



<table id="datatable" class="table table-striped">

                      
                    <!-- header tabel -->

                      <thead>

                        <tr>

                          <th><center>No</th>

                          <th><strong><center>ID Registrasi</th>

                          <th><center>Nama Lengkap</th>

                          <th><center>Email</th>

                          <th><center>Telepon</th>

                          <th><center>Aksi</th></strong>

                        </tr>

                      </thead>


                      <tbody>

                        <?php  

                        echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];                   

                        $koneksi = mysqli_connect('localhost','root','','jamaahpk_db');

                        $no = 1;

                        $id = $_GET['id_registrasi'];

                        echo "idnya =".$id;

                        $query = mysqli_query($koneksi, "SELECT * FROM tbl_rombongan WHERE id_registrasi=$id");

                        while ($data = mysqli_fetch_array($query)) {
                          
                          $rombongan_ID = $data['rombongan_ID'];

                          echo "<tr>";

                          echo "<td><center>" . $no++ . "</td>";                          

                          echo "<td><center>" . $data['id_registrasi'] . "</td>";

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


                    <!-- JAVASCRIPT-->

    <!-- jQuery -->
    <script src="assets/theme/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/theme/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
   
    <!-- Datatables -->
    <script src="assets/theme/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/theme/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/theme/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/theme/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="assets/theme/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/theme/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/theme/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/theme/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="assets/theme/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/theme/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/theme/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    

    
    <!-- Custom theme Scripts -->
    <script src="assets/theme/build/js/custom.min.js"></script>