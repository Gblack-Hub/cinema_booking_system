<?php
    #$fetch = mysqli_query($con,"SELECT acct_type_id, SUM(credit-debit) AS Balance FROM transactions_tb JOIN account_tb USING(acct_number) WHERE acct_number='$acct_no' ");
    #$r = mysqli_fetch_array($fetch);
    // session_start();

?>
<div id="mySidenav" class="sidenav bg-dark">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="text-center"><a href="#" class="navbar-brand text-white text-uppercase"><strong>E-Banking</strong></a></div>
    <hr width="80%" class="bg-light" />
    <div class="text-center">
        <img src="../images/img_avatar2.png" class="rounded-circle mb-2" style="height: 70px; width: 70px;" />
        <div class="text-white"><strong><?php echo $_SESSION['fname'] ." ".$_SESSION['fname']; ?></strong></div>
    </div>
    <div class="text-center text-white small">admin</div>
    <hr width="80%" class="bg-light" />
    <div><a href="./dashboard.php" class="nav-link"><span class="mr-2"><i class="fa fa-desktop"></i></span>Dashboard</a></div>
    <div><a href="./checkIn.php" class="nav-link"><span class="mr-2"><i class="fa fa-check"></i></span>Check In</a></div>
    <div><a href="./addMovie.php" class="nav-link"><span class="mr-2"><i class="fa fa-plus"></i></span>Add Movie</a></div>
    <div><a href="./moviesList.php" class="nav-link"><span class="mr-2"><i class="fa fa-video"></i></span>Movies</a></div>
    <div><a href="./bookings.php" class="nav-link"><span class="mr-2"><i class="fa fa-user"></i></span>Bookings</a></div>
    <div><a href="./usersList.php" class="nav-link"><span class="mr-2"><i class="fa fa-users"></i></span>Users</a></div>
    <div><a href="./adminList.php" class="nav-link"><span class="mr-2"><i class="fa fa-archive"></i></span>Admins</a></div>
    <div><a href="./logout.php" class="nav-link"><span class="mr-2"><i class="fa fa-power-off"></i></span>Logout</a></div>
</div>