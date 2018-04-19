<?php
// Include config file
require_once 'inc/config.php';

$UserLeveSql = "SELECT * FROM users";
$result = mysqli_query($link, $UserLeveSql);
?>







<html> 

						<div style="padding-top: 15px;">

						
						<table class="table">
						  <thead>
							<tr>
							  <th>ID #</th>
							  <th>Username</th>
							  <th>Role</th>
							  <th>Last Login</th>
							  <th>Hashed Password</th>							  
							  <th>Edit</th>							  
							</tr>
						  </thead>
						
						
						<?php
						
							

							while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results
							$UserLevel = $row['UserLevel'];
							$LastActive = $row['LastActive'];
							$UniqueSession = $row['sessioncode'];
							switch ($UserLevel){
							case "0":
								$UserLevel = "Normal";
								break;
							case "1":
								$UserLevel = "Support";
								break;
							case "2": 
								$UserLevel = "Admin";
								break; 
							}
							
							if (!isset($LastActive)){
								$LastActive = "Not yet logged in ";
							}else{
								$LastActive = $row['LastActive'];
								}
							 // start a table tag in the HTML
							
							echo 	"<tr><td>" . $row['id'] . 
									"</td><td>" . $row['username'] . 	
									"</td><td>". $UserLevel .		
									"</td><td>"	. $LastActive.				 									
									"</td><td>". $row['password'] . 
									"</td><td>" . "  <button type='button' id=".$row['id']."  class='btn btn-success openBtn'>Edit User</button>" . "</td></tr>";  
							}

							echo "</table>";
						
						
							if (isset($_POST['SaveEditBtn']) ) {
								
								if( $_POST['uname'] !== $row['username']){
									
										$NewUserName = $_POST['uname'] ;
										$NewUserNameSql = "UPDATE users SET username='{$NewUserName}' WHERE username='{$NewUserName}' ";
										mysqli_query($link,$NewUserNameSql);
											/// I was where the last day and isn't updating by each username 
									
								}
							
							}
						?> 
						
						<!-- Modal -->
						  <div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog">
							
							  <!-- Modal content-->
							  <form action="" method="post">
							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title">Edit User</h4>
								</div>
								<div class="modal-body">
									<div class="ModalCenter"> 
									</div>
								</div>
								<div class="form-group">
									<div class="modal-footer">	
										<label> </label>
										<input type="submit" class="btn btn-primary" name="SaveEditBtn" value="Save Changes">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							  </div>
							 </form>
							</div>
						  </div>

						</div>

</html>


<script src="js/site.js"></script>