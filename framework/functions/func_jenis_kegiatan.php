<?php

error_reporting(0);

include("../library/koneksi.php");

// INSERT
function insert_jenis_kegiatan($koneksi)
{

	//$koneksi = mysqli_connect('localhost','root','','jamaahpk_db');

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == "insert_jenis_kegiatan") 
	{
		
		if (isset($_POST['action']) && $_POST['action'] == 'submit_jenis_kegiatan') 
		{

			// print_r($_POST);
			$jenis_kegiatan= $_POST['jenis_kegiatan'];


			if ($jenis_kegiatan == "") 
			{

				echo "<script>	
					window.alert('Nama tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			else 
			{

				$insert = mysqli_query($koneksi , "INSERT INTO tbl_jenis_kegiatan 
												   VALUES('','$jenis_kegiatan')");

				echo "<script>
						window.alert('Data Berhasil Dimasukkan');	
						location.replace('http://localhost/jamaahpk_db/jenis_kegiatan');
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
function edit_jenis_kegiatan($koneksi)
{

	//$koneksi = mysqli_connect('localhost','root','','jamaahpk_db');

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == "edit_jenis_kegiatan") 
	{
		
		if (isset($_POST['action']) && $_POST['action'] == 'submit_jenis_kegiatan') 
		{

			// print_r($_POST);

			$jenis_kegiatan_ID 	= $_POST['jenis_kegiatan_ID'];
			$jenis_kegiatan 	= $_POST['jenis_kegiatan'];
			
			if ($jenis_kegiatan == "") 
			{

				echo "<script>	
					window.alert('Nama tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			else 
			{
				
				$update = mysqli_query($koneksi , "UPDATE tbl_jenis_kegiatan SET 
											jenis_kegiatan_nama = '$jenis_kegiatan' WHERE jenis_kegiatan_ID = '$jenis_kegiatan_ID'
					");

				echo "<script>
						window.alert('Data Berhasil Diubah');
						location.replace('http://localhost/jamaahpk_db/jenis_kegiatan');
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

function delete_jenis_kegiatan($koneksi){
	//$koneksi = mysqli_connect('localhost','root','','jamaahpk_db');

	$id_delete_jenis_kegiatan 	 = $_GET['delete_jenis_kegiatan'];

	$delete = mysqli_query($koneksi, "DELETE FROM tbl_jenis_kegiatan WHERE jenis_kegiatan_ID=$id_delete_jenis_kegiatan");

	if ($delete) {
	
		echo "<script>
				window.alert('Data berhasil dihapus');
				location.replace('http://localhost/jamaahpk_db/jenis_kegiatan');
			  </script>";

	}

}
// END DELETE
?>

<?php

insert_jenis_kegiatan($koneksi);

edit_jenis_kegiatan($koneksi);

delete_jenis_kegiatan($koneksi);

?>