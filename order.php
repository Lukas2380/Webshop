<?php
session_start();

include('header.php');
?>

<head>
    <script src="javascript\methods.js"></script>
</head>

<div id="orderItems">
    <script>displayOrderItems()</script>
</div>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include "php/connectDatabase.php";

    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];

    // Insert the order into the database
    $sql = "INSERT INTO Orders (user_id, address, city, zip, total_price, date) VALUES ($user_id, '$address', '$city', '$zip', $total_price, NOW())";
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        // Retrieve the ID of the inserted order
        $order_id = mysqli_insert_id($conn);
    
        // Insert the items in the order into the database
        foreach ($items as $item) {
            $item_name = $item['name'];
            $item_size = $item['size'];
            $item_quantity = $item['quantity'];
            $item_price = $item['price'];
            $sql = "INSERT INTO OrderItems (order_id, name, size, quantity, price) VALUES ($order_id, '$item_name', '$item_size', $item_quantity, $item_price)";
            mysqli_query($conn, $sql);
        }

        echo "<script>alert('Your order has been processed successfully!');location.href='index.php';</script>";
    } else {
        echo "<script>alert('An error occurred while processing your order. Please try again.')</script>";
    }
    
    mysqli_close($conn);
}
?>