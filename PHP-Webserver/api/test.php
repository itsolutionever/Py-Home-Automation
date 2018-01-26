<?php
$firstname = htmlspecialchars($_GET["firstname"]);
$lastname = htmlspecialchars($_GET["lastname"]);
$password = htmlspecialchars($_GET["password"]);
echo "firstname: $firstname lastname: $lastname password: $password";
?>
