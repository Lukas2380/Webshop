<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "header.php";?>
    <form method="post" action="login.php">
        <label for="username">Username:</label><br>
        <input type="username" id="username" name="username"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Log In">
    </form> 
</body>
</html>

<?php

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the email and password from the form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pw = $_POST['password'];

    // Check if the email and password are correct
    if (verify_credentials($username, $email, $pw)) {
        echo "<script>location.href='index.php';</script>";
    } else {
        // Show an error message
        echo 'Invalid email or password';
    }
}

// A function to verify the user's credentials
function verify_credentials($username, $email, $pw) {
  
    include "php/connectDatabase.php";

    // Check if the email and password match a row in the database
    $query = "SELECT * FROM Users WHERE username='$username' AND password='$pw' AND email='$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) >= 1) {
        $output = true;
    } else {
        $output = false;
    }

    // Save all session variables
    $row = mysqli_fetch_array($result);
    $_SESSION = array();
    $_SESSION['userid'] = $row[0];
    $_SESSION['username'] = $row[1];
    $_SESSION['email'] = $row[3];
    $_SESSION['is_admin'] = $row[4];

    return $output;
}

?>