<?php

error_reporting(0);

include("../library/koneksi.php");

// INSERT
function insert_keuangan($koneksi)
{

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == "insert_keuangan") 
	{
		
		if (isset($_POST['action']) && $_POST['action'] == 'submit_keuangan') 
		{

			$keuangan_catatan = $_POST['keuangan_catatan'];
			$keuangan_tanggal = $_POST['keuangan_tanggal'];
			$keuangan_masuk = preg_replace('/\D/', '', $_POST['keuangan_masuk']);
			$keuangan_keluar = preg_replace('/\D/', '', $_POST['keuangan_keluar']);

			if ($keuangan_catatan == "") 
			{

				echo "<script>	
					window.alert('Catatan tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($keuangan_tanggal == "") 
			{
			
				echo "<script>	
					window.alert('Tanggal tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			else 
			{

				$insert = mysqli_query($koneksi , "INSERT INTO tbl_keuangan 
												   VALUES('','$keuangan_tanggal','$keuangan_masuk','$keuangan_keluar','$keuangan_catatan')");

				echo "<script>
						window.alert('Data Berhasil Dimasukkan');	
						location.replace('http://localhost/jamaahpk_db/form_keuangan');
					</script>";

				exit();
			
			}
		}
	}	
}
// END INSERT
?>


<?php
//DELETE

function delete_keuangan($koneksi){
	//$koneksi = mysqli_connect('localhost','root','','jamaahpk_db');

	$id_delete_keuangan 	 = $_GET['delete_keuangan'];

	$delete = mysqli_query($koneksi, "DELETE FROM tbl_keuangan WHERE keuangan_ID=$id_delete_keuangan");

	if ($delete) {
	
		echo "<script>
				window.alert('Data berhasil dihapus');
				location.replace('http://localhost/jamaahpk_db/form_keuangan');
			  </script>";

	}

}
// END DELETE
?>




<?php

insert_keuangan($koneksi);

delete_keuangan($koneksi);

?>