<?php
include "../Library/koneksi.php";
$instansi_ID		=	$_POST['instansi_ID'];
$instansi_nama		=	$_POST['nama'];
$instansi_provinsi	=	$_POST['provinsi'];
$instansi_kota		=	$_POST['kota'];
$instansi_kecamatan	=	$_POST['kecamatan'];
$instansi_alamat	=	$_POST['alamat'];
$instansi_telp		=	$_POST['telpon'];
$instansi_bidang	=	$_POST['bidang'];
$instansi_jenis		=	$_POST['jenis'];
$instansi_fakultas_id	=	$_POST['fakultas'];

$query = mysqli_query($koneksi,"UPDATE tbl_asal_instansi
								SET instansi_nama			='$instansi_nama', 
									instansi_provinsi		='$instansi_provinsi', 
									instansi_kota			='$instansi_kota', 
									instansi_kecamatan		='$instansi_kecamatan',
									instansi_alamat			='$instansi_alamat', 
									instansi_telp			='$instansi_telp', 
									instansi_bidang			='$instansi_bidang', 
									instansi_jenis			='$instansi_jenis',
									instansi_fakultas_id	='$instansi_fakultas_id'
								WHERE instansi_ID 			='$instansi_ID'");
if ($query)
	{
		echo "<script>alert('Data Berhasil Diperbaharui!'); 
		window.location.replace('../../daftar_instansi.php')</script>";	
	} 
else 
	{
		echo "Gagal mengganti data";
    }
?>