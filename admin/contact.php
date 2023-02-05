<?php
require 'admin_main.php';
$getConnection;

?>

<section class="right">

    <?php

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        ?>


        <h2>enquires</h2>


        <?php
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Name</th>';
        echo '<th style="width: 5%">&nbsp;</th>';
        echo '<th style="width: 5%">&nbsp;</th>';


        echo '</tr>';
        $table = "contact";
        $columns = "*";
        $field = "";
        $value = "";
            

        $data = selectTable($table, $columns, $field, $value);

        $categories = selectTable($table, $columns, $field, $value);





        foreach ($categories as $category) {
            echo '<tr>';
            echo '<td>' . $category['name'] . '</td>';
                echo '<td>' . $category['email'] . '</td>';

				
                echo '<td>' . $category['telephone'] . '</td>';
                echo '<td>' . $category['enquiry'] . '</td>';
                echo '<td><form method="post" action="add_enquiry.php">
                	<input type="hidden" name="sorted" value="' . $category['name'] . '" />
				<input type="submit" name="submit" value="sorted" />
				</form></td>';

              
            echo '</tr>';
        }
        

        echo '</thead>';
        echo '</table>';

    }
    require '../footer.php';
    ?>

</section>





