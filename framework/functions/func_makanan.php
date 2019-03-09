<?php

error_reporting(0);

include("../library/koneksi.php");

// INSERT
function insert_makanan($koneksi)
{

	//$koneksi = mysqli_connect('localhost','root','','jamaahpk_db');

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == "insert_makanan") 
	{
		
		if (isset($_POST['action']) && $_POST['action'] == 'submit_makanan') 
		{

			// print_r($_POST);
			$makanan_nama = $_POST['makanan_nama'];
			$makanan_isi = $_POST['makanan_isi'];
			$makanan_harga = preg_replace('/\D/', '', $_POST['makanan_harga']);
			$makanan_status = $_POST['makanan_status'];

			if ($makanan_nama == "") 
			{

				echo "<script>	
					window.alert('Nama tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($makanan_isi == "") 
			{
			
				echo "<script>	
					window.alert('Isi tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($makanan_harga == "") 
			
			{
				echo "<script>	
					window.alert('Harga tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($makanan_status == "") 
			{

				echo "<script>	
					window.alert('Status tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			else 
			{

				$insert = mysqli_query($koneksi , "INSERT INTO tbl_menu_makanan 
												   VALUES('','$makanan_nama','$makanan_isi','$makanan_harga','$makanan_status')");

				echo "<script>
						window.alert('Paket makanan $makanan_nama berhasil ditambahkan');	
						location.replace('http://localhost/jamaahpk_db/form_tabel_makanan');
					</script>";
			
			}
		}
	}	
}
// END INSERT
?>


<?php
// EDIT
function edit_makanan($koneksi)
{

	//$koneksi = mysqli_connect('localhost','root','','jamaahpk_db');

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == "edit_makanan") 
	{
		
		if (isset($_POST['action']) && $_POST['action'] == 'submit_makanan') 
		{

			// print_r($_POST);

			$makanan_ID 	= $_POST['makanan_ID'];
			$makanan_nama 	= $_POST['makanan_nama'];
			$makanan_isi 	= $_POST['makanan_isi'];
			$makanan_harga  = preg_replace('/\D/', '', $_POST['makanan_harga']);
			$makanan_status = $_POST['makanan_status'];

			if ($makanan_nama == "") 
			{

				echo "<script>	
					window.alert('Nama tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($makanan_isi == "") 
			{
			
				echo "<script>	
					window.alert('Isi tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($makanan_harga == "") 
			
			{
				echo "<script>	
					window.alert('Harga tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($makanan_status == "") 
			{

				echo "<script>	
					window.alert('Status tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			else 
			{
				
				$update = mysqli_query($koneksi , "UPDATE tbl_menu_makanan SET 
											makanan_nama = '$makanan_nama',
											makanan_isi = '$makanan_isi',
											makanan_harga = '$makanan_harga',
											makanan_status = '$makanan_status'
										 WHERE makanan_ID = '$makanan_ID'
					");

				echo "<script>
						window.alert('Data Berhasil Diubah');
						location.replace('http://localhost/jamaahpk_db/form_tabel_makanan');
					</script>";


				exit();
			
			}
		}
	}	
}
// END EDIT
?>

<?php
//DELETE

function delete_makanan($koneksi){
	//$koneksi = mysqli_connect('localhost','root','','jamaahpk_db');

	$id_delete_makanan 	 = $_GET['delete_makanan'];

	$delete = mysqli_query($koneksi, "DELETE FROM tbl_menu_makanan WHERE makanan_ID=$id_delete_makanan");

	if ($delete) {
	
		echo "<script>
				window.alert('Data berhasil dihapus');
				location.replace('http://localhost/jamaahpk_db/form_tabel_makanan');
			  </script>";

	}

}
// END DELETE
?>


<?php

function insert_pola($koneksi)
{

	//$koneksi = mysqli_connect('localhost','root','','jamaahpk_db');

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == "insert_pola") 
	{
		
		if (isset($_POST['action']) && $_POST['action'] == 'submit_pola') 
		{

			// print_r($_POST);
			$id_registrasi = $_POST['id_registrasi'];
			$pola_tanggal = $_POST['pola_tanggal'];
			$arrayMakanan[0] = $_POST['pola_makanan1'];
			$arrayMakanan[1] = $_POST['pola_makanan2'];
			$arrayMakanan[2] = $_POST['pola_makanan3'];
			$listMakanan = $arrayMakanan[0].",".$arrayMakanan[1].",".$arrayMakanan[2];
			$arrayCemilan[0] = $_POST['pola_cemilan1'];
			$arrayCemilan[1] = $_POST['pola_cemilan2'];
			$arrayCemilan[2] = $_POST['pola_cemilan3'];
			$listCemilan = $arrayCemilan[0].",".$arrayCemilan[1].",".$arrayCemilan[2]; 
			
			if ($pola_tanggal == "") 
			{

				echo "<script>	
					window.alert('Tanggal tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			else 
			{

				$insert = mysqli_query($koneksi , "INSERT INTO tbl_pola_menu_makanan 
												   VALUES('','$id_registrasi','$pola_tanggal','$listMakanan','$listCemilan')");

				echo "<script>
						window.alert('Data Berhasil Dimasukkan');	
						location.replace('http://localhost/jamaahpk_db/form_pola_makan?id_registrasi=$id_registrasi');
					</script>";

				exit();
			
			}
		}
	}	
}
// END INSERT


//DELETE

function delete_pola($koneksi){
	//$koneksi = mysqli_connect('localhost','root','','jamaahpk_db');

	$id_delete_pola 	 = $_GET['delete_pola'];

	$delete_pola = mysqli_query($koneksi, "DELETE FROM tbl_pola_menu_makanan WHERE pola_ID=$id_delete_pola");

	if ($delete_pola) {
	
		echo "<script>
				window.alert('Data berhasil dihapus');
				window.history.back();
			  </script>";

	}

}
// END DELETE
?>


<?php

insert_makanan($koneksi);

insert_pola($koneksi);

edit_makanan($koneksi);

delete_makanan($koneksi);

delete_pola($koneksi);

?>