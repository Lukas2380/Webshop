<?php
include "connectDatabase.php";

$table = $_REQUEST['t'];
$id = $_REQUEST['id'];

$sql = "DELETE FROM $table where id = $id";
mysqli_query($conn, $sql);

echo "<script>location.href='../admin.php';</script>";
?>