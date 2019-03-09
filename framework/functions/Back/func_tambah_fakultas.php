<?php
	include('../Library/koneksi.php');

if (isset($_POST['submit'])) {
	$fakultas_nama = $_POST['fakultas_nama'];

	if ($fakultas_nama == "") {
		echo "<script>	
				window.alert('Isi data nama fakultas');
				window.history.back();
				</script>";
	}
	
	else {
		mysqli_query($koneksi , "INSERT INTO tbl_fakultas VALUES('','$fakultas_nama')");

		echo "<script>
				window.alert('Data Berhasil Dimasukkan');
				window.location.replace('../../daftar_fakultas');
			</script>";
	}
};
?>