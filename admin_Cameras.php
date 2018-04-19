
<h2>Cameras</h2> <Hr>
							
							<table class="table">
							  <thead>
								<tr>
								  <th>ID #</th>
								  <th>Camera Name </th>
								  <th>Link</th>
								  <th>Enabled</th>	
								</tr>
							  </thead>



<?php 

require_once 'inc/config.php';

$CamSQL = "SELECT * FROM cameras";
$result = mysqli_query($link, $CamSQL);

while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results
							 // start a table tag in the HTML
							
							echo 	"<tr><td>" . $row['id'] . 
									"</td><td>" . $row['CameraName']. 		
									"</td><td>" . $row['link'] . 
									"</td><td>". $row['enabled'] . 
									"</td></tr>";  
							}

							echo "</table>";
?>