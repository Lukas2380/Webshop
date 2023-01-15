<?php
include "connectDatabase.php";

$id = $_REQUEST['id'];

$sql = "DELETE FROM Category where id = $id";
mysqli_query($conn, $sql);

echo "<script>location.href='../admin.php';</script>";
?>