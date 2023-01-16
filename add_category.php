<?php
include "header.php";

if (isset($_POST['submit'])) {
    $table = $_GET['t'];
    $category_name = $_POST['category_name'];

    include "php/connectDatabase.php";

    // Insert the new category into the specified table
    $query = "INSERT INTO $table (name) VALUES ('$category_name')";
    mysqli_query($conn, $query);

    mysqli_close($conn);

    echo "<script>location.href='admin.php';</script>";
    exit;
}

?>


<head>
    <title>Add Category</title>
</head>
<body>
    <h1 class="mt-5">Add Category</h1>

    <form method="post">
    <label for="category_name">Category Name:</label><br><br>
    <input type="text" id="category_name" name="category_name" required><br><br>
    <input type="submit" name="submit" value="Add Category">
</form>
</body> 