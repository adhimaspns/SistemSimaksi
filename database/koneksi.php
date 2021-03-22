<?php

  $host  = mysqli_connect('localhost', 'root', '', 'pendataansimaksi');

  if (!$host) {
    echo "Database Tidak Ditemukan"; 
  }

?>