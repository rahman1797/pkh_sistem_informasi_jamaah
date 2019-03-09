<?php
	include('../Library/koneksi.php');

 	$id =$_GET['id'];
      mysqli_query($koneksi,"DELETE FROM tbl_fakultas WHERE fakultas_ID=$id");

?>
<script type="text/javascript">
	window.location.replace('../../daftar_fakultas');
</script>