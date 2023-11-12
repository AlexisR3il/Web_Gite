<?php
$id = $_GET['id'];
include('connection.php');

$result = mysqli_query($con, "SELECT image_url FROM images WHERE id='$id'");
$row = mysqli_fetch_assoc($result);
$imagePath = '../upload/' . $row['image_url'];

mysqli_query($con, "DELETE FROM images WHERE id='$id'");

if (file_exists($imagePath))
{
    if (unlink($imagePath)) 
	{
    }
}

header('location:admin_panel.php');
?>
