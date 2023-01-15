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
    <h1 class="mt-5">Admin Page</h1>

    <div id="categories">
        <script>adminLoadCategories()</script>
    </div>

    <div id="products">
        <script>adminLoadProducts()</script>
    </div>
</body>
</html>
