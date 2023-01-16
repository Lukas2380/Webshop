<?php
include "connectDatabase.php";

$comment_id = $_REQUEST['c'];
$rating = $_REQUEST['r'];

if($rating == 'like'){
    $query = "UPDATE Comments SET rating = rating + 1 WHERE id = $comment_id";
    $result = mysqli_query($conn, $query);
}
else if($rating == 'dislike'){
    $query = "UPDATE Comments SET rating = rating - 1 WHERE id = $comment_id";
    $result = mysqli_query($conn, $query);
}

mysqli_close($conn);
?>
