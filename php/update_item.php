<?php
    session_start();
    include 'connectDatabase.php';
    $table = $_GET['t'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category_select = $_POST['category_select'];
    if($table == "Products")
    {
        
            $description = $_POST['description'];
            $query = "UPDATE Products SET name = '$name', description = '$description', category_id = (SELECT id FROM Category WHERE name = '$category_select') WHERE id = '$id'";
        
    }
    else{

            $query = "UPDATE $table SET name='$name' WHERE id='$id'";
        
    }
    
    mysqli_query($conn, $query);
    header("Location: ../admin.php");
?>
