<?php 

require_once 'inc/config.php';

if (isset($_POST['SubmitSiteName']) ) {
	
	 //DB details
    $dbHost = 'localhost';
    $dbUsername = 'B00656340';
    $dbPassword = 'RW3jkdqh';
    $dbName = 'b00656340';
    
    //Create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    if ($db->connect_error) {
        die("Unable to connect database: " . $db->connect_error);
    }
    $WebsiteTextName = $_POST['SiteName'];
    //get content from database
    $query = $db->query("UPDATE website SET name='{$WebsiteTextName}'");
    
	
	
	
}



?>




					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
								<div class="form-group">
									<label>Change Site Name
									</label>
									<input type="text" name="SiteName"class="form-control">
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-primary" name="SubmitSiteName" value="Submit">
									<input type="reset" class="btn btn-default" value="Reset">
								</div>
							</form>