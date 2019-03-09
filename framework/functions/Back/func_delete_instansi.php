<?php
	include('../Library/koneksi.php');

 	$id =$_GET['id'];
      mysqli_query($koneksi,"DELETE FROM tbl_asal_instansi WHERE instansi_ID=$id");

?>
<script type="text/javascript">
	window.location.replace('../../daftar_instansi.php');
</script>