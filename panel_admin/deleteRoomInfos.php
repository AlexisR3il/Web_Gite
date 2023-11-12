<?php
	$id=$_GET['id'];
	include('connection.php');
	mysqli_query($con,"delete from `room_infos` where roomid='$id'");
	header('location:admin_panel.php');
?>