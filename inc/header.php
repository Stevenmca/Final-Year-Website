<?php 
require_once 'inc/config.php'; 

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])  || !isset($_SESSION['sessioncode']) || empty($_SESSION['sessioncode']) ){
  header("location: login.php");
  exit;
}

$activesession = $_SESSION['sessioncode'];

 
$UserLeveSql = "SELECT username, UserLevel, sessioncode FROM users 	WHERE sessioncode = {$activesession} ";
$result = mysqli_query($link, $UserLeveSql);

if($result === FALSE) { 
        die(mysqli_error($link)); // better error handling
    }


$WebsiteBrand = "SELECT name from website";
$BrandResult = mysqli_query($link, $WebsiteBrand);
$row = mysqli_fetch_assoc($BrandResult);

 // For access areas 0 == normal user, 1 == Support, 2 == Admin 


?>



<!DOCTYPE html>
<html lang="en-UK">
   <head>
   <title><?php echo $row['name']; ?></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
   </head>
   
   
   
   <body>
   
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="col-sm-5 col-md-2">
			<a class="navbar-brand" href="#"><?php echo $row['name']; ?></a>
		</div>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

	  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		<ul class="navbar-nav col-sm-9 col-sm-8 col-md-6 col-md-0">
		  <li class="nav-item active">
			<a class="nav-link" href="index.php">Home </a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="cameras.php">Cameras</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="motion.php">Motion Dection</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="temp.php">Temperature</a>
		  </li>				  
		</ul>
		
		
		<ul class="nav navbar-nav ">	
			<a class="nav-link" href="MyAccount.php">My Account</a>
		
		
		<?php
			while($row = mysqli_fetch_assoc($result)) 
			{
			  
			
			  
			  switch ($row["UserLevel"]){
				
				//Normal Account
				case "0":
				//echo '';
				
				 

				break;
				
				//Support Account 
				case "1":
				
						
				echo '	
								<a class="nav-link" href="support.php">Support Area</a>
						 </ul>';
				break;
				

					
				// Admin Account 
				case "2":		 
				echo '	 	
								<a class="nav-link" href="admin.php">Admin Area</a>	
								<a class="nav-link" href="support.php">Support Area</a>
				</ul>';		
				break;
				
				  
			  }
			}
		
		?> 
		
		<ul class="nav navbar-nav navbar-right">	
			<a class="nav-link" href="inc/logout.php">Logout</a>
		</ul>
		
		
	  </div>
	</nav>
   
   
   
   
   
   
   
   
   </body>
   
   
</html>