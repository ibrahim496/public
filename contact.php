<?php
session_start();
?>
<?php
require 'main.php';
?>

<?php

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    if (isset($_POST['submit'])) {
		$db = getConnection();
        $stmt = $db->prepare('INSERT INTO contact (name, email, telephone, enquiry) 
            VALUES (:name, :email, :telephone, :enquiry)');
              $criteria = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'telephone' => $_POST['telephone'],
            'enquiry' => $_POST['enquiry'],
        ];   $stmt->execute($criteria);
        echo "thank you your enquiry has been recieved we will get back to you";
    }
      else {
        ?>

        <h1>Enquiry</h1>

        <form action="contact.php" method="POST">
             <label>Name</label>
            <input type="text" name="name" />

            <label>Email</label>
            <input type="text" name="email" />

            <label>Telephone</label>
            <input type="text" name="telephone" />

            <label>Enquiry</label>
            <textarea name="enquiry"></textarea>

            <input type="submit" name="submit" value="Add" />

        </form>
              <?php
    }
}
