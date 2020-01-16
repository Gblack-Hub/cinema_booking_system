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
        <span class="dashboardClass text-white font-weight-bold" style="padding-left: 200px !important">Dashboard</span>
    </nav>
	<main id="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<table class="table table-bordered table-responsive-sm table-hover table-striped">
						<thead>
							<tr>
								<th>TITLE</th>
								<th>LANGUAGE</th>
								<th>RATING</th>
								<th>GENRE</th>
								<th>RELEASE DATE</th>
								<th>SHOW DATE</th>
								<th>SHOW TIME</th>
								<th>IMAGE</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$query = mysqli_query($con, "SELECT * FROM movies");
								$no = 0;
								while ($r = mysqli_fetch_array($query)) {
									$no++;
									echo "<tr>
										<td>".$r['title']."</td>
										<td>".$r['language']."</td>
										<td>".$r['rating']."</td>
										<td>".$r['genre']."</td>
										<td>".$r['release_date']."</td>
										<td>".$r['show_date']."</td>
										<td>".$r['show_time']."</td>
										<td><img class='img-fluid' width='50' alt='movie_img' src=../".$r['picture']."></td>
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
		require "scriptLinks.php";
	?>
</body>
</html>
<?php
} else {
	header("Location: login.php");
}
?>