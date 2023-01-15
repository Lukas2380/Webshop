<?php
    include "connectDatabase.php";
    $user_id = $_REQUEST['u'];
    $comment = $_REQUEST['c'];
    $product_id = $_REQUEST['p'];
    $query = "INSERT INTO Comments (user_id, comment, product_id, created_at) VALUES ('$user_id','$comment','$product_id', NOW())";
    echo $query;
    mysqli_query($conn, $query);
?>