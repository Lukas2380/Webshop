<?php
session_start();

// Display the header
include('header.php');
?>

<head>
    <script src="javascript\methods.js"></script>
</head>

<div id="orderItems">
    <script>displayOrderItems()</script>
</div>


<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process the order

    // Connect to the database
    include "php/connectDatabase.php";

    // Escape the user input to protect against SQL injection attacks
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
    
        // Update the stock levels for the items
        foreach ($items as $item) {
            $item_name = $item['name'];
            $item_size = $item['size'];
            $item_quantity = $item['quantity'];
            $sql = "UPDATE Size SET stock = stock - $item_quantity WHERE name = '$item_size' AND item_id = (SELECT id FROM Products WHERE name = '$item_name')";
            mysqli_query($conn, $sql);
        }
    
        // Display a confirmation message
        echo "<script>alert('Your order has been processed successfully!');location.href='index.php';</script>";
    } else {
        // Display an error message
        echo "<script>alert('An error occurred while processing your order. Please try again.')</script>";
    }
    
    // Close the database connection
    mysqli_close($conn);
}
?>