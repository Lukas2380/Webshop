<?php
  include "connectDatabase.php";

  // Fetch the categories from the database
  $result = mysqli_query($conn, "SELECT * FROM Category");

  echo "<div><a style='text-decoration: none;' onclick='loadProducts(\"\")'>All</a></div>";  

  // Generate the menu items
  while ($row = mysqli_fetch_assoc($result)) {
    $name = $row['name'];
    echo "<div><a style='text-decoration: none;' onclick='loadProducts(\"$name\")'>" . $name . "</a></div>";
  }

  mysqli_close($conn);
?>