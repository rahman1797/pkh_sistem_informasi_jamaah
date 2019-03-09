<?php

error_reporting(0);

include("../library/koneksi.php");

// INSERT
function insert_jenis_tamu($koneksi)
{

	//$koneksi = mysqli_connect('localhost','root','','jamaahpk_db');

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == "insert_jenis_tamu") 
	{
		
		if (isset($_POST['action']) && $_POST['action'] == 'submit_jenis_tamu') 
		{

			// print_r($_POST);
			$jenis_tamu= $_POST['jenis_tamu'];


			if ($jenis_tamu == "") 
			{

				echo "<script>	
					window.alert('Nama tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			else 
			{

				$insert = mysqli_query($koneksi , "INSERT INTO tbl_jenis_tamu 
												   VALUES('','$jenis_tamu')");

				echo "<script>
						window.alert('Data Berhasil Dimasukkan');	
						location.replace('http://localhost/jamaahpk_db/jenis_tamu');
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
function edit_jenis_tamu($koneksi)
{

	//$koneksi = mysqli_connect('localhost','root','','jamaahpk_db');

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == "edit_jenis_tamu") 
	{
		
		if (isset($_POST['action']) && $_POST['action'] == 'submit_jenis_tamu') 
		{

			// print_r($_POST);

			$jenis_tamu_ID 	= $_POST['jenis_tamu_ID'];
			$jenis_tamu 	= $_POST['jenis_tamu'];
			
			if ($jenis_tamu == "") 
			{

				echo "<script>	
					window.alert('Nama tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			else 
			{
				
				$update = mysqli_query($koneksi , "UPDATE tbl_jenis_tamu SET 
											jenis_tamu_nama = '$jenis_tamu' WHERE jenis_tamu_ID = '$jenis_tamu_ID'
					");

				echo "<script>
						window.alert('Data Berhasil Diubah');
						location.replace('http://localhost/jamaahpk_db/jenis_tamu');
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

function delete_jenis_tamu($koneksi){
	//$koneksi = mysqli_connect('localhost','root','','jamaahpk_db');

	$id_delete_jenis_tamu 	 = $_GET['delete_jenis_tamu'];

	$delete = mysqli_query($koneksi, "DELETE FROM tbl_jenis_tamu WHERE jenis_tamu_ID=$id_delete_jenis_tamu");

	if ($delete) {
	
		echo "<script>
				window.alert('Data berhasil dihapus');
				location.replace('http://localhost/jamaahpk_db/jenis_tamu');
			  </script>";

	}

}
// END DELETE
?>

<?php

insert_jenis_tamu($koneksi);

edit_jenis_tamu($koneksi);

delete_jenis_tamu($koneksi);

?>