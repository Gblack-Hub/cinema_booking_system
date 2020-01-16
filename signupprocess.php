<?php
    include('mycon.php');
    include 'links.php';
    // $data = json_decode(file_get_contents('php://input'), true);
    // $resp = array();

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    #$dob = $_POST['dob'];
    $pnumber = $_POST['pnumber'];
    $gender = $_POST['gender'];

    $filePath = "uploads/".$_FILES['pix']['name'];
    $fileType = $_FILES['pix']['type'];
    $fileSize = $_FILES['pix']['size'];
    $temp = $_FILES['pix']['tmp_name'];
    // $passport = $_POST['passport'];

    if($con){
        if($fileSize <= 500000){
            // if($fileType == "jpg" || "png" || "jpeg"){
            //     echo "Sorry, only JPG, JPEG and PNG passport photographs are allowed";
            // } else {
                $query = mysqli_query($con, "INSERT INTO user
                                (firstname,lastname,email,password,gender,user_type_id,phone_number,picture)
                                VALUES ('$fname','$lname','$email','$password','$gender','2','$pnumber','$filePath')");
                if($query && move_uploaded_file($temp, $filePath)){
                    echo "<div class='alert alert-success'>You have successfully signed up, proceed to login <a href='./login.php'>here</a><div>";
                    // header("Location: login.php");
                } else {
                    echo "Error uploading files, please contact our customer care";
                    echo mysqli_error($con);
                }
            // }
        } else {
            echo "Sorry, your passport is too large";
        }
    } else {
        die("connection failed:".mysqli_error($con));
    }
    // echo json_encode($resp);
?>