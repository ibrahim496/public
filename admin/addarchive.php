<?php
require 'admin_main.php';


?>

<?php



if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $db = getConnection();
    $stmt = $db->prepare(' INSERT INTO archive  SELECT * FROM job WHERE id = :id');



    $stmt->execute(['id' => $_POST['archives']]);


    $stmt = $db->prepare('DELETE FROM job WHERE id = :id');


    $stmt->execute(['id' => $_POST['archives']]);




}