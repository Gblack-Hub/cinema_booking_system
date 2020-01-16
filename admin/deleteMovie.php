<?php
	require('mycon.php');

	$id = $_GET['id'];

	$query = mysqli_query($con, "DELETE FROM movies WHERE id='$id' ");
	if($query){
		header("Location:dashboard.php");
	}
?>