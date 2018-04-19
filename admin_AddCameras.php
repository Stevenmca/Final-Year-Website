<?php
// Include config file
require_once 'inc/config.php';
 

if (isset($_POST['AddCamBTN']) ) {
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
				//Errors
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a Camera link.";     
    } 
	
    

	

    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO cameras (CameraName, Link, Enabled) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_userRole);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
			$option = $_POST['RoleOption'];
            $param_userRole = $option;
			
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // SUCCESS!! 
                
            } else{
                echo("Error description: " . mysqli_error($link));
            }
        }
         
		 
		 
		 
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 





<html> 

						<div style="padding-top: 15px;">
						
							<p>Please fill this form to create an account.</p>
							<form method="post">
								<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
									<label>Camera Name</label>
									<input type="text" name="username"class="form-control">
									<span class="help-block"><?php echo $username_err; ?></span>
								</div>    
								<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
									<!-- Handles any password errors --> 
									<label>Link</label>
									<input type="password" name="CameraLink" class="form-control">
									<span class="help-block"><?php echo $password_err; ?></span>
								</div>
								 <div class="form-group">
									<label for="exampleFormControlSelect1">Camera Control</label>
									<select  name="RoleOption" class="form-control">
									  <option value="1">Enabled</option>
									  <option value="0">Disabled</option>
									</select>
								  </div>
								<div class="form-group">
									<input type="submit" class="btn btn-primary" name="AddCamBTN">
									<input type="reset" class="btn btn-default" value="Reset">
								</div>
							</form>
						</div>

</html>