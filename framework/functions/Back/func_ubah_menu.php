<?php
include "../Library/koneksi.php";
$menu_ID		=	$_POST['menu_ID'];
$menu_nama		=	$_POST['menu_nama'];
$menu_isi		=	$_POST['menu_isi'];
$menu_harga		=	$_POST['menu_harga'];
$menu_status	=	$_POST['menu_status'];

$query = mysqli_query($koneksi,"UPDATE tbl_menu 
								SET menu_nama='$menu_nama', 
									menu_isi='$menu_isi', 
									menu_harga='$menu_harga', 
									menu_status='$menu_status' 
								WHERE menu_ID='$menu_ID'");
if ($query)
	{
		echo "<script>alert('Data Berhasil diperbaruhi!'); 
		window.location.replace('../../daftar_menu.php')</script>";	
	} 
else 
	{
		echo "gagal memperbaruhi data";
    }
?>