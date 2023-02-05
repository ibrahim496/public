<?php


require 'admin_main.php';

?>
<?
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];


	if (login('admins', $username, $password)) {
		$_SESSION['loggedin'] = true;

	} else {
		echo "Invalid login credentials.";
	}



	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {


		?>




<?php
	}
	
?>


<section class="right">

<h2>You are now logged in</h2>
<button> <a href="manageadmin.php">manage  admin </a>
</button>
	<button> <a href="manageusers.php">manage  users </a>
		</button>
</section>

	
<?php
	
	}else {

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

	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

		require '../footer.php';
	}
        ?>

</html>