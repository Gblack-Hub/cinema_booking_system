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
        <span class="dashboardClass text-white font-weight-bold" style="padding-left: 200px !important">Check User In</span>
    </nav>
	<main id="main">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="search-box"><i class="fa fa-key"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Enter booking key" aria-label="Booking Key" aria-describedby="search-box">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<table class="table table-bordered table-responsive-sm table-hover table-striped">
						<thead>
							<tr>
								<th>SN</th>
								<th>BOOKING KEY</th>
								<th>NAME</th>
								<th>GENDER</th>
								<th>PHONE NUMBER</th>
								<th>PICTURE</th>
								<th>STATUS</th>
								<th colspan="2">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$query = mysqli_query($con, "SELECT bookings.id, bookings.booking_key, user.firstname, user.lastname, user.gender, user.phone_number, user.picture, booking_status.status FROM bookings JOIN user ON bookings.user_id = user.id JOIN movies ON bookings.movie_id = movies.id JOIN booking_status ON bookings.status_id = booking_status.id");
								$no = 0;
								while ($r = mysqli_fetch_array($query)) {
									$no++;
									echo "<tr>
										<td>".$no."</td>
										<td>".$r['booking_key']."</td>
										<td>".$r['firstname']." ".$r['lastname']."</td>
										<td>".$r['gender']."</td>
										<td>".$r['phone_number']."</td>
										<td><img class='img-fluid' width='50' src="."../".$r['picture']."></td>
										<td>".$r['status']."</td>
										<td>
											<a href='deleteUser.php?id=".$r['id']."'>
												<button class='btn btn-danger rounded-circle'><i class='fa fa-trash'></i></button>
											</a>
										</td>
										<td>
											<button class='btn btn-primary rounded' onclick='checkUserIn(".$r['id'].")'>
												<span><i class='fa fa-edit'></i></span>
											</button>
										</td>
									</tr>";
								}
							?>
						</tbody>
					</table>
				</div>
				<div class="col-sm-12 col-md-7 col-lg-7 col-xl-7">
						<button class="btn btn-primary rounded-circle" onclick="checkUserIn(e)"><span><i class="fa fa-edit"></i></span></button>
				</div>
			</div>
		</div>
	</main>

	<?php
    	include 'scriptLinks.php';
	?>
	<script>
		console.log('here')
		function checkUserIn(e){
			console.log(e)
		}
		$(document).ready(function(){
			function checkUserIn(e){
				alert(e);
			}
		})
	</script>
</body>
</html>
<?php
} else {
	header("Location: login.php");
}
?>