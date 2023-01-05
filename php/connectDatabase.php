<?php
  // Connect to the database
  $host = "db";
  $user = "root";
  $password = "example";
  $dbname = "Webshop";

  // Create connection
  $conn = mysqli_connect($host, $user, $password, $dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>
