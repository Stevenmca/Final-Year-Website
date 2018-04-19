<?php
		require_once 'inc/config.php';		

		
		$id = $_POST['IDValue'];
		
		
		$UpdateNewsSQL = "UPDATE news SET approved = '1' WHERE ID= {$id} ";
		mysqli_query($link, $UpdateNewsSQL);
	

						
?> 