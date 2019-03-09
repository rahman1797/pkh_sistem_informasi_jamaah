<?php
include "../Library/koneksi.php";
$fakultas_ID	=	$_POST['fakultas_ID'];
$fakultas_nama	=	$_POST['fakultas_nama'];

$query = mysqli_query($koneksi,"UPDATE tbl_fakultas 
								SET fakultas_nama='$fakultas_nama'  
								WHERE fakultas_ID='$fakultas_ID'");
if ($query)
	{
		echo "<script>alert('Data Berhasil diperbaruhi!'); 
		window.location.replace('../../daftar_fakultas.php')</script>";	
	} 
else 
	{
		echo "gagal memperbaruhi data";
    }
?>