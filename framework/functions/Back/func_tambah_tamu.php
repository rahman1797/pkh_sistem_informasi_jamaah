<?php

include "../Library/koneksi.php";

  $jenis_identitas     = $_POST['jenis_identitas'];
  $no_identitas        = $_POST['no_identitas'];
  $nama                = $_POST['nama'];

  $gen                 = '';

  if(isset($_POST['gen']))
    {
      $gen    = $_POST['gen'];
    }
  else
    {
       echo "<script>window.alert('Maaf, Anda harus mengisi gender');
              window.history.back();
              </script>";
       die();
      
    }

  $tanggal             = $_POST['tanggal'];
  $tempat              = $_POST['tempat'];
  $telpon              = $_POST['telpon'];
  $email               = $_POST['confirm_email'];
  $provinsi            = $_POST['provinsi'];
  $kota                = $_POST['kota'];
  $kecamatan           = $_POST['kecamatan'];
  $alamat              = $_POST['alamat'];
  $instansi            = $_POST['instansi'];
  $keperluan           = $_POST['keperluan'];
  $profesi             = $_POST['profesi'];



  if(empty($jenis_identitas))
    {
      echo "<script>window.alert('Maaf, Anda harus mengisi gender');
              window.history.back();
              </script>";
      die();
    }
  else if(empty($no_identitas))
    {
      echo "<script>window.alert('Maaf, Anda harus mengisi NIK');
              window.history.back();
              </script>";
      die();
    }
  else if(empty($nama))
    {
      echo "<script>window.alert('Maaf, Anda harus mengisi nama lengkap');
              window.history.back();
              </script>";
      die();
    }
  else if(empty($tanggal))
    {
      echo "<script>window.alert('Maaf, Anda harus mengisi tanggal lahir');
              window.history.back();
              </script>";
      
      die();
    } 
  else if(empty($tempat))
    {
      echo "<script>window.alert('Maaf, Anda harus mengisi tempat');
              window.history.back();
              </script>";
      
      die();
    }
  else if(empty($telpon))
    {
      echo "<script>window.alert('Maaf, Anda harus mengisi nomor telepon');
              window.history.back();
              </script>";
      
      die();
    }
  else if(empty($email))
    {
      echo "<script>window.alert('Maaf, Anda harus mengisi email');
              window.history.back();
              </script>";
      
      die();
    }
  else if(empty($provinsi))
    {
      echo "<script>window.alert('Maaf, Anda harus mengisi provinsi');
              window.history.back();
              </script>";
      
      die();
    }
  else if(empty($kota))
    {
      echo "<script>window.alert('Maaf, Anda harus mengisi kota/kabupaten');
              window.history.back();
              </script>";
      
      die();
    }
  else if(empty($kecamatan))
    {
      echo "<script>window.alert('Maaf, Anda harus mengisi kecamatan');
              window.history.back();
              </script>";
      
      die();
    }
  else if(empty($alamat))
    {
      echo "<script>window.alert('Maaf, Anda harus mengisi alamat');
              window.history.back();
              </script>";
      
      die();
    }
  else if(empty($instansi))
    {
      echo "<script>window.alert('Maaf, Anda harus mengisi jurusan');
              window.history.back();
              </script>";
      
      die();
    }
  else if (empty($keperluan))
    {
      echo "<script>window.alert('Maaf, Anda harus mengisi keperluan');
              window.history.back();
              </script>";
      
      die();
    }
  else if (empty($profesi))
    {
      echo "<script>window.alert('Maaf, Anda harus mengisi profesi');
              window.history.back();
              </script>";
      
      die();
    }

  else
    {
      $query = "

        INSERT INTO
          tbl_tamu

        VALUES
          (
            '',
            '$jenis_identitas',
            '$no_identitas',
            '$nama',
            '$gen',
            '$tanggal',
            '$tempat',
            '$telpon',
            '$email',
            '$provinsi',
            '$kota',
            '$kecamatan',
            '$alamat',
            '$instansi',
            '$keperluan',
            '$profesi'          
          )
      ";


      if (is_numeric($no_identitas))
        {
          $result = mysqli_query($koneksi, $query);


          if($result)
            {
              echo "<script> alert ('Data Berhasil Dimasukkan');
              window.location = '../../daftar_tamu'</script>";
            }

        }

      else
        {
          echo "<script> alert ('Data Berhasil Dimasukkan');
          window.location = '../../daftar_tamu'</script>";
        }


    }

?>

