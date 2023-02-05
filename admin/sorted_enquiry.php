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


       $arc = $db->query('SELECT * FROM solved_enquiries');
                 foreach ($arc as $arc) {
           
            

            

				echo '<tr>';
				echo '<td>' . $arc['name'] . '</td>';
				echo '<td>' . $arc['email'] . '</td>';
                	echo '<td>' . $arc['telephone'] . '</td>';
                    	echo '<td>' . $arc['enquiry'] . '</td>';
                        	echo '<td>' . $arc['admin_username'] . '</td>';
                
            
			
         
              
                	}
echo '</tr>';
			
			echo '</thead>';
			echo '</table>';
