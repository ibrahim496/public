<?php

require 'admin_main.php';





if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $table = "client"; // 
    register($table, $username, $password);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "client created successfully";

}
?>

<h1>register </h1>

<form action="registerclient.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">

    <label for="password">Password:</label>
    <input type="password" id="password" name="password">

    <input type="submit" value="Register">
</form>