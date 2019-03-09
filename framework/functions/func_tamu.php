<?php

error_reporting(0);

include("../library/koneksi.php");

// FUNGSI FIELD REGISTRASI

function insert_registrasi($koneksi)
{

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == "insert_registrasi") 
	{
		
		if (isset($_POST['action']) && $_POST['action'] == 'submit_registrasi') 
		{

			
			$registrasi_waktu_datang 	= $_POST['registrasi_waktu_datang'];
			$registrasi_waktu_pulang 	= $_POST['registrasi_waktu_pulang'];
			$registrasi_PIC_nama 		= $_POST['registrasi_PIC_nama'];
			$registrasi_PIC_telp 		= $_POST['registrasi_PIC_telp'];
			$registrasi_PIC_email		= $_POST['registrasi_PIC_email'];
			$registrasi_PIC_alamat 		= $_POST['registrasi_PIC_alamat'];
			$registrasi_PIC_kota 		= $_POST['registrasi_PIC_kota'];
			$id_jenis_kegiatan 			= $_POST['id_jenis_kegiatan'];
			$id_jenis_tamu 				= $_POST['id_jenis_tamu'];
			$registrasi_jumlah_lk 		= $_POST['registrasi_jumlah_lk'];
			$registrasi_jumlah_pr 		= $_POST['registrasi_jumlah_pr'];
			$registrasi_opsi_makanan 	= $_POST['registrasi_opsi_makanan'];
			// $id_pola_menu_makanan 		= $_POST['id_pola_menu_makanan'];
			$registrasi_status 			= $_POST['registrasi_status'];

			if ($registrasi_waktu_pulang < $registrasi_waktu_datang) {
				
				echo "<script>	
					window.alert('Waktu datang tidak boleh melebihi waktu pulang');
					window.history.back();
					</script>";
			
			}

			elseif ($registrasi_waktu_datang == "") 
			{

				echo "<script>	
					window.alert('Data waktu datang tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($registrasi_waktu_pulang == "") 
			{
			
				echo "<script>	
					window.alert('Data waktu pulang tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($registrasi_PIC_nama == "") 
			{
			
				echo "<script>	
					window.alert('Data nama PIC tidak boleh kosong');
					window.history.back();
					</script>";
			
			}
			
			elseif ($registrasi_PIC_telp == "") 
			{
			
				echo "<script>	
					window.alert('Data telp PIC tidak boleh kosong');
					window.history.back();
					</script>";
			
			}
	
			elseif ($registrasi_PIC_email == "") 
			{
			
				echo "<script>	
					window.alert('Data email PIC tidak boleh kosong');
					window.history.back();
					</script>";
			
			}
	
			elseif ($registrasi_PIC_alamat == "") 
			{
			
				echo "<script>	
					window.alert('Data email PIC tidak boleh kosong');
					window.history.back();
					</script>";
			
			}
	
			elseif ($registrasi_PIC_kota == "") 
			{
			
				echo "<script>	
					window.alert('Data kota PIC tidak boleh kosong');
					window.history.back();
					</script>";
			
			}
	
			elseif ($id_jenis_kegiatan == "") 
			{
			
				echo "<script>	
					window.alert('Data jenis kegiatan tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($id_jenis_tamu == "") 
			{
			
				echo "<script>	
					window.alert('Data jenis tamu tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($registrasi_jumlah_lk == "") 
			{
			
				echo "<script>	
					window.alert('Data jumlah laki-laki tidak boleh kosong');
					window.history.back();
					</script>";
			
			}
	
			elseif ($registrasi_jumlah_pr == "") 
			{
			
				echo "<script>	
					window.alert('Data jumlak perempuan tidak boleh kosong');
					window.history.back();
					</script>";
			
			}
	
			elseif ($registrasi_status == "") 
			{
			
				echo "<script>	
					window.alert('Data status tidak boleh kosong');
					window.history.back();
					</script>";
			
			}


			else 
			{

				$insert = mysqli_query($koneksi , "INSERT INTO tbl_registrasi 
												   VALUES(
												   		   '',
														   '$registrasi_waktu_datang',
														   '$registrasi_waktu_pulang',
														   '$registrasi_PIC_nama',
														   '$registrasi_PIC_telp',
														   '$registrasi_PIC_email',
														   '$registrasi_PIC_alamat',
														   '$registrasi_PIC_kota',
														   '$id_jenis_kegiatan',
														   '$id_jenis_tamu',
														   '$registrasi_jumlah_lk',
														   '$registrasi_jumlah_pr',
														   '$registrasi_opsi_makanan',
														   -- '$id_pola_menu_makanan',
														   '$registrasi_status'
													)");

				if ($insert) {
					echo "<script>
						window.alert('Data Berhasil Dimasukkan');	
						location.replace('http://localhost/jamaahpk_db/daftar_registrasi');
				
					</script>";
				}
				else {
					echo "<script>
						window.alert('Gagal');
						
						
					</script>";

					print_r($insert);
				}

				
	
				

				exit();
			
			}
		}
	}	
}
// END INSERT
?>


<?php
// EDIT
function edit_registrasi($koneksi)

{

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == "edit_registrasi") 
	{
		
		if (isset($_POST['action']) && $_POST['action'] == 'edit_registrasi') 
		{

			$registrasi_ID				= $_POST['regis_ID'];
			$registrasi_waktu_datang 	= $_POST['registrasi_waktu_datang'];
			$registrasi_waktu_pulang 	= $_POST['registrasi_waktu_pulang'];
			$registrasi_PIC_nama 		= $_POST['registrasi_PIC_nama'];
			$registrasi_PIC_telp 		= $_POST['registrasi_PIC_telp'];
			$registrasi_PIC_email		= $_POST['registrasi_PIC_email'];
			$registrasi_PIC_alamat 		= $_POST['registrasi_PIC_alamat'];
			$registrasi_PIC_kota 		= $_POST['registrasi_PIC_kota'];
			$id_jenis_kegiatan 			= $_POST['id_jenis_kegiatan'];
			$id_jenis_tamu 				= $_POST['id_jenis_tamu'];
			$registrasi_jumlah_lk 		= $_POST['registrasi_jumlah_lk'];
			$registrasi_jumlah_pr 		= $_POST['registrasi_jumlah_pr'];
			$registrasi_opsi_makanan 	= $_POST['registrasi_opsi_makanan'];
			// $id_pola_menu_makanan 		= $_POST['id_pola_menu_makanan'];
			$registrasi_status 			= $_POST['registrasi_status'];

			
			if ($registrasi_waktu_pulang < $registrasi_waktu_datang) {
				
				echo "<script>	
					window.alert('Waktu datang tidak boleh melebihi waktu pulang');
					window.history.back();
					</script>";
			
			}

			elseif ($registrasi_waktu_datang == "") 
			{

				echo "<script>	
					window.alert('Data waktu datang tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($registrasi_waktu_pulang == "") 
			{
			
				echo "<script>	
					window.alert('Data waktu pulang tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($registrasi_PIC_nama == "") 
			{
			
				echo "<script>	
					window.alert('Data nama PIC tidak boleh kosong');
					window.history.back();
					</script>";
			
			}
			
			elseif ($registrasi_PIC_telp == "") 
			{
			
				echo "<script>	
					window.alert('Data telp PIC tidak boleh kosong');
					window.history.back();
					</script>";
			
			}
	
			elseif ($registrasi_PIC_email == "") 
			{
			
				echo "<script>	
					window.alert('Data email PIC tidak boleh kosong');
					window.history.back();
					</script>";
			
			}
	
			elseif ($registrasi_PIC_alamat == "") 
			{
			
				echo "<script>	
					window.alert('Data email PIC tidak boleh kosong');
					window.history.back();
					</script>";
			
			}
	
			elseif ($registrasi_PIC_kota == "") 
			{
			
				echo "<script>	
					window.alert('Data kota PIC tidak boleh kosong');
					window.history.back();
					</script>";
			
			}
	
			elseif ($id_jenis_kegiatan == "") 
			{
			
				echo "<script>	
					window.alert('Data jenis kegiatan tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($id_jenis_tamu == "") 
			{
			
				echo "<script>	
					window.alert('Data jenis tamu tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($registrasi_jumlah_lk == "") 
			{
			
				echo "<script>	
					window.alert('Data jumlah laki-laki tidak boleh kosong');
					window.history.back();
					</script>";
			
			}
	
			elseif ($registrasi_jumlah_pr == "") 
			{
			
				echo "<script>	
					window.alert('Data jumlak perempuan tidak boleh kosong');
					window.history.back();
					</script>";
			
			}
	
			elseif ($registrasi_opsi_makanan == "") 
			{
			
				echo "<script>	
					window.alert('Data opsi makanan tidak boleh kosong');
					window.history.back();
					</script>";
			
			}
	
			elseif ($registrasi_status == "") 
			{
			
				echo "<script>	
					window.alert('Data status tidak boleh kosong');
					window.history.back();
					</script>";
			
			}


			else 
			{

				$update = mysqli_query($koneksi , "UPDATE tbl_registrasi 
												   SET
													registrasi_waktu_datang = 	  '$registrasi_waktu_datang',
												    registrasi_waktu_pulang	=	  '$registrasi_waktu_pulang',
													registrasi_PIC_nama		=	  '$registrasi_PIC_nama',
													registrasi_PIC_telp		=	  '$registrasi_PIC_telp',
													registrasi_PIC_email	=	  '$registrasi_PIC_email',
													registrasi_PIC_alamat	=  	  '$registrasi_PIC_alamat',
													registrasi_PIC_kota		=     '$registrasi_PIC_kota',
													id_jenis_kegiatan		=	  '$id_jenis_kegiatan',
													id_jenis_tamu			=     '$id_jenis_tamu',
													registrasi_jumlah_lk	=     '$registrasi_jumlah_lk',
													registrasi_jumlah_pr	=     '$registrasi_jumlah_pr',
													registrasi_opsi_makanan	=	  '$registrasi_opsi_makanan',
													-- id_pola_menu_makanan	=	  '$id_pola_menu_makanan',
													registrasi_status		=	  '$registrasi_status'
													WHERE registrasi_ID		= 	  '$registrasi_ID' 
													");

				if ($update) {
					echo "<script>
						window.alert('Data Berhasil Diubah');	
						location.replace('http://localhost/jamaahpk_db/daftar_registrasi');
						
					</script>";
				}
				else {
					echo "<script>
						window.alert('Gagal');
						history.back();
					</script>";
				}

				exit();
			
			}
		}
	}	
}
// END EDIT
?>

<?php

function delete_regis($koneksi){

	$id_delete 	 = $_GET['delete_regis'];

	$delete = mysqli_query($koneksi, "DELETE FROM tbl_registrasi WHERE registrasi_ID=$id_delete");

	if ($delete) 
	{

		echo "<script>
				window.alert('Data berhasil dihapus');
				location.replace('http://localhost/jamaahpk_db/daftar_registrasi');
			  </script>";

	}
}
// END DELETE
?>





<?php

// FUNGSI FIELD ROMBONGAN

function insert_rombongan($koneksi)
{

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == "insert_rombongan") 
	{
		
		if (isset($_POST['action']) && $_POST['action'] == 'submit_rombongan') 
		{

			$id_registrasi 		= $_POST['id_registrasi'];
			$rombongan_nama 	= $_POST['rombongan_nama'];
			$rombongan_email	= $_POST['rombongan_email'];
			$rombongan_telp		= $_POST['rombongan_telp'];

			if ($rombongan_nama == "") 
			{

				echo "<script>	
					window.alert('Nama tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($rombongan_email == "") 
			{
			
				echo "<script>	
					window.alert('Email tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($rombongan_telp == "") 
			
			{
				echo "<script>	
					window.alert('Telepon tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			else 
			{

				$insert = mysqli_query($koneksi , "INSERT INTO tbl_rombongan 
												   VALUES('','$id_registrasi','$rombongan_nama','$rombongan_email','$rombongan_telp')");

				echo "<script>
						window.alert('Data Berhasil Dimasukkan');
						location.replace('http://localhost/jamaahpk_db/form_tabel_rombongan?id_registrasi=$id_registrasi');
					</script>";

				return $insert;

				exit();
			
			}
		}
	}	
}
// END INSERT
?>


<?php
// EDIT
function edit_rombongan($koneksi)

{

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == "edit_rombongan") 
	{
		
		if (isset($_POST['action']) && $_POST['action'] == 'submit_rombongan') 
		{

			// print_r($_POST);
			$id_registrasi			= $_POST['id_registrasi'];
			$rombongan_ID 			= $_POST['rombongan_ID'];
			$rombongan_nama 		= $_POST['rombongan_nama'];
			$rombongan_email 		= $_POST['rombongan_email'];
			$rombongan_telp 		= $_POST['rombongan_telp'];
			

			if ($rombongan_nama == "") 
			{
				echo "<script>	
					window.alert('Nama tidak boleh kosong');
					window.history.back();
					</script>";
			}

			elseif ($rombongan_email == "") 
			{
				echo "<script>	
					window.alert('Email tidak boleh kosong');
					window.history.back();
					</script>";
			}

			elseif ($rombongan_telp == "") 
			{
				echo "<script>	
					window.alert('Telepon tidak boleh kosong');
					window.history.back();
					</script>";
			}

			else 
			{
				
				$update = mysqli_query($koneksi , "UPDATE tbl_rombongan SET 
											rombongan_nama = '$rombongan_nama',
											rombongan_email = '$rombongan_email',
											rombongan_telp = '$rombongan_telp'
										 WHERE rombongan_ID = '$rombongan_ID'
					");

				echo "<script>
						window.alert('Data Berhasil Diubah');
						location.replace('http://localhost/jamaahpk_db/form_tabel_rombongan?id_registrasi=$id_registrasi');
					</script>";

				return $update;

				exit();
			
			}
		}
	}	
}
// END EDIT
?>

<?php

//DELETE_ROMBONGAN

function delete_rombongan($koneksi){

	$id_delete_rombongan 	 = $_GET['delete_rombongan'];

	$delete = mysqli_query($koneksi, "DELETE FROM tbl_rombongan WHERE rombongan_ID=$id_delete_rombongan");

	if ($delete) 
	{

		echo "<script>
				window.alert('Data berhasil dihapus');
				window.location=document.referrer;
			  </script>";

	}
}

// END DELETE
?>



<?php

insert_registrasi($koneksi);

edit_registrasi($koneksi);

delete_regis($koneksi);

insert_rombongan($koneksi);

edit_rombongan($koneksi);

delete_rombongan($koneksi);


?>