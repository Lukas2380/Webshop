<?php
  include "connectDatabase.php";

  // Fetch the categories from the database
  $result = mysqli_query($conn, "SELECT * FROM Category");

  echo "<div><button class='m-2 btn btn-outline-dark' onclick='loadProducts(\"\")'>All</button></div>";    

  // Generate the menu items
  while ($row = mysqli_fetch_assoc($result)) {
    $name = $row['name'];
    echo "<div><button class='m-2 btn btn-outline-dark' onclick='loadProducts(\"$name\")'>" . $name . "</button></div>";
  }

  mysqli_close($conn);
?>