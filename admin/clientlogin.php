<?php

require '../functions.php';
$getConnection;
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/styles.css" />
    <title>Jo's Jobs - Admin Home</title>
</head>

<body>
    <header>
        <section>
            <aside>
                <h3>Office Hours:</h3>
                <p>Mon-Fri: 09:00-17:30</p>
                <p>Sat: 09:00-17:00</p>
                <p>Sun: Closed</p>
            </aside>
            <h1>Jo's Jobs</h1>

        </section>
    </header>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li>Jobs
                <ul>
                    <?php
                    $table = "category";
                    $columns = "*";
                    $field = "";
                    $value = "";


                    $data = selectTable($table, $columns, $field, $value);

                    $categories = selectTable($table, $columns, $field, $value);
                    foreach ($categories as $category) {
                        echo '<li><a href="jobs.php?categoryid=' . $category['id'] . '">' . $category['name'] . '</a></li>';

                    }



                    ?>



                </ul>
            </li>
            <li><a href="/about.html">About Us</a></li>
            <li><a href="/faq.html">faq
                </a></li>
        </ul>

    </nav>
    <img src="/images/randombanner.php" />
    <?php
    $_SESSION['loggedin'] = true;
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        ?>
        <main class="sidebar">

            <section class="left">
                <form method="get" action="jobs.php">
                    <ul>
                        <li><a href="clientjobs.php">Jobs</a></li>
                        <li><a href="clientlogin.php" onclick="logout()">logout</a></li>
                   

                </form>

                </ul>
            </section>
            <?php
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                if (login('admins', $username, $password)) {
                    $_SESSION['loggedin'] = true;
                } else {
                    echo "Invalid login credentials.";
                }

                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                }
                ?>







<section class="right">

<h2>You are now logged in</h2>


<?php
            } else {

                ?>
<h1>login</h1>

<form action="" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">
	<label for="password">Password:</label>
<input type="password" id="password" name="password">

<input type="submit" name="submit" value="Login">

</form>
<?php
            }
            ?>


</main>


</body>
    <?php
    $_SESSION['loggedin'] = true;
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

        require '../footer.php';
    }
    ?>

</html>
        <?php
    }
    

    ?>