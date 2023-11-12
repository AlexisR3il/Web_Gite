<?php
	include('connection.php');
	$id=$_GET['id'];
 
	$facebook=$_POST['facebook'];
	$twitter=$_POST['twitter'];
    $numero=$_POST['numero'];
	$mail=$_POST['mail'];
 
	mysqli_query($con,"update `contacts` set facebook='$facebook', numero='$numero', twitter='$twitter', mail='$mail' where idcontact='$id'");
	header('location:admin_panel.php');
?>