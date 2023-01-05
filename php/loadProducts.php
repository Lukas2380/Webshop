<link rel="stylesheet" href="style\product_image.css">
<?php
$i = 0;
    include "connectDatabase.php";
    include "select_Products.php";
    foreach ($products as $product) {
        $name = $product['name'];
        $price = $product['price'];
        $id = $product['id'];
        $description = $product['description'];

        $i++;
        echo '<div class="col-lg-6 col-md-12">';
        echo '<div class="card m-2">';
        echo "<div class='product-image parent'>";
        echo "<img src='img/$id.jpg' alt='$name' class='img-fluid product-image'>";
        echo "<img src='img/jigsaw-small.svg' alt='Jigsaw overlay' class='overlay'>";
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
?>
<style>
.container {
    max-width: 2000px;
}
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