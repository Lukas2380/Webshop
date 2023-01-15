<?php
include "header.php";

if (isset($_POST['submit'])) {
    $table = $_GET['t'];
    $category_name = $_POST['category_name'];

    // Connect to the database
    include "php/connectDatabase.php";

    // Insert the new category into the specified table
    $query = "INSERT INTO $table (name) VALUES ('$category_name')";
    mysqli_query($conn, $query);

    // Close the database connection
    mysqli_close($conn);

    // Redirect back to the Admin Page
    echo "<script>location.href='admin.php';</script>";
    exit;
}

?>

<form action="" method="post" class="mt-5">
    <label for="category_name">Category Name:</label><br><br>
    <input type="text" id="category_name" name="category_name" required><br><br>
    <input type="submit" name="submit" value="Add Category">
</form>
