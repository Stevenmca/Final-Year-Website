<?php
// Include config file
require_once 'inc/config.php';
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if (isset($_POST['AddUserBtn']) ) {
 
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
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }
	

    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, UserLevel) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_userRole);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_userRole = "0";
			
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
									<label>Username</label>
									<input type="text" name="username"class="form-control">
									<span class="help-block"><?php echo $username_err; ?></span>
								</div>    
								<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
									<label>Password</label>
									<input type="password" name="password" class="form-control">
									<span class="help-block"><?php echo $password_err; ?></span>
								</div>
								<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
									<label>Confirm Password</label>
									<input type="password" name="confirm_password" class="form-control"">
									<span class="help-block"><?php echo $confirm_password_err; ?></span>
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-primary" value="Submit" name="AddUserBtn">
									<input type="reset" class="btn btn-default" value="Reset">
								</div>
							</form>
						</div>

</html>