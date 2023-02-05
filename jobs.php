<?php
require 'connect.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
   


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
                $stmt = $pdo->prepare('SELECT * FROM category');
                $stmt->execute();
                $categories = $stmt->fetchAll();
                foreach ($categories as $category) {
                    echo '<li><a href="jobs.php?categoryid=' . $category['id'] . '">' . $category['name'] . '</a></li>';
                }


                ?>

                </ul>
            </li>
            <li><a href="/about.html">About Us</a></li>
        </ul>

    </nav>
    <img src="images/randombanner.php" />
    	<main class="sidebar">
    <section class="left">
        <ul>
            <?php
             $categoryId = isset($_GET['categoryid']) ? $_GET['categoryid'] : null;
    $location = isset($_GET['location']) ? $_GET['location'] : null;
    $stmt = $pdo->prepare('SELECT * FROM category WHERE id = :id');
       $stmt->execute(['id' => $categoryId]);
    $category = $stmt->fetch();
    $categorys = $category['name'];
    $stmt = $pdo->prepare('SELECT * FROM job WHERE categoryId = :categoryId');
    if ($location) {
        $stmt = $pdo->prepare('SELECT * FROM job WHERE categoryId = :categoryId AND location = :location ORDER BY closingDate');
        $stmt->execute(['categoryId' => $categoryId, 'location' => $location]);
    } else {
        $stmt->execute(['categoryId' => $categoryId]);
    }
    ?>
        <?php
        $stmt = $pdo->prepare('SELECT * FROM category');
        $stmt->execute();
        $categories = $stmt->fetchAll();
        foreach ($categories as $category) {
            echo '<li><a href="jobs.php?categoryid=' . $category['id'] . '">' . $category['name'] . '</a></li>';
        }
        ?>
        </ul>

                 <form class="location-filter" action="jobs.php" method="GET">
            <label for="location">Location: </label>
            <select id="location" name="location">
                <option value="">All</option>
                <?php
                    $stmt = $pdo->prepare('SELECT DISTINCT location FROM job');
                    $stmt->execute();
                    $locations = $stmt->fetchAll();
                    foreach ($locations as $location) {
                        echo '<option value="' . $location['location'] . '">' . $location['location'] . '</option>';
                    }
                    ?>
</select>
            <input type="hidden" name="categoryid" value="<?= $categoryId ?>">
            <input type="submit" value="Filter">
        <?php

            $location = isset($_GET['location']) ? $_GET['location'] : '';


            $sql = 'SELECT * FROM job';

        if (!empty($location)) {
            $sql .= ' WHERE location = :location';
        }

        $stmt = $pdo->prepare($sql);

        if (!empty($location)) {
            $stmt->execute(['location' => $location]);
        } else {
            $stmt->execute();
        }
       ?> 
          
        </form>
    </section>
    <?php
}
?>


</section>
    <section class="right">
     <ul class="list">
             <?php
    foreach ($stmt as $job) {
        echo '<li>';

        echo '<div class="details">';
        echo '<h2>' . $job['title'] . '</h2>';
        echo '<h3>' . $job['salary'] . '</h3>';
    echo '<h3>' . $job['location'] . '</h3>';
    echo '<p>' . $job['description'] . '</p>';
    echo '<p>' . $job['closingDate'] . '</p>';
    echo '<a class="more" href="/apply.php?id=' . $job['id'] . '">Apply for this job</a>';

    echo '</div>';
    echo '</li>';
}

?>
