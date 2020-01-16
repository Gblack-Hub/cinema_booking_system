<?php session_start();

require('../mycon.php');

if(isset($_POST['submit'])){
	$title = $_POST['title'];
	$language = $_POST['language'];
	$rating = $_POST['rating'];
	$genre = $_POST['genre'];
	$show_date = $_POST['show_date'];
	$show_time = $_POST['show_time'];

	$filePath = "uploads/".$_FILES['pix']['name'];
	$fileType = $_FILES['pix']['type'];
	$fileSize = $_FILES['pix']['size'];
	$temp = $_FILES['pix']['tmp_name'];

	$msg = '';

	if(!empty($title) AND !empty($show_date)){
		if($con){
			$query = mysqli_query($con, "INSERT INTO movies (title, language, rating, genre, show_date, show_time, picture)
											VALUES ('$title', '$language', '$rating', '$genre', '$show_date', '$show_time', '$filePath')");
			if($query && move_uploaded_file($temp, $filePath)){
                    $msg = '<div class="alert alert-success">Movie Added Successfully</div>';
			} else {
				$msg = '<div class="alert alert-danger">An error occured, movie not added</div>';
			}
		} else {
			echo "ERROR: ".mysqli_error($con);
			// include "login.php";
		}
	} else {
		$msg = '<div class="alert alert-warning">Please fill out all the details</div>';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Movie</title>
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
        <span class="dashboardClass text-white font-weight-bold" style="padding-left: 200px !important">Add Movies</span>
    </nav>
	<main id="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<form action="addMovie.php" method="POST" enctype="multipart/form-data">
						<!-- <h1 class="text-center p-2">ADD MOVIE</h1> -->
						<div class="form-group">
							<input type="text" name="title" class="form-control mb-4" placeholder="Title" value="Sam and Cat" />
						</div>
						<div class="form-group">
							<select name="language" class="form-control">
								<option value="english">English</option>
								<option value="hindi">Hindi</option>
								<option value="spanish">Spanish</option>
								<option value="french">French</option>
							</select>
						</div>
						<div class="form-group">
							<select name="rating" class="form-control">
								<option value="TBC">TBC</option>
								<option value="PG">PG</option>
								<option value="U16">U16</option>
							</select>
						</div>
						<div class="form-group">
							<select name="genre" class="form-control">
								<option value="action">Action</option>
								<option value="love">Love</option>
								<option value="fiction">Fiction</option>
							</select>
						</div>
						<div class="form-group">
							<label>Show Date</label>
							<input type="date" name="show_date" class="form-control" placeholder="Show Date" />
						</div>
						<div class="form-group">
							<label>Show Time</label>
							<input type="text" name="show_time" class="form-control" placeholder="Show Time" value="1:00pm" />
						</div>
						<div class="form-group">
							<label>Movie Display Picture</label>
							<input type="file" name="pix" class="form-control" placeholder="Picture" />
						</div>
						<div class="form-group text-center mb-0">
							<input type="submit" value="Submit" name="submit" class="btn btn-primary btn-block" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>

	<?php
		require "scriptLinks.php";
	?>
</body>
</html>