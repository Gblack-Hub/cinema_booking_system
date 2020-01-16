<?php session_start();

	require('../mycon.php');

	if(isset($_SESSION['user_id'])){
		$_SESSION['user_id'];
		$_SESSION['fname'];
		$_SESSION['lname'];
		$_SESSION['email'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
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
    <nav class="bg-secondary p-3">
        <span class="cursor-pointer open-bar text-white px-2 py-1 bg-secondary" onclick="openNav()">
            <span><i class="fa fa-bars"></i></span>
        </span>
        <span class="dashboardClass text-white font-weight-bold" style="padding-left: 200px !important">All Admin</span>
    </nav>
	<main id="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<table class="table table-bordered table-responsive-sm table-hover table-striped">
						<thead>
							<tr>
								<th>SN</th>
								<th>FIRST NAME</th>
								<th>LAST NAME</th>
								<th>EMAIL</th>
								<th>GENDER</th>
								<th>PHONE NUMBER</th>
								<th>PICTURE</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$query = mysqli_query($con, "SELECT id, firstname, lastname, email, gender, phone_number, picture FROM user WHERE user_type_id = 1");
								$no = 0;
								while ($r = mysqli_fetch_array($query)) {
									$no++;
									echo "<tr>
										<td>".$no."</td>
										<td>".$r['firstname']."</td>
										<td>".$r['lastname']."</td>
										<td>".$r['email']."</td>
										<td>".$r['gender']."</td>
										<td>".$r['phone_number']."</td>
										<td><img class='img-fluid' width='50' src="."../".$r['picture']."></td>
									</tr>";
								}
							?>
						</tbody>
					</table>
				</div>
				<div class="col-sm-12 col-md-7 col-lg-7 col-xl-7">

				</div>
			</div>
		</div>
	</main>

	<?php
    	include 'scriptLinks.php';
	?>
</body>
</html>
<?php
} else {
	header("Location: login.php");
}
?>