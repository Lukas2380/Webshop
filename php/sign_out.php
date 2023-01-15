<?php
session_start();

// Unset all of the session variables
$_SESSION = array();

session_destroy();

echo "<script>location.href='../index.php';</script>";
?>