<?php session_start();

require('mycon.php');

if(isset($_POST['print'])){
	$movie_id = $_SESSION['movie_id'];
	$user_id = $_SESSION['user_id'];
	$unique_key = $_SESSION['unique_key'];
	$seat_no = $_POST['seatNo'];

 if($con){
    $query = mysqli_query($con, "INSERT INTO bookings (booking_key,seat_no,user_id,movie_id,status_id)
    								VALUES ('$unique_key','$seat_no','$user_id','$movie_id','1')");
    if($query){
        header("Location: dashboard.php");
    } else {
        echo "Error uploading files, please contact our customer care".mysqli_error($con);
    }
    } else {
        die("connection failed:".mysqli_error($con));
    }
}

?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Print Ticket</title>
</head>
<body>

</body>
</html> -->