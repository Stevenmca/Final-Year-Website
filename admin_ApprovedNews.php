<!-- Modal -->

							<h2>Approved News</h2> <Hr>
							
							<table class="table">
							  <thead>
								<tr>
								  <th>ID #</th>
								  <th>Title</th>
								  <th>Content</th>
								  <th>Author</th>	
								</tr>
							  </thead>
							
							<?php
						
							// Include config file
							require_once 'inc/config.php';

							$UserLeveSql = "SELECT * FROM news WHERE approved = 1";
							$result = mysqli_query($link, $UserLeveSql);
							
							while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results
							 // start a table tag in the HTML
							
							echo 	"<tr><td>" . $row['ID'] . 
									"</td><td>" . $row['Title'] . 				 									
									"</td><td>". $row['Content'] . 
									"</td><td>". $row['Author'] . 
									"</td></tr>";  
							}

							echo "</table>";
							
							
						
						?> 	
							
							<form action="" method="post">

								<div class="form-group">
									<input type="submit" class="btn btn-primary" name="ApproveNews" value="Submit">
									<input type="reset" class="btn btn-default" value="Reset">
								</div>
							</form>	