<?php
	include('connection.php');
	$id=$_GET['id'];
 
	$nuite_haute=$_POST['nuite_haute'];
	$semaine_haute=$_POST['semaine_haute'];
    $nuite_moyenne=$_POST['nuite_moyenne'];
	$semaine_moyenne=$_POST['semaine_moyenne'];
 
	mysqli_query($con,"update `prix` set nuite_haute='$nuite_haute', semaine_haute='$semaine_haute', nuite_moyenne='$nuite_moyenne', semaine_moyenne='$semaine_moyenne' where id='$id'");
	header('location:admin_panel.php');
?>