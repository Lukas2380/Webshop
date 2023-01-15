<?php
    include "connectDatabase.php";
    $product_id = $_REQUEST['p'];
    $query = "SELECT u.username, c.comment, c.created_at FROM Comments c JOIN Users u ON c.user_id = u.id WHERE c.product_id = '$product_id';";
    $result = mysqli_query($conn, $query);
    while($comment = mysqli_fetch_assoc($result)){
        echo "<div class='card'>
            <div class='card-header d-flex justify-content-between'>".$comment['username']."<span>".$comment['created_at']."</span></div>
            <div class='card-body'>".$comment['comment']."</div>
            </div><br>";
    }
    mysqli_close($conn);
?>