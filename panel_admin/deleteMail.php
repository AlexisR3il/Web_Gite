<?php
	$id=$_GET['id'];
	include('connection.php');
	mysqli_query($con,"delete from `forms` where id='$id'");
	header('location:admin_panel.php');
?>