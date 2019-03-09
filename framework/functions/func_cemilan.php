<?php

error_reporting(0);

include("../library/koneksi.php");

// INSERT
function insert_cemilan($koneksi)
{

	//$koneksi = mysqli_connect('localhost','root','','jamaahpk_db');

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == "insert_cemilan") 
	{
		
		if (isset($_POST['action']) && $_POST['action'] == 'submit_cemilan') 
		{

			// print_r($_POST);
			$cemilan_nama = $_POST['cemilan_nama'];
			$cemilan_isi = $_POST['cemilan_isi'];
			$cemilan_harga = preg_replace('/\D/', '', $_POST['cemilan_harga']);
			$cemilan_status = $_POST['cemilan_status'];

			if ($cemilan_nama == "") 
			{

				echo "<script>	
					window.alert('Nama tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($cemilan_isi == "") 
			{
			
				echo "<script>	
					window.alert('Isi tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($cemilan_harga == "") 
			
			{
				echo "<script>	
					window.alert('Harga tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($cemilan_status == "") 
			{

				echo "<script>	
					window.alert('Status tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			else 
			{

				$insert = mysqli_query($koneksi , "INSERT INTO tbl_menu_cemilan 
												   VALUES('','$cemilan_nama','$cemilan_isi','$cemilan_harga','$cemilan_status')");

				echo "<script>
						window.alert('Data Berhasil Dimasukkan');	
						location.replace('http://localhost/jamaahpk_db/form_tabel_cemilan');
					</script>";

				exit();
			
			}
		}
	}	
}
// END INSERT
?>


<?php
// EDIT
function edit_cemilan($koneksi)
{

	//$koneksi = mysqli_connect('localhost','root','','jamaahpk_db');

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == "edit_cemilan") 
	{
		
		if (isset($_POST['action']) && $_POST['action'] == 'submit_cemilan') 
		{

			// print_r($_POST);

			$cemilan_ID 	= $_POST['cemilan_ID'];
			$cemilan_nama 	= $_POST['cemilan_nama'];
			$cemilan_isi 	= $_POST['cemilan_isi'];
			$cemilan_harga  = preg_replace('/\D/', '', $_POST['cemilan_harga']);
			$cemilan_status = $_POST['cemilan_status'];

			if ($cemilan_nama == "") 
			{

				echo "<script>	
					window.alert('Nama tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($cemilan_isi == "") 
			{
			
				echo "<script>	
					window.alert('Isi tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($cemilan_harga == "") 
			
			{
				echo "<script>	
					window.alert('Harga tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($cemilan_status == "") 
			{

				echo "<script>	
					window.alert('Status tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			else 
			{
				
				$update = mysqli_query($koneksi , "UPDATE tbl_menu_cemilan SET 
											cemilan_nama = '$cemilan_nama',
											cemilan_isi = '$cemilan_isi',
											cemilan_harga = '$cemilan_harga',
											cemilan_status = '$cemilan_status'
										 WHERE cemilan_ID = '$cemilan_ID'
					");

				echo "<script>
						window.alert('Data Berhasil Diubah');
						location.replace('http://localhost/jamaahpk_db/form_tabel_cemilan');
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

function delete_cemilan($koneksi){
	//$koneksi = mysqli_connect('localhost','root','','jamaahpk_db');

	$id_delete_cemilan 	 = $_GET['delete_cemilan'];

	$delete = mysqli_query($koneksi, "DELETE FROM tbl_menu_cemilan WHERE cemilan_ID=$id_delete_cemilan");

	if ($delete) {
	
		echo "<script>
				window.alert('Data berhasil dihapus');
				location.replace('http://localhost/jamaahpk_db/form_tabel_cemilan');
			  </script>";

	}

}
// END DELETE
?>


<?php

insert_cemilan($koneksi);


edit_cemilan($koneksi);


delete_cemilan($koneksi);

?>