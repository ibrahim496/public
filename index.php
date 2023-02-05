<?php
session_start();

?>
<?php
require 'main.php';
?>

<main class="home">
	<p>Welcome to Jo's Jobs, we're a recruitment agency based in Northampton. We offer a range of different office jobs.
		Get in touch if you'd like to list a job with us.</a></p>

	<h2>Select the type of job you are looking for:</h2>
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
	<h2>Jobs expering soon:</h2>
	<?php
//i used a try and catch to display an error when the database connection has an error which is a good way of debugging
	try {

		$db = getConnection();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $db->prepare("SELECT * FROM job WHERE closingDate >= CURDATE() ORDER BY closingDate ASC LIMIT 10");
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$jobs = $stmt->fetchAll();

		foreach ($jobs as $job) {
			echo '<a href="apply.php?id=' . $job['id'] . '">';
			echo "Title: " . $job["title"] . " | Closing Date: " . $job["closingDate"] . "<br>";
		}
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;



	?>


</main>

<?php
require 'footer.php';
?>

</body>

</html>