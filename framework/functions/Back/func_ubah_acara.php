<?php
include "../Library/koneksi.php";

$acara_ID = $_POST['acara_ID'];
$nama_acara = $_POST['acara_nama'];
$lokasi_acara = $_POST['lokasi_acara'];
$acara_mulai = $_POST['acara_mulai'];
$acara_berakhir = $_POST['acara_berakhir'];
$kuota = $_POST['kuota'];
$status = $_POST['status'];
$detail = $_POST['detail'];

$query = mysqli_query($koneksi,"UPDATE tbl_acara 
								SET acara_nama='$nama_acara', 
									acara_lokasi='$lokasi_acara', 
									acara_waktu_mulai='$acara_mulai', 
									acara_waktu_selesai='$acara_berakhir',
									acara_kuota='$kuota', 
									acara_status='$status', 
									acara_detail='$detail' 
								WHERE acara_ID='$acara_ID'");
if ($query)
	{
		echo "<script>alert('Data Berhasil diperbaruhi!'); 
		window.location.replace('../../daftar_acara')</script>";	
	} 
else 
	{
		echo "gagal memperbaruhi data";
    }
?>