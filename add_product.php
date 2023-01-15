<?php
include "header.php";

include "php/connectDatabase.php";

// Get all Categories 
$query = "SELECT name from Category";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row['name'];
  }

mysqli_close($conn);

if (isset($_POST['submit'])) {

    include "php/connectDatabase.php";
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $category_select = $_POST['category_select'];

    // Insert the new product into the specified table
    $query = "INSERT INTO Products (name, description, category_id) VALUES ('$product_name', '$product_description', $category_select)";
    echo $query;
    mysqli_query($conn, $query);

    mysqli_close($conn);

    echo "<script>location.href='admin.php';</script>";
    exit;
}

?>

<head>
    <title>Add Product</title>
</head>
<body>
    <h1 class="mt-5">Add Product</h1>

    <form action="" method="post">
        <label for="product_name">Product Name:</label><br><br>
        <input type="text" id="product_name" name="product_name" required><br><br>
        <label for="product_description">Product description:</label><br><br>
        <textarea id="product_description" name="product_description" style="width: 400px; height: 200px;" rows="4" cols="50" required></textarea><br><br>
        <label for="category_select">Category:</label><br><br>
        <select name="category_select" id="category_select">
            <?php 
            $i = 0;
            foreach ($categories as $category){
                $i++;
                echo "<option value='$i'>$category</option>";
            }?>
        </select><br><br>
        <input type="submit" name="submit" value="Add Product">
    </form>
</body> 