<?php
// Initialize the session
session_start();
require_once 'inc/config.php'; 
require_once'inc/header.php';


$UserLeveSql = "SELECT username, UserLevel, sessioncode FROM users 	WHERE sessioncode = {$activesession} ";
$result = mysqli_query($link, $UserLeveSql);

$row = mysqli_fetch_assoc($result);

$AdminAccess = $row["UserLevel"];


//Checking if the user has admin access level
if (($row['UserLevel']) != "2"){
	header("location: index.php");
	
}




?>

<html>

		
	
			<section class="Panels">
			
			
			Admin Panel <p>
			
						
				<ul class="nav nav-tabs">
					  <li class="nav-item">
						<a class="nav-link active" href="#" id="link-1" aria-controls="section-1" role="tab" data-target="#section-1" data-toggle="tab">View Users</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="#" id="link-1" aria-controls="section-2" role="tab" data-target="#section-2" data-toggle="tab">Add Users</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="#" id="link-1" aria-controls="section-2" role="tab" data-target="#section-3" data-toggle="tab">Search Users</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="#" id="link-3" aria-controls="section-3" role="tab" data-target="#section-4" data-toggle="tab">Add News</a>
					  </li>
					   <li class="nav-item">
						<a class="nav-link ApproveBTN" href="#" id="link-3" aria-controls="section-3" role="tab" data-target="#section-5" name="ApproveNews" data-toggle="tab">Approve News</a>
					  </li>
					  	<li class="nav-item">
						<a class="nav-link ApproveBTN" href="#" id="link-3" aria-controls="section-3" role="tab" data-target="#section-6" name="ApproveNews" data-toggle="tab">Approved News</a>
					  </li>
					   <li class="nav-item">
						<a class="nav-link" href="#SS" id="link-3" aria-controls="section-5" role="tab" data-target="#section-7" data-toggle="tab">Site Settings</a>
					  </li>
					  	<li class="nav-item">
						<a class="nav-link" href="#SS" id="link-3" aria-controls="section-5" role="tab" data-target="#section-8" data-toggle="tab">Cameras</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="#SS" id="link-3" aria-controls="section-5" role="tab" data-target="#section-9" data-toggle="tab">Add Cameras</a>
					  </li>
				</ul>
				
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="section-1">
						<?php include 'admin_viewUsers.php' ?>
					</div>
					<div role="tabpanel" class="tab-pane" id="section-2">
						 <?php include 'admin_addUser.php' ?> 
					</div>
					<div role="tabpanel" class="tab-pane" id="section-3">
						 <?php include 'admin_SearchUser.php' ?> 
					</div>
					<div role="tabpanel" class="tab-pane" id="section-4">
						<?php include 'admin_AddNews.php' ?>
					</div>
					<div role="tabpanel" class="tab-pane" id="section-5">
						<?php include 'admin_ApproveNews.php' ?>
					</div>					
					<div role="tabpanel" class="tab-pane" id="section-7">
						<?php include 'admin_SiteSettings.php' ?>
					</div>
					<div role="tabpanel" class="tab-pane" id="section-6">
						<?php include 'admin_ApprovedNews.php' ?>
					</div>
					<div role="tabpanel" class="tab-pane" id="section-8">
						<?php include 'admin_Cameras.php' ?>
					</div>
					
					<div role="tabpanel" class="tab-pane" id="section-9">
						<?php include 'admin_AddCameras.php' ?>
					</div
				</div>
			
			

			
			
				
			</section>
			
		
		
		
		
	
	
	
	
	