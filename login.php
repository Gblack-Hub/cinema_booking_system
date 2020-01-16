<?php session_start();
require('mycon.php');

$msg = '';
if(!empty($_POST['email']) AND !empty($_POST['pwd'])){
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];

	if($con){
		$query = mysqli_query($con, "SELECT id, firstname, lastname, email FROM user
										WHERE email='$email' AND password='$pwd' AND user_type_id = 2");
		$result = mysqli_num_rows($query);
		if($result == 1){
			$r = mysqli_fetch_array($query);
			$_SESSION['user_id'] = $r['id'];
			$_SESSION['fname'] = $r['firstname'];
			$_SESSION['lname'] = $r['lastname'];
			$_SESSION['email'] = $r['email']; #used for #query2

			header("Location: dashboard.php");
		} else {
			$msg = "<div class='alert alert-warning'>Incorrect Login Details, please enter the correct details".mysqli_error($con)."</div>";
		}
	} else {
		echo "not connected";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
    	include 'links.php';
	?>
    <style type="text/css">
    	body {
    		background: url("images/bg1.jpg");
			color: #fff;
			margin-top: 22vh;
    	}
    </style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4"></div>
			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
				<div id="login_div">
					<form action="login.php" method="POST">
						<h1 class="text-center p-2 text-success">USER LOGIN</h1>
						<div class="form-group">
							<input type="email" name="email" class="form-control mb-4" placeholder="Email" required />
						</div>
						<div class="form-group">
							<input type="password" name="pwd" id="pwd" class="form-control" placeholder="Password" required />
							<input type="checkbox" class="shwPwd" name="" /> Show Password
						</div>
						<?php echo $msg; ?>
						<div class="form-group text-center mb-2">
							<input type="submit" value="Login" name="" class="btn btn-primary btn-block" />
						</div>
						<div class="text-center"><a class="btn btn-sm" href="admin/login.php">Login as an admin</a></div>
					</form>
					<center>
						<a href="signup.php" style="float:left;">Sign Up</a>
						<a style="float:right;" href="#">Forgot Password?</a>
					</center>
				</div>
			</div>
			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4"></div>
		</div>
	</div>
	<script type="text/javascript" src="../bootstrap/js/jquery-3.2.1.js"></script>
	<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
	<script type="text/javascript" src="../bootstrap/js/popper.js"></script>

	<!-- <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> -->
</body>
</html>
