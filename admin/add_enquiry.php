<?php
require 'admin_main.php';


?>

<?php



if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $db = getConnection();
    $stmt = $db->prepare(' INSERT INTO solved_enquiries  SELECT * FROM contact WHERE name = :name');



    $stmt->execute(['name' => $_POST['sorted']]);


    $stmt = $db->prepare('DELETE FROM contact WHERE name = :name');


    $stmt->execute(['name' => $_POST['sorted']]);




}