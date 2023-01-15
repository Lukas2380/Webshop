<?php
    session_start();
    include 'php/connectDatabase.php';
    include 'header.php';
    $id = $_GET['id'];
    $table = $_GET['t'];
    $query = "SELECT * FROM $table WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
</head>
<body>
    <h1 class="mt-5">Edit Item</h1>

    <form action="php/update_item.php?t=<?php echo $table ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">   
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>">
        </div>
        <?php 
        if($table == "Products"){?>
        <div class="mt-5">
            <label for="description">Description:</label>
            <br>
            <textarea style="resize: auto; width: 500px; height: 150px;" id="description" name="description"><?php echo $row['description']; ?></textarea>
        </div>
        <?php }?>
        <div class="mt-3">
            <input type="submit" value="Update Item">
        </div>
    </form>
</body>
</html>
