<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
<body>
  <?php include "header.php"; ?>
<form id="create_account_form" onsubmit="return validateForm()" method="post" action="create_account.php">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username"><br><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br><br>
    <label for="confirm_password">Confirm Password:</label><br>
    <input type="password" id="confirm_password" name="confirm_password"><br><br>
    <label for="admin">Admin?</label>
    <input type="checkbox" id="admin" name="admin"><br><br>
    <input type="submit" value="Create Account">
</form> 

<script>
function validateForm() {
  // Get the form element
  form = document.getElementById('create_account_form');

  // Get the email and password fields
  email = form.elements.email;
  password = form.elements.password;
  confirmPassword = form.elements.confirm_password;

  // Check if the email is empty
  if (email.value == "") {
    alert("Email is required");
    email.focus();
    return false;
  }

  // Check if the password is empty
  if (password.value == "") {
    alert("Password is required");
    password.focus();
    return false;
  }

  // Check if the confirm password is empty
  if (confirmPassword.value == "") {
    alert("Confirm password is required");
    confirmPassword.focus();
    return false;
  }

  // Check if the password and confirm password fields match
  if (password.value != confirmPassword.value) {
    alert("Passwords do not match");
    password.focus();
    return false;
  }

  // If all checks pass, allow the form to be submitted
  return true;
}
</script>

<?php

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Get the form data
  $email = $_POST['email'];
  $pw = $_POST['password'];
  $username = $_POST['username'];
  $is_admin = $_POST['admin'];

  if($is_admin == "on"){
    $is_admin = 1;
  }
  else
  {
    $is_admin = 0;
  }

  include "php/connectDatabase.php";

  $query = "INSERT INTO Users (username, email, password, is_admin) VALUES ('$username', '$email', '$pw', '$is_admin')";
  mysqli_query($conn, $query);

  echo "Account sucessfully created!";
}
?>

</body>
</html>