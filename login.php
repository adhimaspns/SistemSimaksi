<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Login</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <center>
    <h1 class="margin-top-100">Form Login Pendataan Simaksi</h1>
    <?php
      if (isset($_GET['pesan']) ) {
        if ($_GET['pesan'] == "gagal") {
          echo "
            <div class='alert margin-20-0' style='width: 50%;'>
              Username & Password Tidak Cocok!
            </div>
          ";
        } 
      } 
    ?>
    <div class="kotak-form" style="width: 50%;">
      <form action="backend/login/login.php" method="POST">
        <label class="float-kiri">Username</label>
        <input type="text" name="username" class="form">

        <label class="float-kiri">Password</label>
        <input type="password" name="password" class="form">

        <input type="submit" class="button-form-full tmbl-biru" name="tombol-login" value="Login">
      </form>
    </div>
  </center>
</body>
</html>