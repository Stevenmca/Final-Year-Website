<?php

?>




<script src="js/site.js"></script>


<html> 

						<div style="padding-top: 15px;">

						<h4>News needing approval</h4> <Hr>
							
						<table class="table">
						  <thead>
							<tr>
							  <th>ID #</th>
							  <th>Title</th>
							  <th>Content</th>
							  <th>Author</th>	
							  <th>Approve</th>
							  <th>Delete</th>
							</tr>
						  </thead>
						
						
						<?php
						
							// Include config file
							require_once 'inc/config.php';

							$UserLeveSql = "SELECT * FROM news WHERE approved < 1";
							$result = mysqli_query($link, $UserLeveSql);
							$ApproveID = "";
							while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results
							
							 // start a table tag in the HTML
							$ApproveID = $row['ID'];
							echo 	"<tr><td>" . $row['ID'] . 
									"</td><td>" . $row['Title'] . 				 									
									"</td><td>". $row['Content'] . 
									"</td><td>". $row['Author'] . 
									"</td><td>" . " <form action='' method='POST'>
														<div class='form-group'>
															<input type='submit' href='id=". $row['ID'] . "' class='btn btn-primary' name='ApproveBTN' value='Approve'>
															<input type='hidden' value='". $row['ID']. "' name='IDValue'>
															". 
															
															"</td><td>" . " 		
														</div>
													</form>
													
													<form action='' method='POST'>
														<div class='form-group'>
															<input type='submit' href='id=". $row['ID'] . "' class='btn btn-danger' name='DeleteBTN' value='Delete'>
															<input type='hidden' value='". $row['ID']. "' name='DeleteIDValue'>
															".															
															"</td><td>" . " 		
														</div>
													</form>
													
													
												".
													
													
													
									
									
														 
									"</td></tr>";  
								
						
										
							}
							

							echo "</table>";
	
						if (isset($_POST['ApproveBTN'])){
							$id = $_POST['IDValue'];

							$UpdateNewsSQL = "UPDATE news SET approved = '1' WHERE ID= {$id} ";
							mysqli_query($link, $UpdateNewsSQL);
							echo "<meta http-equiv='refresh' content='0'>";
							
						}
					
						if (isset($_POST['DeleteBTN'])){
							$DeleteID = $_POST['DeleteIDValue'];

							$DeleteNewsSQL = "DELETE FROM news WHERE ID= {$DeleteID} ";
							mysqli_query($link, $DeleteNewsSQL);
							echo "<meta http-equiv='refresh' content='0'>";
						}					
					
					
						?> 
						
						
						</div>

</html>

