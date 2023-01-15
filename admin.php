<?php 
    session_start();
    include "header.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
</head>
<body>
    <h1 class="mt-5 text-center">Admin Page</h1>

    <div id="categories" class="container">
        <script>adminLoadCategories()</script>
    </div>

    <div id="products" class="container">
        <script>adminLoadProducts()</script>
    </div>
</body>
</html>
