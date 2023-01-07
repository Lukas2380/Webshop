<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header</title>
  <link rel="stylesheet" href="style\itemcart.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="javascript\methods.js"></script>
  <?php #include "php/update_cart_items.php"?>
</head>
<body>
    <nav class="navbar navbar-light navbar-expand justify-content-around ps-lg-5 pe-lg-5 ps-2 pe-2" style="background-color: #e3f2fd;">
        <div class="col-lg-2 col-sm-4 me-md-1">
          <a class="navbar-brand" href="index.php">
            <i class="bi bi-puzzle"> Home</i>
          </a>
        </div>

        <div class="col-lg-8 col-sm-6">
          <div class="d-flex input-group" role="search">
            <input class="form-control" id="searchInput" type="search" placeholder="Search" aria-label="Search" onkeydown="loadProducts(this.value)">
            <button class="btn btn-outline-dark" onclick="loadProducts(document.getElementById('searchInput').value)"><i class="bi bi-search"></i></button>
          </div>
        </div>
    
        <div class="col-lg-2 col-sm-4" id="navbarSupportedContent">
            <ul class="navbar-nav mb-lg-0 justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php 
                  if(isset($_SESSION['username'])){
                    $username =  $_SESSION['username'];
                    echo "<span class='d-none d-lg-inline'>$username </span>";
                    echo "<i class='bi bi-person-fill'></i>";
                  }
                  else{
                    echo "<span class='d-none d-lg-inline'>Account </span>";
                    echo "<i class='bi bi-person'></i>";
                  }
                  ?>
                  
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="login.php">
                      <?php 
                        if(isset($_SESSION['username'])){
                          echo "Change Account";
                        }
                        else{
                          echo "Login";
                        }
                    ?>
                  </a></li>
                  <li><a class="dropdown-item" href="create_account.php">Create Account</a></li>
                  <?php 
                  if(isset($_SESSION['username'])){
                    echo "<li><a class='dropdown-item' href='php/sign_out.php'>Sign Out</a></li>";
                  }
                  ?>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="d-none d-lg-inline">Cart</span>
                  <?php 
                  

                  if(isset($_SESSION['username'])){
                    echo "<i class='bi bi-cart4 ms-1'><span id='cart-count' class=''>";
                    echo "<script>update_cart_items()</script>";
                    echo "</span></i>";
                  }
                  else{
                    echo "<i class='bi bi-cart4'></i>";
                  }
                  ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" style="width: 250px;">
                <div id="cartItems" style="height: 700px;" class="overflow-auto">
                  <script>
                    displayCart();
                  </script>
                </div>
                </ul>
              </li>
            </ul>
        </div>
    </nav>

    <nav class="navbar navbar-expand d-flex justify-content-evenly" style="background-color: #94caf2;  overflow-x: scroll;">
     <?php include "php/display_categories.php" ?>            
    </nav>

  
  </body>
</html>

                  