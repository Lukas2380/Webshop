<?php
session_start();

include "connectDatabase.php";

$user_id = $_SESSION['userid'];
$sql = "Delete from Cart where user_id = $user_id";
mysqli_query($conn, $sql);
?>