<?php
    include 'connectDatabase.php';
    $query = "SELECT p.id, p.name as productname, p.description, c.name FROM Products p JOIN Category c ON p.category_id = c.id;";
    $result = mysqli_query($conn, $query);
?>

<h2 class="mt-5">Products</h2>
<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Category</th>
        <th>Actions</th>
        <a href="add_product.php?<?php echo 't=Products'; ?>">Add product</a>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $row['productname']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td>
                <a href="edit_item.php?id=<?php echo $row['id'].'&t=Products'; ?>">Edit</a>
                <a href="php/delete_item.php?id=<?php echo $row['id'].'&t=Products'; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
            </td>
        </tr>
    <?php } ?> 
</table>