<?php
error_reporting(0);
session_start();
if ($_COOKIE["auth"] != "admin_in") {
	header("location:" . "./");
}
include("includes/connect.php");
include("includes/data.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="@housamz">

	<meta name="description" content="Mass Admin Panel">
	<title>Imlancer Admin Panel</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-h21C2fcDk/eFsW9sC9h0dhokq5pDinLNklTKoxIZRUn3+hvmgQSffLLQ4G4l2eEr" crossorigin="anonymous">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="includes/style.css">
	<link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
	<!--[if lt IE 9]>
					<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
					<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
				<![endif]-->
</head>
<style>
	.list-unstyled a {
		color: #292929;
	}

	#sidebar ul li a:hover {
		color: #ff642e;
		background: #fff;
	}
</style>

<body>

	<div class="wrapper" style="background-color: #ffffff;">
		<!-- Sidebar Holder -->
		<nav id="sidebar" class="bg-primary" style="background-color: #f9f2dd;">
			<div class="sidebar-header" style="background-color: #292929;">
				<h3 style="color: white;font-family: Arial, Helvetica, sans-serif; font-style: oblique;

">
					Imlancer Admin Panel<br>
					<i id="sidebarCollapse" class="glyphicon glyphicon-chevron-left"></i>
				</h3>
				<strong>
					Imlancer<br>
					<i id="sidebarExtend" class="glyphicon glyphicon-chevron-right"></i>
				</strong>
			</div><!-- /sidebar-header -->

			<!-- start sidebar -->
			<ul class="list-unstyled components">
				<li>
					<a href="home.php" aria-expanded="false">
						<i class="glyphicon glyphicon-home"></i>
						Home
					</a>
				</li>
				<li><a href="bid.php"> Bid <span class="pull-right"><?= counting("bid", "id") ?></span></a></li>
				<li><a href="category.php"> Category <span class="pull-right"><?= counting("category", "id") ?></span></a></li>
				<li><a href="notification.php"> Notification <span class="pull-right"><?= counting("notification", "id") ?></span></a></li>
				<li><a href="password_resets.php"> Password resets <span class="pull-right"><?= counting("password_resets", "id") ?></span></a></li>
				<li><a href="payment.php"> Payment <span class="pull-right"><?= counting("payment", "id") ?></span></a></li>
				<li><a href="profile.php"> Profile <span class="pull-right"><?= counting("profile", "id") ?></span></a></li>
				<li><a href="project.php"> Project <span class="pull-right"><?= counting("project", "id") ?></span></a></li>
				<li><a href="skills.php"> Skills <span class="pull-right"><?= counting("skills", "id") ?></span></a></li>
				<li><a href="subcategory.php"> Subcategory <span class="pull-right"><?= counting("subcategory", "id") ?></span></a></li>
				<li><a href="users.php"> Admins <span class="pull-right"><?= counting("users", "id") ?></span></a></li>
				<li><a href="logout.php"> Logout</a></li>
			</ul>

		</nav><!-- /end sidebar -->

		<!-- Page Content Holder -->
		<div id="content">