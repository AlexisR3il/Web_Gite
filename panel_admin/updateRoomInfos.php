<?php
	include('connection.php');
	$id=$_GET['id'];
 
	$room_name=$_POST['room_name'];
	$room_price=$_POST['room_price'];
 
	mysqli_query($con,"update `room_infos` set room_name='$room_name', room_price='$room_price' where roomid='$id'");
	header('location:admin_panel.php');
?>