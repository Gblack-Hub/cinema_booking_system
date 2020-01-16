<?php session_start();
require('mycon.php');

$email = $_POST['email'];
$pwd = $_POST['pwd'];

if(!empty($email) AND !empty($pwd)){
	if($con){
		$query = mysqli_query($con, "SELECT id, firstname, lastname, email FROM user
										WHERE email='$email' AND password='$pwd'");
		$result = mysqli_num_rows($query);
		if($result > 0){
			$r = mysqli_fetch_array($query);
			$_SESSION['user_id'] = $r['id'];
			$_SESSION['fname'] = $r['firstname'];
			$_SESSION['lname'] = $r['lastname'];
			$_SESSION['email'] = $r['email']; #used for #query2

			// $_SESSION['user_id'] = $user_id;
			// $_SESSION['fname'] = $fname;
			// $_SESSION['lname'] = $lname;
			// $_SESSION['email'] = $email2;
			header("Location: dashboard.php");
		} else {
			echo "ERROR: Incorrect Login Details, please enter the correct details".mysqli_error($con);
			include "login.php";
		}
	} else {
		echo "not connected";
	}
}
?>
