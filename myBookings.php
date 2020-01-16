<?php session_start();
	$user_id = $_SESSION['user_id'];

    require("mycon.php");
    $query_get_bookings = mysqli_query($con,"SELECT bookings.booking_key, movies.title, movies.show_date, movies.show_price, booking_status.status FROM `bookings` JOIN movies ON bookings.movie_id = movies.id JOIN booking_status ON bookings.status_id = booking_status.id WHERE user_id = $user_id");

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
        <span class="dashboardClass text-white font-weight-bold" style="padding-left: 200px !important">My Bookings</span>
    </nav>
	<main id="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<table class="table table-bordered table-striped table-responsive-sm table-hover">
						<thead>
							<tr>
								<th>SN</th>
								<th>Movie Title</th>
								<th>Show Date</th>
								<th>Show Price</th>
								<th>Booking Key</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$num = 0;
								while($r = mysqli_fetch_array($query_get_bookings)){
									$num++;
									echo "
										<tr>
											<td>".$num."</td>
											<td>".$r['title']."</td>
											<td>".$r['show_date']."</td>
											<td>".$r['show_price']."</td>
											<td>".$r['booking_key']."</td>
											<td>".$r['status']."</td>
										</tr>
									";
								}
							?>
						</tbody>
					</table>
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