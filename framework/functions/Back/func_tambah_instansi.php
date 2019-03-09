<?php

  include('../Library/koneksi.php');

  //Cek Validasi
  if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //Validasi Nama Instansi
        if (empty($_POST["nama"]))
          {
              echo "<script>
              alert('Maaf, Anda harus mengisi Nama');
              window.history.back();";
          }

        else
          {
              $nama = ($_POST["nama"]);
          }


        //Validasi Proinsi
        if (empty($_POST["provinsi"]))
          {
                echo "<script>
              alert('Maaf, Anda harus mengisi provinsi');
              window.history.back();";
          }

        else
          {
                $provinsi            = $_POST['provinsi'];
          }


        //Validasi Kota
        if (empty($_POST["kota"]))
          {
                echo "<script>
              alert('Maaf, Anda harus mengisi Kota');
              window.history.back();";
          }

        else
          {
                $kota                = $_POST['kota'];
          }


        //Validasi Kecamatan
        if (empty($_POST["kecamatan"]))
          {
                echo "<script>
              alert('Maaf, Anda harus mengisi Kecamatan');
              window.history.back();";
          }

        else
          {
                $kecamatan           = $_POST['kecamatan'];
          }


        //Validasi Alamat
        if (empty($_POST["alamat"]))
          {
                echo "<script>
              alert('Maaf, Anda harus mengisi alamat');
              window.history.back();";
          }

        else
          {
                $alamat           = $_POST['alamat'];
          }


        //Validasi Nomor Telepon        
        if (is_numeric($_POST["telpon"]))
          {
              $telpon              = $_POST['telpon'];
          }

        else
          {
              echo "<script>
              alert('Maaf, Anda harus mengisi telepon dengan angka');
              window.history.back();";  
          }



        //Validasi Bidang Instansi
        if (empty($_POST["bidang"]))
          {
              echo "<script>
              alert('Maaf, Anda harus mengisi bidang instansi');
              window.history.back();";
          }

        else
          {
              $bidang = ($_POST["bidang"]);

              // check if name only contains letters and whitespace
              if (!preg_match("/^[a-zA-Z ]*$/",$bidang))
                  {
                      die("Maaf, bidang instansi hanya boleh diisi oleh huruf dan spasi!!");
                  }
          }


        //Validasi Jenis Instansi
        if (empty($_POST["jenis"]))
          {
              echo "<script>
              alert('Maaf, Anda harus mengisi jenis');
              window.history.back();";
          }

        else
          {
              $jenis = ($_POST["jenis"]);

              // check if name only contains letters and whitespace
              if (!preg_match("/^[a-zA-Z ]*$/",$jenis))
                  {
                      die("Maaf, jenis instansi hanya boleh diisi oleh huruf dan spasi!!");
                  }
          }


        //Validasi Fakultas
        
              $fakultas = ($_POST["fakultas"]);


        $query = "

        INSERT INTO
          tbl_asal_instansi

        VALUES
          (
            '',
            '$nama',
            '$provinsi',
            '$kota',
            '$kecamatan',
            '$alamat',
            '$telpon',
            '$bidang',
            '$jenis',
            '$fakultas'
          )
      ";


      $result = mysqli_query($koneksi, $query);


      if($result)
            {
              echo "<script> alert ('Data Berhasil Ditambah');
              window.location = '../../daftar_instansi.php'</script>";
            }

      elseif ($result =="") {
        echo "<script> alert ('Data gagall Ditambah');
              </script>";
      }

    };


?>

