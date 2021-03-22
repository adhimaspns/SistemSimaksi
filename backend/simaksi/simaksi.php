<?php

  include '../../database/koneksi.php';


  //! Simpan Ketua Rombongan 
  if (isset($_POST['simpanKetuaRombongan'])) {
    
    //! Variabel
    $nama_lengkap   =  ucwords(strtolower($_POST['nama_lengkap'])); 
    $jenis_kelamin  = $_POST['jenis_kelamin']; 
    $pekerjaan      = ucwords(strtolower($_POST['pekerjaan'])) ; 
    $alamat         = $_POST['alamat']; 
    $tgl_masuk      = $_POST['tgl_masuk']; 
    $tgl_keluar     = $_POST['tgl_keluar']; 
    $no_telp        = $_POST['no_telp']; 
    
    //! Hitung Selisih Hari
    $datetime1   = new DateTime($tgl_masuk);
    $datetime2   = new DateTime($tgl_keluar);
    $difference  = $datetime1->diff($datetime2);
    $total_hari  = $difference->days . " Hari";

    //! Insert Table Ketua Anggota
    $insertKetua    = "INSERT INTO ketua_anggota VALUES(0, '$nama_lengkap', '$jenis_kelamin', '$pekerjaan', '$alamat', '$tgl_masuk', '$tgl_keluar', '$total_hari', '$no_telp')";
    $queryKetua     = mysqli_query($host, $insertKetua);

    //! Select Id Ketua Rombongan
    $selectIDKetua   = "SELECT * FROM ketua_anggota ORDER BY id_ketua_anggota DESC";
    $queryIdKetua    = mysqli_query($host, $selectIDKetua);
    $dataKetua       = mysqli_fetch_assoc($queryIdKetua);
    $idKetua         = $dataKetua['id_ketua_anggota']; 

    if ($queryIdKetua) {
      echo "
        <script>
          window.location.href='../../frontend/simaksi/form_anggota.php?ketua=$idKetua&page=datagunung';
        </script>
      ";
    } else {
      echo "
        <script>
          alert('Data Gagal Dihapus!');
          window.location.href='../../frontend/simaksi/index.php?page=datagunung';
        </script>
      ";
    }
  }

?>