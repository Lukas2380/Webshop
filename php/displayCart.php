<?php
session_start();
?>
<head>
    <script src="javascript\methods.js"></script>
</head>
<?php
if(isset($_SESSION['username']))
{
    include "connectDatabase.php";

    $user_id = $_SESSION['userid'];

    // Get the Total Price
    $result = mysqli_query($conn, "SELECT C.quantity,  S.price FROM Cart C JOIN Size S ON C.size_id = S.id WHERE C.user_id = $user_id");
    if (mysqli_num_rows($result) > 0) {
        $totalPrice = 0;
        while($row = mysqli_fetch_assoc($result)) {
            $totalPrice += ($row['quantity'] * $row['price']);
        }
    }

    if($totalPrice == '')
    {
        $totalPrice = "0";
    }

    // Generate the list item
    echo "<li class='d-flex flex-column align-items-center'>";
    echo "<p class='text-center'>Total Price: $totalPrice<span>€</span></p>";
    echo "<a href='order.php'><button class='btn btn-success'>Order now</button></a>";
    echo "<br>";
    echo "<a href='orders.php'><button class='btn btn-primary'>View orders</button></a>";
    echo "</li>";
    echo "<li><hr class='dropdown-divider'></li>";

    // Fetch the items from the cart table
    $result = mysqli_query($conn, "SELECT * FROM Cart where user_id = $user_id");

    // Generate the list items
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $item_id = $row['item_id'];
            $size_id = $row['size_id'];
            $quantity = $row['quantity'];

            // Get the name of the item
            $item_result = mysqli_query($conn, "SELECT name, link FROM Products WHERE id=$item_id");
            $item_row = mysqli_fetch_assoc($item_result);
            $item_name = $item_row['name'];
            $item_link = $item_row['link'];

            // Get the name of the size
            $size_result = mysqli_query($conn, "SELECT name, price FROM Size WHERE id=$size_id");
            $size_row = mysqli_fetch_assoc($size_result);
            $size_name = $size_row['name'];
            $size_price = $size_row['price'];

            if($item_id != $lastItem_id){
                // Generate the list item
                echo "<li  onclick=\"location.href='product-details.php?id=$item_id';\" class='dropdown-item'>";
                echo "<p class='item-name'>$item_name</p>";
                echo "<div class='item-image'>";
                echo "<img src='img/$item_link' alt='$item_name' style='width: 100%'>";
                echo "</div>";
                echo "<div class='item-details my-2'>";
                echo "<span class='item-quantity'>$quantity x </span>";
                echo "<span class='item-size'> $size_name</span>";
                echo "<span class='item-price'> $size_price<span>€</span></span>";
                echo "</div>";
            }
            else{
                echo "<div class='item-details my-2'>";
                echo "<span class='item-quantity'>$quantity x </span>";
                echo "<span class='item-size'>$size_name</span>";
                echo "<span class='item-price'> $size_price<span>€</span></span>";
                echo "</div>";
            }
            $lastItem_id = $item_id;
        }
    } else {
        echo "<li>No items in cart</li>";
    }

    echo "<script>document.getElementById('price').innerHTML = '$priceSum';</script>";

    // Close the database connection
    mysqli_close($conn);
}
else{
    echo "<li style='text-align: center;'>Login to see your cart</li>";
}
?>