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

  if (isset($_POST['editDataGunung'])) {

    //! Variabel 
    $id           = $_POST['id'];
    $nama_gunung  = $_POST['nama_gunung'];
    $mdpl         = $_POST['mdpl'];
    $alamat       = $_POST['alamat'];
    $harga_satuan = $_POST['harga_satuan'];
    $satuan       = $_POST['satuan'];
    $htm          = $_POST['htm'];

    //! Upadate Data
    $updateDataGunung   = "UPDATE data_gunung SET nama_gunung = '$nama_gunung', mdpl ='$mdpl', alamat_gunung = '$alamat', unit_htm = '$harga_satuan', satuan_htm = '$satuan', htm = '$htm' WHERE id_gunung = '$id' ";
    $querUpdateGunung   = mysqli_query($host, $updateDataGunung); 

    if ($querUpdateGunung) {
      echo "
        <script>
          window.location.href='../../frontend/data_gunung/index.php?page=datagunung';
        </script>
      ";
    } else {
      echo "
        <script>
          alert('Operasi Gagal');
          window.location.href='../../frontend/data_gunung/edit.php?id=$id&page=datagunung';
        </script>
      ";
    }
  }
?>