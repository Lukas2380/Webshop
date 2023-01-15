<?php
    include 'connectDatabase.php';
    $query = "SELECT * FROM ";
    $table = "Category";
    $result = mysqli_query($conn, $query.$table);
?>

<h2 class="mt-5">Categories</h2>
<a></a>
<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <a href="add_category.php?<?php echo 't='.$table; ?>">Add category</a>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $row['name']; ?></td>    
            <td>
                <a href="edit_item.php?id=<?php echo $row['id'].'&t='.$table; ?>">Edit</a>
                <a href="php/delete_item.php?id=<?php echo $row['id'].'&t='.$table; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
            </td>
        </tr>
    <?php } ?> 
</table>