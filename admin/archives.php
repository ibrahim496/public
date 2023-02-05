<?php
require 'admin_main.php';
?>
<section class="right">
    	
<?php


		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
        	if (isset($_POST['new2']))
            ?>
            	<?php
                	echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Title</th>';
			echo '<th style="width: 15%">Salary</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 15%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';
          

		
          


  $db = getConnection();


       $arc = $db->query('SELECT * FROM archive');
                 foreach ($arc as $arc) {
           
            

            

				echo '<tr>';
				echo '<td>' . $arc['title'] . '</td>';
				echo '<td>' . $arc['salary'] . '</td>';
               echo '<td><form method="post" action="repostjob.php">
			
             <input type="hidden" name="id" value="' . $arc['id'] . '" />
    <input type="submit" name="submit" value="repost" />
				</form></td>';
              
                	}
echo '</tr>';
			
			echo '</thead>';
			echo '</table>';
