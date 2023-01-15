<?php
session_start();

$user_id = $_SESSION['userid'];

include "php/connectDatabase.php";

if(!$_SESSION['is_admin']){
    $sql = "SELECT id, user_id, address, city, zip, total_price, date FROM Orders WHERE user_id = $user_id ORDER BY date DESC";
}
else{
    $sql = "SELECT id, user_id, address, city, zip, total_price, date FROM Orders";
}

// Retrieve all the orders
$result = mysqli_query($conn, $sql);

$orders = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $order = array(
            'id' => $row['id'],
            'user_id' => $row['user_id'],
            'address' => $row['address'],
            'city' => $row['city'],
            'zip' => $row['zip'],
            'total_price' => $row['total_price'],
            'date' => $row['date']
        );
        $orders[] = $order;
    }
}
mysqli_close($conn);

include('header.php');

?>
<div class="container">
    <h1 class="mt-5">All Orders</h1>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Address</th>
                <th>City</th>
                <th>Zip</th>
                <th>Total Price</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?php echo $order['id']; ?></td>
                <td><?php echo $order['user_id']; ?></td>
                <td><?php echo $order['address']; ?></td>
                <td><?php echo $order['city']; ?></td>
                <td><?php echo $order['zip']; ?></td>
                <td><?php echo $order['total_price']; ?></td>
                <td><?php echo $order['date']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
