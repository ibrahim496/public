<?php

require 'admin_main.php';
$getConnection;

?>

</section>

<section class="right">

    <?php

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        if (isset($_POST['submit'])) {
            $db = getConnection();
            $stmt = $db->prepare('UPDATE admins SET username = :username, password = :password WHERE id = :id ');

            $criteria = [
                'username' => $_POST['username'],
                'password' => $_POST['password'],

                'id' => $_POST['id']



            ];

            $stmt->execute($criteria);
            echo 'Admin Saved';
        } else {
            $db = getConnection();
            $currentAdmin = $db->query("SELECT * FROM admins WHERE username = '" . $_GET['username'] . "'")->fetch();


            ?>


        <h2>Edit Admin</h2>

        <form action="" method="POST">

            <input type="hidden" name="id" value="<?php echo $currentAdmin['id']; ?>" />
            <label>Name</label>
            <input type="text" name="username" value="<?php echo $currentAdmin['username']; ?>" />

            <label>Password</label>
            <input type="password" name="password" value="<?php echo $currentAdmin['password']; ?>" />


            <input type="submit" name="submit" value="Save Admin" />

        </form>



    </section>
    </main>

<?php
        }
    }
    require '../footer.php';
    ?>

</body>

</html>