<?php
// Initialize the session
session_start();
require_once 'inc/config.php'; 
require_once'inc/header.php';


$UserLeveSql = "SELECT * FROM news WHERE approved=1 ORDER BY created ASC LIMIT 4 ;";
$result = mysqli_query($link, $UserLeveSql);
?>
	 
	<div class="col-sm-5 col-sm-offset-2 col-md-6 col-md-offset-0"> 
		Welcome <?php echo $_SESSION{'username'}; ?>
		<div style="padding-top:50px">
					<div id="accordion">
					Current News 
					<hr>
									<div class="card">
										<?php include 'getNews.php'; ?>
		</div>
	
	
	
	

	
	
	
	
	
