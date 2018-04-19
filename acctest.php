<?php
// Initialize the session
session_start();
require_once 'inc/config.php'; 
require_once'inc/header.php';
require_once'inc/sidebar.php';

$UserLeveSql = "SELECT * FROM news ORDER BY created DESC LIMIT 3;";
$result = mysqli_query($link, $UserLeveSql);
?>
	 
	<div class="col-sm-5 col-sm-offset-2 col-md-6 col-md-offset-0"> 
		Welcome <?php echo $_SESSION{'username'}; ?>
		<div style="padding-top:50px">
					<div id="accordion">
	
	
	
									<div class="card">

<?php
while($row = mysqli_fetch_assoc($result)){
	
	
							echo 	'<div class="card-header" id="headingOne">
										<h5 class="mb-0">
											<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
												' . $row['Title'] . 
											'</button>
										</h5>	
									</div>
										<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
											<div class="card-body">' 
												. $row['Content'] . 
											'</div>
										</div>
									</div>';  
												
}

?>

<html>

					
	
	

	
		
		</div>
	
	
	
	

	
	
	
	
	
