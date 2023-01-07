<link rel="stylesheet" href="style\product_image.css">
<?php
$i = 0;
    include "connectDatabase.php";

    include "select_Products.php";
    
    if(isset($products))
    {
        foreach ($products as $product) {
            $id = $product['id'];
            $name = $product['name'];
            /* $price = $product['price']; */
            $description = $product['description'];
            $link = $product['link'];

            $i++;
            echo '<div class="col-lg-6 col-md-12">';
            echo '<div class="card m-2">';
            echo "<div class='product-image parent'>";
            echo "<img src='img/$link' alt='$name' class='img-fluid product-image'>";
            echo "<img src='img/jigsaw-Small.svg' alt='Jigsaw overlay' class='overlay'>";
            echo "</div>";
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $name . '</h5>';
            echo '<p class="card-text">Description: </p>' . $description;
            echo '<div class="d-flex justify-content-end mt-5">';
            echo '<a href="product-details.php?id=' . $id . '" class="btn btn-primary">View Product</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
?>
<style>
.parent {
overflow: hidden;
margin: 20px;
}
.product-image {
    position: relative;
    z-index: 1;
}
.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 2;
}
</style>