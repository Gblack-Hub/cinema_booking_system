<?php session_start();
	$user_id = $_SESSION['user_id'];

    require("mycon.php");
    $query_get_profile = mysqli_query($con, "SELECT * FROM user where id = $user_id");
    // $query_get_account = mysqli_query($con,"SELECT acct_number, acct_type FROM account_tb JOIN account_type_tb USING(acct_type_id) WHERE user_id=$user_id");

    $r = mysqli_fetch_assoc($query_get_profile);
if(isset($_POST['update'])){
	$fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $pnumber = $_POST['pnumber'];
    $gender = $_POST['gender'];

    $file = "uploads/".$_FILES['pix']['name'];
    $fileType = $_FILES['pix']['type'];
    $fileSize = $_FILES['pix']['size'];
    $temp = $_FILES['pix']['tmp_name'];
    // $passport = $_POST['passport'];

    if($con){
        if($fileSize <= 500000){
                $query_update = mysqli_query($con, "UPDATE user SET firstname = '$fname', lastname = '$lname', email = '$email', phone_number = '$pnumber', gender = '$gender', picture = '$file' WHERE id = $user_id");
                move_uploaded_file($temp, $file);
                if($query_update){
                	echo "Profile update successful";
                } else {
                	echo "Update failed, kindly contact our customer care".mysqli_error($con);
                }
        } else {
            echo "Sorry, your passport is too large";
        }
    } else {
        die("connection failed:".mysqli_error($con));
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Profile Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="dashboardStyles.css">
   <?php
		include 'links.php';
	?>
</head>
<body>
   <div>
        <?php
            include "sidenav.php";
        ?>
    </div>
    <nav class="bg-primary p-3">
        <span class="cursor-pointer open-bar text-white px-2 py-1 bg-primary" onclick="openNav()">
            <span><i class="fa fa-bars"></i></span>
        </span>
        <span class="dashboardClass text-white font-weight-bold" style="padding-left: 200px !important">My Profile</span>
    </nav>
	<main id="main">
		<div class="container-fluid">
			<div class="row">
				<!-- <div class="col-md-3"></div> -->
				<div class="col-md-6">
					<!-- <div><?php #if(isset($msg)){ echo $msg; } ?></div> -->
					<form class="form" action="profile.php" method="POST" enctype="multipart/form-data">
						<h5 class="text-center">PERSONAL INFORMATION</h5>
						<label class="mr-sm-2 font-weight-bold">Firstname</label>
						<input type="text" name="fname" class="form-control" value="<?php echo $r['firstname']; ?>" placeholder="Firstname" />
						<label class="mr-sm-2 font-weight-bold">Lastname</label>
						<input type="text" name="lname" class="form-control" value="<?php echo $r['lastname']; ?>" placeholder="Lastname" />
						<label class="mr-sm-2 font-weight-bold">Date of Birth</label>
						<input type="date" name="dob" class="form-control" value="<?php echo $r['date_of_birth']; ?>" placeholder="Date" />
						<label class="mr-sm-2 font-weight-bold">Gender</label> <br />
						<!-- <input type="radio" name="gender" value="male" /> Male
						<input type="radio" name="gender" value="female" /> Female <br /> -->
						<select name="gender" class="form-control">
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>

						<h5 class="text-center">CONTACT INFORMATION</h5>
						<label class="mr-sm-2 font-weight-bold">Phone Number</label>
						<input type="text" name="pnumber" class="form-control" value="<?php echo $r['phone_number']; ?>" placeholder="Phone Number" />
						<label class="mr-sm-2 font-weight-bold">Email</label>
						<input type="email" name="email" class="form-control" value="<?php echo $r['email']; ?>" placeholder="E-mail" /> <br />

						<h5 class="text-center">OTHERS</h5>
						<label class="mr-sm-2 font-weight-bold">Choose Passport</label>
						<input class="form-control" type="file" name="pix" /><br />
						<input type="submit" value="Update Profile" name="update" class="btn btn-primary btn-block">
					</form>
				</div>
				<div class="col-md-6">
					This is my profile section
				</div>
			</div>
		</div>
	</main>
	<footer></footer>

	<script type="text/javascript" src="../bootstrap/js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="dashboardScripts.js"></script>
</body>
</html>