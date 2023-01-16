<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <script src="javascript\methods.js"></script>
    <link rel="stylesheet" href="style\product_image.css">
</head>
<body>
    <?php 
    include "header.php"; 
    
    include "php/connectDatabase.php";

    $product_id = $_GET['id'];

    // Retrieve the product information from the database
    $query = "SELECT * FROM Products WHERE id = '$product_id'";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);

    mysqli_close($conn);

    $name = $product['name'];
    $price = $product['price'];
    $description = $product['description'];
    $link = $product['link'];
    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class='product-image'>
                    <img src='img/<?php echo $link; ?>' alt='<?php echo $product['name']; ?>' class='img-fluid'>
                    <img id="jigsaw-image" src='img/jigsaw-Small.svg' alt='Jigsaw overlay' class='overlay'>
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="mb-4"><?php echo $name; ?></h1>
                <p class="lead mb-4">Price: <span id="price">19,99€</span></p>
                <p><?php echo $description; ?></p>
                <button class="btn btn-success mb-4" onclick="add_to_cart(<?php echo $product_id;?>, document.getElementById('sizeSpan').innerHTML)">Add to Cart</button>

                <p>Size: <span id="sizeSpan">Small</span></p>
                <div class="btn-group" role="group" aria-label="Size options">
                    <button type="button" onclick="changeSize('Small');" class="btn btn-primary">Small</button>
                    <button type="button" onclick="changeSize('Medium');" class="btn btn-primary">Medium</button>
                    <button type="button" onclick="changeSize('Large');" class="btn btn-primary">Large</button>
                </div>

                <div>
                <br>
                    <div>Small: 500 Pieces</div>
                    <div>Small: 1000 Pieces</div>
                    <div>Small: 2000 Pieces</div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <?php
            if(isset($_SESSION['userid'])){
                ?>
                <h2>Leave a Comment</h2>
                <br>
                <div class="form-group">
                    <label for="name">Name: <span id="name" name="name"><?php echo $_SESSION['username']?></span></label>
                </div>
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" id="comment" name="comment"></textarea>
                </div>
                <br>
                <button class="btn btn-primary" onclick="addComment(<?php echo $product_id; ?>, <?php echo $_SESSION['userid']; ?>)">Post</button>
                <?php
            }
            else
            {
                echo "Login to leave a comment";
            }
        ?>
    </div>

    <div class="container mt-5">
        <h2>Comments</h2>
        <br>
        <div id="sort" class="btn-group mb-4">
            <button class="btn btn-light" id="sortByDate" onclick="displayComments(<?php echo $product_id; ?>, 'dateASC')">Sort by Date (Newest first)</button>
            <button class="btn btn-light" id="sortByDate" onclick="displayComments(<?php echo $product_id; ?>, 'dateDESC')">Sort by Date (Oldest first)</button>
            <button class="btn btn-light" id="sortByUser" onclick="displayComments(<?php echo $product_id; ?>, 'userASC')">Sort by User (A-Z)</button>
            <button class="btn btn-light" id="sortByUser" onclick="displayComments(<?php echo $product_id; ?>, 'userDESC')">Sort by User (Z-A)</button>
            <button class="btn btn-light" id="sortByRating" onclick="displayComments(<?php echo $product_id; ?>, 'ratingASC')">Sort by Rating (Highest first)</button>
            <button class="btn btn-light" id="sortByRating" onclick="displayComments(<?php echo $product_id; ?>, 'ratingDESC')">Sort by Rating (Lowest first)</button>
        </div>
        <div id="comments">
            <script>
                displayComments(<?php echo $product_id; ?>);
            </script>
        </div>
    </div>

</body>
</html>