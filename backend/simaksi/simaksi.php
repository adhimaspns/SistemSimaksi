<?php

  include '../../database/koneksi.php';


  //! Simpan Data Simaksi 
  if (isset($_POST['simpanSimaksi'])) {
    
    //! Variabel
    $gunung_id          = $_POST['gunung_id'];
    $satuan_pendakian   = ucwords(strtolower($_POST['satuan_pendakian'])); 
    $tgl_masuk          = $_POST['tgl_masuk']; 
    $tgl_keluar         = $_POST['tgl_keluar']; 
    $hariIni            = date('Ymd');
    $status_pendakian   = "Masih Mendaki";

    //! Hitung Selisih Hari
    $datetime1   = new DateTime($tgl_masuk);
    $datetime2   = new DateTime($tgl_keluar);
    $difference  = $datetime1->diff($datetime2);
    $total_hari  = $difference->days . " Hari";

    //! Buat Nomor Transaksi

      //! Cari Data 
      $sqlTransaksi  = "SELECT MAX(no_urut) AS last FROM simaksi WHERE no_urut LIKE '$hariIni%' "; 
      $query         = mysqli_query($host, $sqlTransaksi);
      $data          = mysqli_fetch_array($query);
      $trkhrNoTr     = $data['last'];

      //! Baca Nomor Urut Transaksi Terkahir
      $trkhrNoUrut  = substr($trkhrNoTr, 8, 4);

      //! No Urut++
      $nextNoUrut  = $trkhrNoUrut + 1;

      //! Buat Nomot Transaksi Berikutnya
      $nextNoTransaksi =  $hariIni.sprintf('%04s', $nextNoUrut);

    //! Akhir Buat Nomor Transaksi

    //! Insert Table Simaksi
    $insertSimaksi  = "INSERT INTO simaksi VALUES(0, '$nextNoTransaksi', '$hariIni', '$gunung_id', '$satuan_pendakian', '$tgl_masuk', '$tgl_keluar', '$total_hari', '$status_pendakian')";
    $queryKetua     = mysqli_query($host, $insertSimaksi);

    // //! Select No Urut Simaksi
    $selectNoUrut   = "SELECT * FROM simaksi ORDER BY no_urut DESC";
    $queryNoUrut    = mysqli_query($host, $selectNoUrut);
    $dataSimaksi    = mysqli_fetch_assoc($queryNoUrut);
    $NoUrut         = $dataSimaksi['no_urut']; 

    if ($queryNoUrut) {
      echo "
        <script>
          window.location.href='../../frontend/simaksi/form_anggota.php?simaksi=$NoUrut&gunung=$gunung_id&page=simaksi';
        </script>
      ";
    } else {
      echo "
        <script>
          alert('Data Gagal Ditambahkan!');
          window.location.href='../../frontend/simaksi/simaksi.php?page=datagunung';
        </script>
      ";
    }
  }

  //! Simpan Data Anggota
  if (isset($_POST['simpan_data_anggota'])) {
    
    //! Variabel
    $no_urut         = $_POST['no_urut'];
    $gunung_id       = $_POST['gunung_id'];
    $nama_lengkap    = ucwords(strtolower($_POST['nama_lengkap'])); 
    $jenis_kelamin   = $_POST['jenis_kelamin'];
    $alamat          = $_POST['alamat'];
    $no_telp         = $_POST['no_telp'];
    $status_anggota  = $_POST['status_anggota'];

    //! Select Harga Htm
    $selectHtm   = "SELECT * FROM data_gunung WHERE id_gunung = '$gunung_id' "; 
    $queryHtm    = mysqli_query($host, $selectHtm);
    $data_gunung = mysqli_fetch_assoc($queryHtm);
    $htm_gunung  = $data_gunung['htm'];

    //! Insert Data Anggota Detail Simaksi
    $insertDetailSimaksi   = "INSERT INTO detail_simaksi VALUES(0, '$no_urut', '$gunung_id', '$nama_lengkap', '$jenis_kelamin', '$alamat', '$no_telp', '$status_anggota', '$htm_gunung')";
    $queryInsertDetail     = mysqli_query($host, $insertDetailSimaksi);

    //! Insert Data Anggota Temp
    $insertTemp       = "INSERT INTO temp VALUES(0, '$no_urut', '$gunung_id', '$nama_lengkap', '$jenis_kelamin', '$alamat', '$no_telp', '$status_anggota', '$htm_gunung')"; 
    $queryInsertTemp  = mysqli_query($host, $insertTemp);

    if ($queryInsertTemp) {
      echo "
        <script>
          window.location.href='../../frontend/simaksi/form_anggota.php?simaksi=$no_urut&gunung=$gunung_id&page=simaksi';
        </script>
      ";
    } else {
      echo "
        <script>
          alert('Data Gagal Ditambahkan!');
          window.location.href='../../frontend/simaksi/simaksi.php?page=datagunung';
        </script>
      ";
    }

  } 

  //! Buat Nota
  if (isset($_POST['simpanDftrAnggota'])) {

    //! Variabel
    $noUrut           = $_POST['noUrut']; 
    $gunung_id        = $_POST['gunung_id']; 
    $tgl_masuk        = $_POST['tgl_masuk']; 
    $tgl_keluar       = $_POST['tgl_keluar']; 
    $jml_hari         = $_POST['jml_hari']; 
    $jumlah_pendaki   = $_POST['jumlah_pendaki']; 
    $biaya_total      = $_POST['biaya_total'];
    $status_pendakian = "Masih Mendaki";

    //! Waktu & Tanggal Hari ini 
    date_default_timezone_set('Asia/Jakarta');
    $tglWaktu        = date('Y-m-d H:i:s');

    //! Simpan Laporan
    $buatLaporan    = "INSERT INTO laporan VALUES(0, '$tglWaktu', '', '$noUrut', '$gunung_id', '$tgl_masuk', '$tgl_keluar', '$jml_hari', '$jumlah_pendaki', '$biaya_total', '$status_pendakian')"; 
    $queryLaporan   = mysqli_query($host, $buatLaporan);

    //! Hapus Data Temp
    $hapusTemp    = "DELETE FROM temp WHERE nomor_simaksi = '$noUrut' ";
    $queryTemp    = mysqli_query($host, $hapusTemp); 

    if ($queryTemp) {
      echo "
        <script>
          window.location.href='../../frontend/simaksi/nota.php?simaksi=$noUrut&page=simaksi';
        </script>
      ";
    } else {
      echo "
        <script>
          alert('Data Gagal Disimpan!');
          window.location.href='../../frontend/simaksi/form_anggota.php?simaksi=$noUrut&page=simaksi';
        </script>
      ";
    }
  } 

  //! Pendaki Turun
  if (isset($_POST['pendaki_turun'])) {

    //! Variabel
    $simaksi   = $_POST['noSimaksi'];
    $status    = "Sudah Turun";

    //! Waktu & Tanggal Hari ini 
    date_default_timezone_set('Asia/Jakarta');
    $tglWaktu        = date('Y-m-d H:i:s');

    //! Update status Simaksi
    $updateSimaksi  = "UPDATE simaksi SET status_pendakian = '$status' WHERE no_urut = '$simaksi' ";
    $querySimaksi   = mysqli_query($host, $updateSimaksi); 

    //! Update status Laporan
    $updateLaporan  = "UPDATE laporan SET lprn_status_pendakian = '$status', lprn_tgl_keluar = '$tglWaktu' WHERE nomor_simaksi = '$simaksi' ";
    $queryLaporan   = mysqli_query($host, $updateLaporan); 

    if ($queryLaporan) {
      echo "
        <script>
          window.location.href='../../frontend/simaksi/index.php?page=simaksi';
        </script>
      ";
    } else {
      echo "
        <script>
          alert('Data Gagal Diperbarui!');
          window.location.href='../../frontend/simaksi/index.php?page=simaksi';
        </script>
      ";
    }
  } 

?>