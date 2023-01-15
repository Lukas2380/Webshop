<?php
    include_once 'connectDatabase.php';

    if(isset($_POST['name'], $_POST['price'], $_FILES['image'], $_POST['description'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $image = $_FILES['image']['name'];
        $description = mysqli_real_escape_string($conn, $_POST['description']);

        $target = "images/".basename($image);

        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $query = "INSERT INTO items (name, price, image, description) VALUES ('$name', '$price', '$image', '$description')";
            if (mysqli_query($conn, $query)) {
                header("Location: items.php?message=Item added successfully");
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        }else{
            echo "Failed to upload image";
        }
    }
    else {
        header("Location: items.php?error=Please fill in all fields");
    }
    mysqli_close($conn);
?>


<h3 class="mt-5">Add Item</h3>
<form action="php/add_item.php" method="post" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name">
    <br>
    <label for="image">Image:</label>
    <input type="file" name="image" id="image">
    <br>
    <label for="description">Description:</label>
    <textarea name="description" id="description"></textarea>
    <br>
    <input type="submit" value="Add Item">
</form>