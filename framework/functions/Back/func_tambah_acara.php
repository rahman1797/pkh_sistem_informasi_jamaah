<?php
	include('../Library/koneksi.php');

if (isset($_POST['submit'])) {
	$nama_acara = $_POST['nama_acara'];
	$lokasi_acara = $_POST['lokasi_acara'];
	$acara_mulai = $_POST['acara_mulai'];
	$acara_berakhir = $_POST['acara_berakhir'];
	$kuota = $_POST['kuota'];
	$status = $_POST['status'];
	$detail = $_POST['detail'];

	if ($nama_acara == "") {
		echo "<script>	
				window.alert('Isi data nama acara');
				window.history.back();
				</script>";
	}
	elseif ($lokasi_acara == "") {
		echo "<script>
				window.alert('Isi data lokasi acara');
				window.history.back();
				</script>";
		
	}
	elseif ($acara_mulai == "") {
		echo "<script>
				window.alert('Isi data acara mulai');
				window.history.back();
				</script>";
		
	}
	elseif ($acara_berakhir == "") {
		echo "<script>
				windpw.alert('Isi data acara berakhir');
				window.history.back();
				</script>";
	}
	elseif ($kuota == "") {
		echo "<script>
				windpw.alert('Isi data kuota');
				window.history.back();
				</script>";
	}
	elseif ($status == "") {
		echo "<script>
				windpw.alert('Isi data status');
				window.history.back();
				</script>";
	}
	elseif ($detail == "") {
		echo "<script>
				windpw.alert('Isi data detail');
				window.history.back();
				</script>";
	}

	else {
		mysqli_query($koneksi , "INSERT INTO tbl_acara VALUES('','$nama_acara','$lokasi_acara','$acara_mulai','$acara_berakhir','$kuota','$status','$detail')");

		echo "<script>
				window.alert('Data Berhasil Dimasukkan');
				window.location.replace('../../daftar_acara');
			</script>";
	}
};
?>