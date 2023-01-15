<?php
    session_start();
    include 'connectDatabase.php';
    $table = $_GET['t'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category_select = $_POST['category_select'];
    if($table == "Products")
    {
        if($_GET['a'] == "1"){
            $description = $_POST['description'];
            $query = "INSERT INTO $table (name, description, category_id) VALUES ('$name', '$description', $category_select)";
        }
        else
        {
            $description = $_POST['description'];
            $query = "UPDATE $table SET name='$name', description='$description', category_id=$category_select WHERE id='$id'";
        }
    }
    else{
        if($_GET['a'] == "1"){
            $query = "INSERT INTO $table (name) VALUES ('$name')";
        }
        else
        {
            $query = "UPDATE $table SET name='$name' WHERE id='$id'";
        }
    }
    
    mysqli_query($conn, $query);
    header("Location: ../admin.php");
?>
