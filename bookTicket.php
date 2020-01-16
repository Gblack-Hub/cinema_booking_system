<?php session_start();
	require('mycon.php');

if(isset($_GET['id'])){
	$id = $_GET['id'];


	$query = mysqli_query($con, "SELECT title, picture, show_price FROM movies WHERE id='$id'");
	$result = mysqli_fetch_assoc($query);
	$title = $result['title'];
	$picture =  $result['picture'];
	$show_price =  $result['show_price'];
	$fullname = $_SESSION['fname']." ".$_SESSION['lname'];

	$unique_key = mt_rand(1000, 9999);
	$_SESSION['movie_id'] = $id;
	$_SESSION['user_id'];
	$_SESSION['unique_key'] = $unique_key;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Book Ticket</title>
	<?php
    	include 'links.php';
	?>
	<link rel="stylesheet" type="text/css" href="myStyle.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4"></div>
			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
				<div class="card" id="movieTicket">
					<div class="card-header">MOVIE TICKET</div>
					<div class="card-body">
						<form action="printTicket.php" method="POST">
							<p>User Name: <input id="userName" type="text" class="form-control" name="uname" value="<?php echo $fullname; ?>" disabled /></p>
							<p>Movie Title: <input type="text" class="form-control" name="movieTitle" value="<?php echo $title; ?>" disabled /></p>
							<div class="d-flex">
								<div class="mr-2">
									<p>Seat No: <input id="my" type="number" class="form-control" name="seatNo" placeholder="between 1-200" required /></p>
								</div>
								<div>
									<p>Price: <input type="number" name="price" value="<?php echo $show_price; ?>" class="form-control" disabled /></p>
								</div>
							</div>
							<div class="text-center mb-3">
								<div>Your Unique key</div>
								<img src="ass/bar.jpg" class="img-fluid w-75">
								<div class="text-center text-success">
									<input type="text" class="form-control text-success text-center font-weight-bold border-0" name="uniqueKey" value="<?php echo $unique_key; ?>">
								</div>
								<small>Do not share this key with anyone!</small>
							</div>
							<div class="text-center">
								<button class="btn btn-primary" name="print">Book Seat Now</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../bootstrap/js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
    <script src="dashboardScripts.js"></script>
	<!-- <script src="myScript.js"></script> -->
</body>
</html>
<?php
 }
?>