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

  <h1 style="font-family: Freestyle Script; font-size: 80px; text-align: center;" class="mt-5">Lukas's best (and only) Puzzleshop</h1>

  <?php include 'php/carousel.php'?>


  <div class="d-grid">
    <div class="container mt-5">
      <div class="row" id="row">
          <script>loadProducts("")</script>
      </div>
    </div>
  </div>

  </body> 
</html>