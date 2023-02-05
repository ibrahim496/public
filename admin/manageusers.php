<?php
require 'admin_main.php';
$getConnection;

?>

<section class="right">

    <?php

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        ?>


        <h2>clients</h2>

        <a class="new" href="registerclient.php">register new clients</a>

        <?php
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Name</th>';
        echo '<th style="width: 5%">&nbsp;</th>';
        echo '<th style="width: 5%">&nbsp;</th>';
        echo '</tr>';
        $table = "client";
        $columns = "*";
        $field = "";
        $value = "";


        $data = selectTable($table, $columns, $field, $value);

        $categories = selectTable($table, $columns, $field, $value);





        foreach ($categories as $category) {
            echo '<tr>';
            echo '<td>' . $category['username'] . '</td>';
            echo '<td><a style="float: right" href="editclient.php?username=' . $category['username'] . '">Edit</a></td>';
            echo '<td><form method="post" action="deleteclient.php">
				<input type="hidden" name="id" value="' . $category['username'] . '" />
				<input type="submit" name="submit" value="Delete" />
				</form></td>';
            echo '</tr>';
        }

        echo '</thead>';
        echo '</table>';

    }
    require '../footer.php';
    ?>