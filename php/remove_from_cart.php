<?php 
    session_start();

    $user_id = $_SESSION['userid'];

    if(isset($user_id)){
        include "connectDatabase.php";
    
        $item_id = $_REQUEST["id"];
        $size = $_REQUEST["size"];

        // query to 
        $sql = "SELECT * FROM Cart where user_id = '$user_id' AND item_id='$item_id' AND size_id='$size';";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $quantity = $row['quantity'];

        if (mysqli_num_rows($result) >= 1 && $quantity > 1) {
            $sql = "UPDATE Cart SET quantity = quantity - 1 WHERE user_id = '$user_id' AND item_id = '$item_id' AND size_id='$size';";

            mysqli_query($conn, $sql);
        } else {
            $sql = "DELETE FROM Cart WHERE user_id = '$user_id' AND item_id = '$item_id' AND size_id = '$size'";

            mysqli_query($conn, $sql);
        }
    }
    else{
        echo "<script>alert('You need to be signed in before you can add items to your cart')</script>";
    }
?>