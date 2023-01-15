<?php
  $host = "db";
  $user = "root";
  $password = "example";
  $dbname = "Webshop";

  $conn = mysqli_connect($host, $user, $password, $dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>
