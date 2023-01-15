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

  <h1 style="font-family: Freestyle Script; font-size: 80px; text-align: center;" class="mt-5 mx-2">Lukas's </span>Puzzleshop</h1>

  <?php include 'php/carousel.php'?>
  
  <nav class="navbar navbar-expand d-flex justify-content-center flex-wrap sticky-offset my-5 h-auto w-80" style="align-items: center;">
    <?php include "php/display_categories.php" ?>
    </nav>

  <div class="d-grid">
    <div class="container mt-5">
      <div class="row" id="row">
          <script>loadProducts("")</script>
      </div>
    </div>
  </div>

  </body> 
</html>

<style>
  .sticky-offset {
    top: 50px;
    height: 50px;
}
@font-face {
    font-family: 'Freestyle Script';
    src: url('font/FREESCPT.TTF');
}
</style>