<?php
// Include config file
require_once 'inc/config.php';

$UserLeveSql = "SELECT * FROM users";
$result = mysqli_query($link, $UserLeveSql);
?>




<script src="js/site.js"></script>


<html> 

						<div style="padding-top: 15px;">

						
						<table class="table">
						  <thead>
							<tr>
							  <th>ID #</th>
							  <th>Username</th>
							  <th>Role</th>
							  <th>Last Login</th>
							</tr>
						  </thead>
						
						
						<?php
						
							 // start a table tag in the HTML

							while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results
							echo 
							"<tr><td>" . $row['id'] . 
							"</td><td>" . $row['username'] . 
							"</td><td>". $row['UserLevel'] . 
							"</td><td>". $row['LastActive'] .
							
							"</td><td></tr>";  
							}

							echo "</table>";
						
						?> 
						
						<!-- Modal -->
						  <div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog">
							
							  <!-- Modal content-->
							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title">Edit User</h4>
								</div>
								<div class="modal-body">
								  <p>Username: </p>
								  <p>Username: </p>
								  <p>Username: </p>
								</div>
								<div class="modal-footer">
								  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							  </div>
							  
							</div>
						  </div>

						</div>

</html>


<script>
$('.openBtn').on('click',function(){
	var id = $(this).attr('id');
    $('.modal-body').load('getContent.php?id='+id,function(){
        $('#myModal').modal({show:true});
    });
});
</script>