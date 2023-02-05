<?php

require 'functions.php';
$database;
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/styles.css" />
    <title>Jo's Jobs - Home</title>
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
                            <li><a href="/contact.php">contact </a></li>
                            	<button> <a href="admin/clientlogin.php">client  login </a>
		</button>
        </ul>

    </nav>
    <img src="images/randombanner.php" />
    