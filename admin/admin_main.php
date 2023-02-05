<?php
session_start();
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
                                       <li><a href="/faqs.php">faq</a></li>
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
			<li><a href="jobs.php">Jobs</a></li>
			<li><a href="categories.php">Categories</a></li>
			<li><a href="archives.php">archives</a></li>
            			<li><a href="index.php">home</a></li>
                        	<li><a href="contact.php">enquiries</a></li>
<li><a href="logout.php">logout</a></li>


            	
        </form>

		</ul>
	</section>
<?php

    }

    ?>