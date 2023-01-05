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
  <script src="javascript\cart.js"></script>
  <?php #include "php/update_cart_items.php"?>
</head>
<body>
  <nav class="navbar navbar-light navbar-expand-lg ps-lg-3 pe-lg-5 ps-2 pe-2" style="background-color: #e3f2fd;">
        <div class="col-lg-1 me-md-1">
          <a class="navbar-brand" href="index.php">
            <i class="bi bi-puzzle"> Home</i>
          </a>
        </div>

        <div class="col-lg-7">
          <form class="d-flex input-group" role="search">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <!-- <button class="btn btn-outline-dark"><i class="bi bi-search"></i></button> --><!-- this button had a type submit -->
          </form>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse col-lg-1 justify-content-center" id="navbarSupportedContent">
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Category
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
          </ul>
        </div>
    
        <div class="collapse navbar-collapse col-lg-2 justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php 
                  if(isset($_SESSION['username'])){
                    echo $_SESSION['username'];
                  }
                  else{
                    echo "Account";
                  }
                  ?>
                  <i class="bi bi-person-circle"></i>
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
                <a class="nav-link" href="#" role="button">
                  Cart
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
              </li>
            </ul>
        </div>
    </nav>
</body>
</html>

