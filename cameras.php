<?php 
session_start();
require_once 'inc/config.php'; 
require_once'inc/header.php';


$proxy = 'https://cors-anywhere.herokuapp.com/';
$CamURL = 'https://content.jwplatform.com/previews/j0zWzAk1-7ldQbxkB';

$CamSQL = "SELECT * FROM cameras WHERE enabled=1";
$result = mysqli_query($link, $CamSQL);


?>

<html>

			<div class='container'>


			<?php 
			
			
			
			while($row = mysqli_fetch_assoc($result)){
			
			
			echo $row['CameraName'];
				
			echo "
			
				<div class='row'>
					<div class='col-sm'>
						<div class='embed-responsive embed-responsive-16by9'>
							<iframe id='LoadCameraOne' class='embed-responsive-item' src='". $row['link']. "'></iframe>
						</div>
					</div>
				</div>
			
			
			
			";
			
			}
			
			?> 
			</div>
			
	
	
	
</div>
	
	



	