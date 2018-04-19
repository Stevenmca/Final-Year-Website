<?php
// Initialize the session
session_start();
require_once 'inc/config.php'; 
require_once'inc/header.php';
require_once'inc/sidebar.php';

 
 $UserLeveSql = "SELECT username, UserLevel, sessioncode FROM users 	WHERE sessioncode = {$activesession} ";
$result = mysqli_query($link, $UserLeveSql);

$row = mysqli_fetch_assoc($result);

$AdminAccess = $row["UserLevel"];

if (($row['UserLevel']) == "0"){
	header("location: index.php");
	
}





?>

<html>


		
	
			<section class="Panels">
			
			
			Support Panel <p>
			
						
				<ul class="nav nav-tabs">
					  <li class="nav-item">
						<a class="nav-link active" href="#" id="link-1" aria-controls="section-1" role="tab" data-target="#section-1" data-toggle="tab">View Users</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="#" id="link-1" aria-controls="section-2" role="tab" data-target="#section-2" data-toggle="tab">Add Users</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="#" id="link-3" aria-controls="section-3" role="tab" data-target="#section-3" data-toggle="tab">Add News</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="#" id="link-3" aria-controls="section-3" role="tab" data-target="#section-4" data-toggle="tab">Search Users</a>
					  </li>
				</ul>
				
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="section-1">
						<?php include 'support_viewUsers.php' ?>
					</div>
					<div role="tabpanel" class="tab-pane" id="section-2">
						<?php include 'support_AddUser.php' ?>  
					</div>
					<div role="tabpanel" class="tab-pane" id="section-3">
						<?php include 'support_addNews.php'?>
					</div>
					<div role="tabpanel" class="tab-pane" id="section-4">
						<?php include 'support_SearchUsers.php'?>
					</div>
				</div>
			
			

			
			
			
			</section>
			
		
		
		
	
	
	
	
	