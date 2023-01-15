<?php
    include 'connectDatabase.php';
    $query = "SELECT * FROM ";
    $table = "Products";
    $result = mysqli_query($conn, $query.$table);
?>

<h2 class="mt-5">Products</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Actions</th>
        <a href="php/add_product.php?<?php echo 't='.$table; ?>">Add category</a>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td>
                <a href="edit_item.php?id=<?php echo $row['id'].'&t='.$table; ?>">Edit</a>
                <a href="delete_item.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
            </td>
        </tr>
    <?php } ?> 
</table>