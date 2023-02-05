<?php

require '../functions.php';
$getConnection;
$db = getConnection();

$categoryId = isset($_GET['categoryid']) ? intval($_GET['categoryid']) : 0;
$stmt = $db->prepare('SELECT * FROM job WHERE categoryId = :categoryId');
$stmt->execute(['categoryId' => $categoryId]);
$jobs = $stmt->fetchAll();

$stmt = $db->prepare('SELECT * FROM category');
$stmt->execute();
$categories = $stmt->fetchAll();
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
        </ul>

    </nav>
    <img src="/images/randombanner.php" />
    	<main class="sidebar">

	<section class="left">
         <form method="get" action="jobs.php">
		<ul>
			<li><a href="jobs.php">Jobs</a></li>
			<li><a href="categories.php">Categories</a></li>
			<li><a href="archives.php">archives</a></li>
            	<label>Filter by category:</label>
			  <select name="categoryid">
				<option value="">Select a category</option>
			<?php
            foreach ($categories as $category) {
              echo '<option value="' . $category['id'] . '" ' . ($categoryId === $category['id'] ? 'selected' : '') . '>' . $category['name'] . '</option>';
            }
            ?>
                </select>
	<input type="submit" value="Filter">
        </form>


		</ul>
				<li><a href="index.php">home</a></li>
<li><a href="logout.php">logout</a></li>

	</section>



 

<section class="right">





		<h2>Jobs</h2>

		<a class="new" href="addjob.php">Add new job</a>

		<?php

		echo '<table>';
		echo '<thead>';
		echo '<tr>';
		echo '<th>Title</th>';
		echo '<th style="width: 15%">category</th>';
		echo '<th style="width: 5%">Salary</th>';

		echo '<th style="width: 15%">&nbsp;</th>';
		echo '<th style="width: 25%">&nbsp;</th>';
		echo '<th style="width: 15%">&nbsp;</th>';
		echo '<th style="width: 25%">&nbsp;</th>';
		echo '</tr>';
		$db = getConnection();
	


		foreach ($jobs as $job) {
			$category = $db->prepare('SELECT name FROM category WHERE id = :categoryId');
			$category->execute(['categoryId' => $job['categoryId']]);

			$categorys = $category->fetch();








			$applicants = $db->prepare('SELECT count(*) as count FROM applicants WHERE jobId = :jobId');

			$applicants->execute(['jobId' => $job['id']]);

			$applicantCount = $applicants->fetch();

			echo '<tr>';
			echo '<td>' . $job['title'] . '</td>';
			echo '<td>' . $categorys['name'] . '</td>';
		
			echo '<td>' . $job['salary'] . '</td>';

		

			echo '<td><a style="float: right" href="editjob.php?id=' . $job['id'] . '">Edit</a></td>';
			echo '<td><a style="float: right" href="applicants.php?id=' . $job['id'] . '">View applicants (' . $applicantCount['count'] . ')</a></td>';
			echo '<td><form method="post" action="deletejob.php">
				<input type="hidden" name="id" value="' . $job['id'] . '" />
				<input type="submit" name="submit" value="Delete" />

				
				</form></td>';
			echo '<td><form method="post" action="addarchive.php">
				<input type="hidden" name="archives" value="' . $job['id'] . '" />
				<input type="submit" name="submit" value="Archive" />
				</form></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<tr>';



			echo '</thead>';
			echo '</table>';
		}
	?>

</section>
</main>


</body>

</html>