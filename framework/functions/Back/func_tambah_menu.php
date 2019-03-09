<?php
	include('../Library/koneksi.php');

if (isset($_POST['submit'])) {
	$nama_menu = $_POST['nama_menu'];
	$isi_menu = $_POST['isi_menu'];
	$harga = $_POST['harga'];
	$status = $_POST['status'];

	if ($nama_menu == "") {
		echo "<script>	
				window.alert('Isi data nama menu');
				window.history.back();
				</script>";
	}
	elseif ($isi_menu == "") {
		echo "<script>
				window.alert('Isi data isi menu');
				window.history.back();
				</script>";
		
	}
	elseif ($harga == "") {
		echo "<script>
				window.alert('Isi data harga');
				window.history.back();
				</script>";
		
	}
	elseif ($status == "") {
		echo "<script>
				windpw.alert('Isi data status');
				window.history.back();
				</script>";
	}
	else {
		mysqli_query($koneksi , "INSERT INTO tbl_menu VALUES('','$nama_menu','$isi_menu','$harga','$status')");

		echo "<script>
				window.alert('Data Berhasil Dimasukkan');
				window.location.replace('../../tambah_menu');
			</script>";
	}
};
?>