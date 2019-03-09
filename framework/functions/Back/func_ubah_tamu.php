<?php
	include "../Library/koneksi.php";

	$tamu_ID				=	$_POST['tamu_ID'];
	$tamu_jenis_identitas	=	$_POST['tamu_jenis_identitas'];
	$tamu_no_identitas		=	$_POST['tamu_no_identitas'];
	$tamu_name				=	$_POST['tamu_name'];
	$tamu_jenis_kelamin		=	$_POST['tamu_jenis_kelamin'];
	$tamu_tgl_lahir			=	$_POST['tamu_tgl_lahir'];
	$tamu_tempat_lahir		=	$_POST['tamu_tempat_lahir'];
	$tamu_no_telp			=	$_POST['tamu_no_telp'];
	$tamu_email 			=	$_POST['tamu_email'];
	$tamu_provinsi			=	$_POST['tamu_provinsi'];
	$tamu_kota				=	$_POST['tamu_kota'];
	$tamu_kecamatan			=	$_POST['tamu_kecamatan'];
	$tamu_alamat			=	$_POST['tamu_alamat'];
	$tamu_instansi			=	$_POST['tamu_instansi'];
	$tamu_keperluan			=	$_POST['tamu_keperluan'];
	$tamu_profesi			=	$_POST['tamu_profesi'];

	$query = mysqli_query($koneksi,"UPDATE tbl_tamu 
									SET tamu_jenis_identitas='$tamu_jenis_identitas', 
										tamu_no_identitas='$tamu_no_identitas', 
										tamu_name='$tamu_name', 
										tamu_jenis_kelamin='$tamu_jenis_kelamin', 
										tamu_tgl_lahir='$tamu_tgl_lahir', 
										tamu_tempat_lahir='$tamu_tempat_lahir', 
										tamu_no_telp='$tamu_no_telp', 
										tamu_email='$tamu_email', 
										tamu_provinsi='$tamu_provinsi', 
										tamu_kecamatan='$tamu_kecamatan', 
										tamu_kota='$tamu_kota',
										tamu_alamat='$tamu_alamat', 
										tamu_instansi='$tamu_instansi', 
										tamu_keperluan='$tamu_keperluan', 
										tamu_profesi='$tamu_profesi' 
									
									WHERE tamu_ID='$tamu_ID'")or die(mysql_error());
	if ($query)
		{
			echo "<script>alert('Data Berhasil diperbaruhi!'); 
			window.location = '../../daftar_tamu.php'</script>";	
		} 
	else 
		{
			echo "gagal memperbaruhi data";
	    }
?>