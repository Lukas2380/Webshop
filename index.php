<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webshop</title>
  </head>
  <body>
    
  <?php include 'header.php';?>

  <div class="d-grid">
    <div class="container mt-5">
      <div class="row" id="row">
          <script>loadProducts("")</script>
      </div>
    </div>
  </div>

  </body> 
</html>