<?php

  error_reporting(0);

	include('header.php');

  $query = mysqli_query($koneksi, "SELECT * FROM tbl_pengguna");
	
?>


<!-- page content -->

        <div class="right_col" role="main">

          <div class="">

            <div class="page-title">

              <div class="title_left">

                <h3>List Pengguna</small></h3>

              </div>

            </div>

<!-- background content -->

            <div class="clearfix"></div>

<!-- Main content -->

            <div class="row">
     
              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">

                    <h2>Tabel Pengguna/Admin</h2>

                    <ul class="nav navbar-right panel_toolbox">

                      <li>

                        <div style="margin-right: 20px">

                            <a href="tambah_pengguna" class="btn btn-default"><span class='glyphicon glyphicon-plus-sign'><font color="black"> Tambahkan Admin</span></font></a>

                        </div>

                      </li>

                      <li style="float: right"><a class="collapse-link pull"><i class="fa fa-chevron-up"></i></a>

                      </li>

                    </ul>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content animated fadeIn">

        
                    <table id="datatable" class="table table-striped">
      

                    <!-- header tabel -->

                      <thead>

                        <tr>

                          <th><center>No</th>

                          <th><center>Username</th>

                         <!--  <th><center>Password</th> -->

                          <th><center>Email</th>

                          <th><center>Nama Lengkap</th>

                          <th><center>Aksi</th></strong>

                        </tr>

                      </thead>



                      <tbody>

                        <?php             

                          $no = 1;           

                          while ($data = mysqli_fetch_array($query)) {

                            $id = $data['pengguna_ID'];
                            
                            echo "<tr>";

                            echo "<td><center>". $no++. "</td>";                            

                            echo "<td><center>". $data['pengguna_username']. "</td>";

                            // echo "<td><center>". $data['pengguna_pass']."</td>";

                            echo "<td><center>". $data['pengguna_email']. "</td>";

                            echo "<td><center>". $data['pengguna_nama']. "</td>";

                            if ($session != $id) {
                              echo "<td><center>Locked</td></tr>";
                              // echo $session;
                            }

                            else{

                              echo "<td>

                                <a href='ubah_pengguna?pengguna_ID=$id'><center>

                                  <button class='btn btn-info btn-sm' >

                                    <span class='glyphicon glyphicon-edit'></span>

                                  </button>

                                </a>    

                                
                                <a href='framework/functions/func_pengguna?delete_ID=$id' onclick='return konfirmasi()' role='button' class='btn btn-danger btn-sm'>

                                  <span class='glyphicon glyphicon-trash'></span>

                                </a>

                              </td></tr>";

                            }

                            

                          };                        		              	

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

		      

