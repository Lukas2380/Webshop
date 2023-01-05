<?php 
    $q = $_REQUEST["q"];

    if(!isset($q)){
        $q = "";
    }
    else{
        $q = "where p.name like '%$q%' or c.name = '$q'";
    }

    // Query to retrieve the products from the database
    $sql = "SELECT p.name, p.description, c.name as 'category', p.link FROM Products p join Category c on p.category_id = c.id ".$q;
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