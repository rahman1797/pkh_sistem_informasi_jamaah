<?php

error_reporting(0);

include("../library/koneksi.php");


function insert_todolist($koneksi)
{
	$new_todolist	=	$_POST['todolist'];
	$date_now		= 	$_POST['dateNow'];

	if (!isset($_POST['todolist'])) {
		echo "<script>
			window.alert('Keterangan harus diisi');
			window.history.back();
		</script>";

	}

	else {

		$inserDo = mysqli_query($koneksi, "INSERT INTO tbl_todolist VALUES ('','$date_now','$new_todolist','')");

		if ($inserDo) {
			echo "<script>
				window.alert('Berhasil menambahkan catatan');
				window.history.back();
			</script>";
		}

		else {
			echo "<script>
				window.alert('Gagal menambahkan catatan');
				window.history.back();
			</script>";
		}

		
	}

}

function delete_todolist($koneksi){
	//$koneksi = mysqli_connect('localhost','root','','jamaahpk_db');
	$id_delete = $_GET['delete_todolist'];

	$delete = mysqli_query($koneksi, "DELETE FROM tbl_todolist WHERE todolist_ID=$id_delete");

	if ($delete) {
	
		echo "<script>
				window.alert('Catatan berhasil dihapus');
				location.replace('http://localhost/jamaahpk_db/home');
			  </script>";

	}

}

function check_todolist($koneksi){
	//$koneksi = mysqli_connect('localhost','root','','jamaahpk_db');
	$id_check = $_GET['check_todolist'];

	$check = mysqli_query($koneksi, "UPDATE tbl_todolist SET todolist_status='1' WHERE todolist_ID=$id_check");

	if ($check) {
	
		echo "<script>
				window.alert('Catatan telah ditutup');
				location.replace('http://localhost/jamaahpk_db/home');
			  </script>";

	}

}

function uncheck_todolist($koneksi){
	//$koneksi = mysqli_connect('localhost','root','','jamaahpk_db');
	$id_uncheck = $_GET['uncheck_todolist'];

	$uncheck = mysqli_query($koneksi, "UPDATE tbl_todolist SET todolist_status='0' WHERE todolist_ID=$id_uncheck");

	if ($uncheck) {
	
		echo "<script>
				window.alert('Catatan telah dibuka');
				location.replace('http://localhost/jamaahpk_db/home');
			  </script>";

	}

}

delete_todolist($koneksi);

check_todolist($koneksi);

uncheck_todolist($koneksi);