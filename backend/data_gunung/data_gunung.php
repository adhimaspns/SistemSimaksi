<?php

  include '../../database/koneksi.php';

  if (isset($_POST['simpanDataGunung'])) {
    
    //! Variabel 
    $nama_gunung  = ucwords(strtolower($_POST['nama_gunung']));
    $mdpl         = ucwords(strtolower($_POST['mdpl']));
    $alamat       = $_POST['alamat'];
    $harga_satuan = $_POST['harga_satuan'];
    $satuan       = ucwords(strtolower($_POST['satuan'])) ;
    $htm          = $_POST['htm'];

    //! Insert Data Gunung
    $insertDataGunung   = "INSERT INTO data_gunung VALUES(0, '$nama_gunung', '$mdpl', '$alamat', '$harga_satuan', '$satuan', '$htm')";
    $queryDataGunung    = mysqli_query($host, $insertDataGunung);
    
    if ($queryDataGunung) {
      echo "
        <script>
          window.location.href='../../frontend/data_gunung/index.php?page=datagunung';
        </script>
      ";
    } else {
      echo "
        <script>
          alert('Operasi Gagal');
          window.location.href='../../frontend/data_gunung/form_tambah.php?page=datagunung';
        </script>
      ";
    }
    
  }





?>