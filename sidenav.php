<?php
    #$fetch = mysqli_query($con,"SELECT acct_type_id, SUM(credit-debit) AS Balance FROM transactions_tb JOIN account_tb USING(acct_number) WHERE acct_number='$acct_no' ");
    #$r = mysqli_fetch_array($fetch);
    // session_start();

?>
<div id="mySidenav" class="sidenav bg-primary">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="text-center"><a href="./dashboard1.php" class="navbar-brand text-white text-uppercase"><strong>E-BOOKING</strong></a></div>
    <hr width="80%" class="bg-light" />
    <div class="text-center">
        <img src="./images/img_avatar1.png" class="rounded-circle mb-2" style="height: 70px; width: 70px;" />
        <div class="text-white"><strong><?php echo $_SESSION['fname'] ." ".$_SESSION['fname']; ?></strong></div>
    </div>
    <hr width="80%" class="bg-light" />
    <div><a href="./dashboard.php" class="nav-link"><span class="mr-2"><i class="fa fa-desktop"></i></span>Dashboard</a></div>
    <div><a href="./movies.php" class="nav-link"><span class="mr-2"><i class="fa fa-video"></i></span>Movies</a></div>
    <div><a href="./myBookings.php" class="nav-link"><span class="mr-2"><i class="fa fa-user"></i></span>My Bookings</a></div>
    <div><a href="./profile.php" class="nav-link"><span class="mr-2"><i class="fa fa-archive"></i></span>Profile</a></div>
    <div><a href="./logout.php" class="nav-link"><span class="mr-2"><i class="fa fa-power-off"></i></span>Logout</a></div>
</div>