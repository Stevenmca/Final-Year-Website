<?php
// Initialize the session
session_start();
require_once 'inc/config.php'; 
require_once'inc/header.php';
require_once'inc/sidebar.php';


 




?>



<html> 

My Account <br>

<br>
<form method="POST" action="functions.php">
Password: <input type="password" name="password1" id="password1"  class="form-control"/><br>
Confirm Password: <input type="password" name="password2" id="password2"  class="form-control" /><br>
        <input type="submit" value="Change Password" class="btn btn-primary"/>
		<span class="help-block"><?php echo $password_err = ""; ?></span>
</form>

</html>