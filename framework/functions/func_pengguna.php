<?php

SESSION_START();

error_reporting(0);

include("../library/koneksi.php");
// LOGIN
function login($koneksi)
{
	
	if (isset($_GET['action']) && $_GET['action'] == "login") 
	{	

		if (isset($_POST['action']) && $_POST['action'] == 'login_pengguna') 
		{
		
			$pengguna_username 	= $_POST['pengguna_username'];
			$pengguna_pass	 	= $_POST['pengguna_pass'];
			
			if ($pengguna_username == "") 
			{

				echo "<script>	
					window.alert('Username tidak boleh kosong');
					
					</script>";
			
			}

			elseif ($pengguna_pass == "") 
			{
			
				echo "<script>	
					window.alert('Password tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			else 
			{

				$login = mysqli_query($koneksi , "SELECT 
					pengguna_username, pengguna_pass, pengguna_ID 
					FROM tbl_pengguna
					WHERE 
					pengguna_username='$pengguna_username' AND pengguna_pass='$pengguna_pass'");
				
				$cek = mysqli_num_rows($login);

				$data_pengguna = mysqli_fetch_array($login);

				if ($cek > 0) {

					$_SESSION['ID'] = $data_pengguna['pengguna_ID'];
					$_SESSION['status'] = "login";
			
					echo "<script>
							window.alert('SELAMAT DATANG DI SISTEM INFORMASI JAMAAH PKH');	
							location.replace('http://localhost/jamaahpk_db/home');
						  </script>";

				}

				else {

					echo "<script>
							window.alert('GAGAL LOGIN');	
							location.replace('http://localhost/jamaahpk_db/login');
						  </script>";

				}

				exit();
			
			
			}
		}
	}
}
// END LOGIN


//LOGOUT
function logout(){
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == "logout") 
		{
		
			if (isset($_POST['action']) && $_POST['action'] == 'logout_pengguna') 
			{

				session_destroy();

				echo "<script>
							window.alert('Berhasil Logout');	
							location.replace('http://localhost/jamaahpk_db/login');
						  </script>";
			}

			exit();
		}
}
//END LOGOUT

// INSERT

function insert_pengguna($koneksi)
{

	//$koneksi = mysqli_connect('localhost','root','','jamaahpk_db');

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == "insert_pengguna") 
	{
		
		if (isset($_POST['action']) && $_POST['action'] == 'submit_pengguna') 
		{

			// print_r($_POST);
			$username 	= $_POST['username'];
			$password 	= $_POST['password2'];
			$email 		= $_POST['email'];
			$nama 		= $_POST['nama'];

			$cek_pengguna = mysqli_query($koneksi , "SELECT 
					pengguna_username 
					FROM tbl_pengguna
					WHERE 
					pengguna_username='$username'");

			$cek = mysqli_num_rows($cek_pengguna);

			if ($cek > 0) {
				
				echo "<script>	
					window.alert('Username telah terdaftar');
					window.history.back();
					</script>";

			}

			elseif ($username == "") 
			{

				echo "<script>	
					window.alert('Username tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($password == "") 
			{
			
				echo "<script>	
					window.alert('Password tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($email == "") 
			
			{
				echo "<script>	
					window.alert('Email tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			elseif ($nama == "") 
			{

				echo "<script>	
					window.alert('Nama tidak boleh kosong');
					window.history.back();
					</script>";
			
			}

			else 
			{

				$insert = mysqli_query($koneksi , "INSERT INTO tbl_pengguna 
												   VALUES('','$username','$password','$email','$nama')");

				echo "<script>
						window.alert('Data Berhasil Dimasukkan');	
						location.replace('http://localhost/jamaahpk_db/daftar_pengguna');
					</script>";
	
				return $insert;

				exit();
			
			}
		}
	}	
}
// END INSERT
?>


<?php
// EDIT
function edit_pengguna($koneksi)
{

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == "edit_pengguna") 
	{
		
		if (isset($_POST['action']) && $_POST['action'] == 'submit_pengguna') 
		{

			$get 			= $_POST['get_username'];
			$pengguna_ID 	= $_POST['pengguna_ID'];
			$username 		= $_POST['username'];
			$password 		= $_POST['password2'];
			$email 			= $_POST['email'];
			$nama 			= $_POST['nama'];

			$cek_pengguna = mysqli_query($koneksi , "SELECT 
					pengguna_username 
					FROM tbl_pengguna
					WHERE 
					pengguna_username='$username'");

			$cek = mysqli_num_rows($cek_pengguna);

			echo $get;
			echo $username;

			if ($username != $get) {

				if ($cek > 0) {
					
					echo "<script>	
					window.alert('Username telah terdaftar');
					window.history.back();
					</script>";
				
				}

				elseif ($username == "") 
				{
					echo "<script>	
						window.alert('Username tidak boleh kosong');
						window.history.back();
						</script>";
				}

				elseif ($password == "") 
				{
					echo "<script>	
						window.alert('Password tidak boleh kosong');
						window.history.back();
						</script>";
				}

				elseif ($email == "") 
				{
					echo "<script>	
						window.alert('Email tidak boleh kosong');
						window.history.back();
						</script>";
				}

				elseif ($nama == "") 
				{
					echo "<script>	
						window.alert('Nama tidak boleh kosong');
						window.history.back();
						</script>";
				}

				else 
				{
					
					$update = mysqli_query($koneksi , "UPDATE tbl_pengguna SET 
												pengguna_username = '$username',
												pengguna_pass = '$password',
												pengguna_email = '$email',
												pengguna_nama = '$nama'
											 WHERE pengguna_ID = '$pengguna_ID'
						");

					echo "<script>
							window.alert('Data Berhasil Diubah');
							location.replace('http://localhost/jamaahpk_db/daftar_pengguna');
						</script>";

					return $update;

					exit();
				
				}
				
			}

			elseif ($username == "") 
			{
				echo "<script>	
					window.alert('Username tidak boleh kosong');
					window.history.back();
					</script>";
			}

			elseif ($password == "") 
			{
				echo "<script>	
					window.alert('Password tidak boleh kosong');
					window.history.back();
					</script>";
			}

			elseif ($email == "") 
			{
				echo "<script>	
					window.alert('Email tidak boleh kosong');
					window.history.back();
					</script>";
			}

			elseif ($nama == "") 
			{
				echo "<script>	
					window.alert('Nama tidak boleh kosong');
					window.history.back();
					</script>";
			}

			else 
			{
				
				$update = mysqli_query($koneksi , "UPDATE tbl_pengguna SET 
											pengguna_username = '$username',
											pengguna_pass = '$password',
											pengguna_email = '$email',
											pengguna_nama = '$nama'
										 WHERE pengguna_ID = '$pengguna_ID'
					");

				echo "<script>
						window.alert('Data Berhasil Diubah');
						location.replace('http://localhost/jamaahpk_db/daftar_pengguna');
					</script>";

				return $update;

				exit();
			
			}
		}
	}	
}
// END EDIT
?>

<?php
//DELETE

function delete($koneksi){

	$id_delete 	 = $_GET['delete_ID'];
		
	$delete = mysqli_query($koneksi, "DELETE FROM tbl_pengguna WHERE pengguna_ID=$id_delete");
	
	if ($delete) 
	{
		session_destroy();
		
		echo "<script>
				window.alert('Data berhasil dihapus');
				location.replace('http://localhost/jamaahpk_db/daftar_pengguna');
			  </script>";

	}


	
}
// END DELETE
?>


<?php

login($koneksi);

logout();

edit_pengguna($koneksi);

insert_pengguna($koneksi);

delete($koneksi);

?>