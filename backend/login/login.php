<?php
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    include '../../database/koneksi.php';

    $sqlLogin  = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
    $login     = mysqli_query($host, $sqlLogin);
    $cek       = mysqli_num_rows($login); 
    
    // cek apakah username dan password di temukan pada database
    if($cek > 0){
    
      $data = mysqli_fetch_assoc($login);
    
      // Cek data dengan level admin
      if($data['level']=="admin"){

        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";

        header("location:../../beranda.php?page=beranda");
      } else {
        header("location:../../login.php?pesan=Password_Salah");
      }
    }else{
      header("location:../../login.php?pesan=gagal");
    }
?>