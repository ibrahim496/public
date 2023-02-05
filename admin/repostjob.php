<?php
require '../connect.php';

header('location: jobs.php');
?>

<?php


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    $stmt = $pdo->prepare('INSERT INTO job (title, salary) SELECT title, salary FROM archive WHERE id = :id');
    $stmt->execute(['id' => $_POST['id']]);

    $stmt = $pdo->prepare('DELETE FROM archive WHERE id = :id');
    $stmt->execute(['id' => $_POST['id']]);

    if ($stmt->rowCount() > 0) {
        echo "Job reposted successfully";
    } else {
        echo "Error: Job reposting failed";
    }
}