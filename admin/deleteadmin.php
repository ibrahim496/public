<?php
$pdo = new PDO('mysql:dbname=job;host=mysql', 'student', 'student');
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {



    $stmt = $pdo->prepare('DELETE FROM admins WHERE username = :username');
    $stmt->execute(['username' => $_POST['id']]);


    header('location: manageadmin.php');
}