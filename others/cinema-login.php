<?php

    $sname = $_POST['fname'];
    $last = $_POST['lname'];
    $pwd = $_POST['pwd'];
	 $phone = $_POST['pname'];
	 $date = $_POST['dname'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	
$connect = mysqli_connect("localhost","root","","yahoo-db");
if ($connect) {  #check if the database is successfully Connected
		$query = mysqli_query($connect, "INSERT INTO `menu-tb` (First_Name,Last_Name,New_User_Email,New_Password,Date_Of_Birth,Phone_No, Gender) VALUES ('$sname','$last','$email','$pwd','$date','$phone','$gender')");
		if ($query) {
			echo "You have successfully registered";
			// header('Location:dashboard.php');
		} else {
			echo mysqli_error($connect)." Not registered ";
		}
	} else {
		echo "Not Connected";
		
	}


?>