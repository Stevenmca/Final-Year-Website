<?php
$i = 0;
while($row = mysqli_fetch_assoc($result)){
							 $i++;
	
							echo 	'<div class="card-header" id="heading' .$i .'">
										<h5 class="mb-0">
											<button class="btn btn-link" data-toggle="collapse" data-target="#collapse' .$i .'" aria-expanded="false" aria-controls="collapse' .$i .'">
											' . $row['Title'] . 
											'</button>
										</h5>	
									</div>';
									
									if($i == "1"){
									echo '<div id="collapse' .$i .'" class="collapse show" aria-labelledby="heading' .$i .'" data-parent="#accordion">
											<div class="card-body">' 
												. $row['Content'] . 
											'<hr> Author: ' . $row['Author'] .'
											</div>
										</div>
									</div>'; 
										
									}else{
									echo '
										<div id="collapse' .$i .'" class="collapse" aria-labelledby="heading' .$i .'" data-parent="#accordion">
											<div class="card-body">' 
												. $row['Content'] . 
											'<hr> Author: ' . $row['Author'] .'
											</div>
										</div>
									</div>';  }
									
}
												


?>
