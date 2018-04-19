<?php
	

if(!empty($_GET['id'])){
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
    
    //get content from database
    $query = $db->query("SELECT * FROM users WHERE id = {$_GET['id']}");
    
    if($query->num_rows > 0){
        $cmsData = $query->fetch_assoc();
        echo '
		<form method="post">
					
			
				<table style="width:100%">
					  <tr>
						<div class="form-group">
							<td><label for="exampleInputPassword1">User ID</label></td>
							<td> <input type="text" class="form-control" name="fname" value='. $cmsData['id'] . ' disabled> </td>
						</div>
					  </tr>
					  <tr>
						<td>Role</td>
						<td style="text-align:center; vertical-align:middle;"> 					
							<select  name="RoleOption" class="form-control" disabled>
									<option selected="selected" value='. $cmsData['UserLevel'] . ' > </option>
									  <option value="2" >Admin</option>
									  <option value="1">Support</option>
									  <option value="0" >Normal</option>
							</select>
						</td> 						
					  </tr>
					  <tr>
						<td> Username </td> 
						<td> <input type="text" class="form-control" name="uname" value='. $cmsData['username'] . '> </td>
					  </tr>
					  
					  <tr>
						<td> Password </td>
						<td> <input type="password" class="form-control"> </td>
					  </tr>		
					  <tr>
						<td> Confirm Password </td>
						<td> <input type="password" class="form-control"> </td>
					  </tr>						  
				</table>
			
		</form>';
    }else{
        echo 'Content not found..ERR AD2..';
    }
}else{
    echo 'Content not found..ddd..ERR AD3';
}
?>