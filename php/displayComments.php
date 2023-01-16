<?php
    include "connectDatabase.php";
    $product_id = $_REQUEST['p'];
    $sortBy = $_REQUEST['sortBy'];
    if($sortBy == 'dateASC'){
        $query = "SELECT c.id, u.username, c.comment, c.created_at, c.rating FROM Comments c JOIN Users u ON c.user_id = u.id WHERE c.product_id = '$product_id' ORDER BY c.created_at DESC;";   
    }
    else if($sortBy == 'dateDESC'){
        $query = "SELECT c.id, u.username, c.comment, c.created_at, c.rating FROM Comments c JOIN Users u ON c.user_id = u.id WHERE c.product_id = '$product_id' ORDER BY c.created_at ASC;";   
    }
    else if( $sortBy == 'userASC'){
        $query = "SELECT c.id, u.username, c.comment, c.created_at, c.rating FROM Comments c JOIN Users u ON c.user_id = u.id WHERE c.product_id = '$product_id' ORDER BY u.username ASC;";
    }
    else if( $sortBy == 'userDESC'){
        $query = "SELECT c.id, u.username, c.comment, c.created_at, c.rating FROM Comments c JOIN Users u ON c.user_id = u.id WHERE c.product_id = '$product_id' ORDER BY u.username DESC;";
    }
    else if( $sortBy == 'ratingASC'){
        $query = "SELECT c.id, u.username, c.comment, c.created_at, c.rating FROM Comments c JOIN Users u ON c.user_id = u.id WHERE c.product_id = '$product_id' ORDER BY c.rating DESC;";
    }
    else if( $sortBy == 'ratingDESC'){
        $query = "SELECT c.id, u.username, c.comment, c.created_at, c.rating FROM Comments c JOIN Users u ON c.user_id = u.id WHERE c.product_id = '$product_id' ORDER BY c.rating ASC;";
    }
    else{
        $query = "SELECT c.id, u.username, c.comment, c.created_at, c.rating FROM Comments c JOIN Users u ON c.user_id = u.id WHERE c.product_id = '$product_id';";
    }

    $result = mysqli_query($conn, $query);
    while($comment = mysqli_fetch_assoc($result)){
        echo "<div class='card'>
            <div class='card-header d-flex justify-content-between'>".$comment['username']."<span>".$comment['created_at']."</span></div>
            <div class='card-body d-flex justify-content-between'>
                <div>".$comment['comment']."</div>
                <div class='d-flex align-items-center'>
                    <div class='me-2'>Rating: ".$comment['rating']."<span id='rating'></span></div>
                    <div class='btn-group'>
                        <button onclick='rateComment(".$product_id.", ".$comment['id'].", \"like\")' class='btn btn-light'><i class='bi bi-hand-thumbs-up-fill'></i></button>
                        <button onclick='rateComment(".$product_id.", ".$comment['id'].", \"dislike\")' class='btn btn-light'><i class='bi bi-hand-thumbs-down-fill'></i></button>
                    </div>
                </div>
            </div>
            </div><br>";
    }
    mysqli_close($conn);
?>