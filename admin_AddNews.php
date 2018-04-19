<?php 

require_once 'inc/config.php';

if (isset($_POST['AddNews']) ) {
	
	 //DB details
    $dbHost = 'localhost';
    $dbUsername = 'B00656340';
    $dbPassword = 'RW3jkdqh';
    $dbName = 'b00656340';
    
    //Create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
	$NewsTitle = $_REQUEST['NewsTitle'];
	$NewsContent = $_REQUEST['NewsContent'];
		//get content from database
	$query = $db->query("INSERT INTO news (Title,Content,approved) VALUES ('$NewsTitle', '$NewsContent', '1') ");
		
	$db->close();
		
		
    if ($db->connect_error) {
        die("Unable to connect database: " . $db->connect_error);
    }
	
	
	
}

?>

<html>
					<form action="" method="post">
								<div class="form-group">
									<label>Add news title
									</label>
									<input type="text" name="NewsTitle" class="form-control">
								</div>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Add News Content</label>
									<textarea class="form-control" name="NewsContent" id="exampleFormControlTextarea1" rows="3"></textarea>
								</div>						
								<div class="form-group">
									<input type="submit" class="btn btn-primary" name='AddNews' value="Submit">
									<input type="reset" class="btn btn-default" value="Reset">
								</div>
							</form>
</html>