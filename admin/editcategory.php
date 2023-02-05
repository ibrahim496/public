<?php

require 'admin_main.php';
$getConnection;
?>

</section>

<section class="right">

	<?php

	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

		if (isset($_POST['submit'])) {

			$criteria = [
				'name' => $_POST['name'],
				'id' => $_POST['id']
			];
			updateTable('category', $criteria, 'name', ':name', 'id', ':id');

			echo 'Category Saved';

		} else {
			$currentCategory = selectTable('category', '*', 'id', $_GET['id'])[0];

			?>





		<h2>Edit Category</h2>

		<form action="" method="POST">

			<input type="hidden" name="id" value="<?php echo $currentCategory['id']; ?>" />
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $currentCategory['name']; ?>" />


			<input type="submit" name="submit" value="Save Category" />

		</form>


	<?php


		}

	}


	?>


</section>
</main>


<?php
require '../footer.php';
?>

</body>

</html>