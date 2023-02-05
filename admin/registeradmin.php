
<?php

require 'admin_main.php';



if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $table = "admins"; // 
        register($table, $username, $password);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "admin created successfully";

    }
    ?>

<h1>register </h1>

<form action="manageadmin.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">

    <label for="password">Password:</label>
    <input type="password" id="password" name="password">

    <input type="submit" value="Register">
</form>

<?php
}
?>