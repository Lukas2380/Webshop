<?php
session_start();

include "php/connectDatabase.php";

$user_id = $_SESSION['userid'];

// Retrieve the information about the items in the cart
$result = mysqli_query($conn, "SELECT P.id, C.quantity, P.name, S.name AS size_name, S.price FROM Cart C JOIN Products P ON C.item_id = P.id JOIN Size S ON C.size_id = S.id WHERE C.user_id = $user_id");

// Initialize variables for the order summary
$items = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $item = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'size' => $row['size_name'],
            'quantity' => $row['quantity'],
            'price' => $row['price']
        );
        $items[] = $item;
        $total_price += $row['quantity'] * $row['price'];
    }
}

// Display the items
?>
<div class="container mt-5">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>Item</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Add/Remove</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): 
                    $id = $item['id'];
                    $size = $item['size'];
                ?>
            <tr>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['size']; ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td><?php echo $item['price']; ?></td>
                <td>
                    <div class="btn-group">
                        <button onclick="add_to_cart(<?php echo $id ?>, '<?php echo $size ?>')" class="btn btn-light"><i class="bi bi-plus"></i></button>
                        <button onclick="remove_from_cart(<?php echo $id ?>, '<?php echo $size ?>')" class="btn btn-light"><i class="bi bi-dash"></i></button>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"><b>Total price:</b></td>
                <td><?php echo $total_price; ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>


<div class="container mt-5">
    <form action="order.php?p=<?php echo $total_price; ?>" method="POST">
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <div class="form-group">
            <label for="zip">Zip code:</label>
            <input type="text" class="form-control" id="zip" name="zip" required>
        </div>
        <div class="form-group">
            <br>
            <?php
                if($total_price > 0){
                    echo "<button type='submit' class='btn btn-primary' onclick='deleteCartItems()'>Order now</button>";
                }
                else {
                    echo "Put items into your cart to order";
                }
            ?>
        </div>
    </form>
</div>