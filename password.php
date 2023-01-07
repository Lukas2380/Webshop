<?php
$password = "abc";
echo $password."<br>";

$passwordCheck = password_hash($password, PASSWORD_DEFAULT);
echo $passwordCheck."<br>";

$loginpwd = "abc";

echo password_verify($loginpwd, $passwordCheck);

?>