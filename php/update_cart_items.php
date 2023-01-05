<?php
    session_start();
    include "../php/connectDatabase.php";

    $userid = $_SESSION['userid'];
    $sql = "SELECT SUM(quantity) FROM Cart  WHERE user_id = '$userid';";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $num = $row[0];
    
    echo $num;
?>