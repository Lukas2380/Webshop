<?php
session_start();
?>

<head>
    <script src="javascript\methods.js"></script>
</head>

<?php

include "php/connectDatabase.php";

$user_id = $_SESSION['userid'];

// Retrieve the information about the items in the cart
$result = mysqli_query($conn, "SELECT C.quantity, P.name, S.name AS size_name, S.price FROM Cart C JOIN Products P ON C.item_id = P.id JOIN Size S ON C.size_id = S.id WHERE C.user_id = $user_id");

// Initialize variables for the order summary
$items = array();
$total_price = 0;

if (mysqli_num_rows($result) > 0) {
    // Process the items in the cart
    while ($row = mysqli_fetch_assoc($result)) {
        $item = array(
            'name' => $row['name'],
            'size' => $row['size_name'],
            'quantity' => $row['quantity'],
            'price' => $row['price']
        );
        $items[] = $item;
        $total_price += $row['quantity'] * $row['price'];
    }
}

// Display the header
include('header.php');

// Display the items
?>
<div class="container">
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['size']; ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td><?php echo $item['price']; ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3">Total price:</td>
                <td><?php echo $total_price; ?></td>
            </tr>
        </tbody>
    </table>
</div>


<div class="container mt-5">
    <form action="order.php" method="POST">
        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>
        </div>
        <div>
            <label for="zip">Zip code:</label>
            <input type="text" id="zip" name="zip" required>
        </div>
        <div>
            <button type="submit" onclick="DeleteCartItems()">Order now</button>
        </div>
    </form>
</div>


<?php
// Close the database connection
mysqli_close($conn);

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
        echo "Your order has been processed successfully!";
    } else {
        // Display an error message
        echo "An error occurred while processing your order. Please try again.";
    }
    
    // Close the database connection
    mysqli_close($conn);
}
?>