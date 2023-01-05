<?php
include "connectDatabase.php";

// Fetch the categories from the database
$result = mysqli_query($conn, "SELECT * FROM Category");

// Generate the menu items
while ($row = mysqli_fetch_assoc($result)) {
  $name = $row['name'];
  echo "<li><a class='dropdown-item' href='#' onclick='loadProducts(\"$name\")'>" . $name . "</a></li>";
}

mysqli_close($conn);
?>