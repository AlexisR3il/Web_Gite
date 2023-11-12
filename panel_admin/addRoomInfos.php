<?php
	include('connection.php');
 
	$room_name=$_POST['room_name'];
	$room_price=$_POST['room_price'];
 
	mysqli_query($con,"insert into `room_infos` (room_name,room_price) values ('$room_name','$room_price')");
	header('location:admin_panel.php');
?>