<?php 
    session_start();

    $user_id = $_SESSION['userid'];

    if(isset($user_id)){
        include "connectDatabase.php";
    
        $item_id = $_REQUEST["id"];
        $size = $_REQUEST["size"];

        // query to 
        $sql = "SELECT * FROM Cart where user_id = '$user_id' AND item_id='$item_id' AND size_id='$size';";
        echo $sql;
        echo "<br>";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) >= 1) {
            $sql = "UPDATE Cart SET quantity = quantity + 1 WHERE user_id = '$user_id' AND item_id = '$item_id' AND size_id='$size';";

            mysqli_query($conn, $sql);
        } else {
            $sql = "INSERT INTO Cart (user_id, item_id, size_id, quantity) VALUES ('$user_id', '$item_id', '$size', 1);";

            mysqli_query($conn, $sql);
        }
        echo $sql;
    }
    else{
        echo "<script>alert('You need to be signed in before you can add items to your cart')</script>";
    }
?>