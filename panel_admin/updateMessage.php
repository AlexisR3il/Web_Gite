<?php
	include('connection.php');
	$id=$_GET['id'];
 
	$message=$_POST['message'];
 
	mysqli_query($con,"update `message_accueil` set message='$message' where id='$id'");
	header('location:admin_panel.php');
?>