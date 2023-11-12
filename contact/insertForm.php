<?php
	include('../panel_admin/connection.php');
 
	$name=$_POST['name'];
	$number=$_POST['number'];
    $mail=$_POST['mail'];
    $room=$_POST['room'];
	$message=$_POST['message'];
 
	mysqli_query($con,"INSERT INTO `forms`(`id`, `name`, `number`, `mail`, `room`, `message`) VALUES ('','$name','$number','$mail','$room','$message')");
	header('location:../contact.php');
?>