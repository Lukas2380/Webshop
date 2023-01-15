<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php include "header.php";?>

    <h1 style="text-align: center;" class="mt-5">Login</h1>

    <form method="post" action="login.php" class="mt-5" style="max-width: 500px; width: 70%;">
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

    // Get the password from the database to check if they match
    $query = "SELECT password FROM Users WHERE username='$username' AND email='$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $corrPwd = $row['password'];
    
    if(password_verify($pw, $corrPwd)){
        // Check if the email and password match a row in the database
        $query = "SELECT * FROM Users WHERE username='$username' AND password='$corrPwd' AND email='$email'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) >= 1) {
            $output = true;

            // Save all session variables
            $row = mysqli_fetch_array($result);
            $_SESSION = array();
            $_SESSION['userid'] = $row[0];
            $_SESSION['username'] = $row[1];
            $_SESSION['email'] = $row[3];
            $_SESSION['is_admin'] = $row[4];
        } else {
            $output = false;
        }
    }
    else{
        $output = false;
    }   

    return $output;
}
?>
<style>
/* Style the form container */
form {
    width: 30em;
    margin: auto;
    padding: 20px;
    background-color: #e3f2fd;
    border-radius: 10px;
}

/* Style the labels */
label {
    font-size: 18px;
    font-weight: bold;
    margin-top: 10px;
    display: block;
}

/* Style the inputs */
input[type="username"], input[type="password"], input[type="email"] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
}

/* Style the submit button */
input[type="submit"] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}
</style>