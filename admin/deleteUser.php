<?php
	require('../mycon.php');

	$id = $_GET['id'];

	$query = mysqli_query($con, "DELETE FROM user WHERE id='$id' ");
	if($query){
		header("Location: userList.php");
	}
?>