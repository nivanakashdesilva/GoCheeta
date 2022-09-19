<?php
require('connection.php');
require('functions.php');
include('errors.php');
	
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You have to log in first";
		header('location: login.php');
	}

	
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>



<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="asset/css/styles.css">
    <script src="asset/js/scripts.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <div id="mySidenav" class="sidenav">
        <p>Welcome <?php echo $_SESSION['username']; ?></p>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="logout">
            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
        </div>
        <a href="home.php">Home</a>
        <a href="add_admin.php">Admin</a>
        <a href="add_branch.php">Branch</a>
        <a href="add_driver.php">Driver</a>
        <a href="add_vehical.php">Vehical</a>
        <a href="add_vehical_category.php">Vehical Category</a>
       
    </div>

  

</body>

<!--end of header-->