<?php

  include '../../database/koneksi.php';

  $id   = $_GET['id'];

  $hapusGunung    = "DELETE FROM data_gunung WHERE id_gunung = '$id' ";
  $queryGunung    = mysqli_query($host, $hapusGunung);

  if ($queryGunung) {
    echo "
      <script>
        window.location.href='../../frontend/data_gunung/index.php?page=datagunung';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('Data Gagal Dihapus!');
        window.location.href='../../frontend/data_gunung/index.php?page=datagunung';
      </script>
    ";
  }
?>