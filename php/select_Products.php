<?php 
    // Query to retrieve the products from the database
    $sql = "SELECT * FROM Products";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful and store the products in an array
    if (mysqli_num_rows($result) > 0) {
        $products = array();
        while($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
        }
    } else {
        echo "No products found";
    }
?>