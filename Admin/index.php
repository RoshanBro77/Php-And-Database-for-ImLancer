<?php
error_reporting(0);
session_start();
if ($_COOKIE['auth'] == "admin_in") {
	header("location:" . "home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="@housamz">

	<meta name="description" content="Mass Admin Panel">
	<title>Admin Panel</title>

	<!-- Latest compiled and minified CSS -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->

	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-h21C2fcDk/eFsW9sC9h0dhokq5pDinLNklTKoxIZRUn3+hvmgQSffLLQ4G4l2eEr" crossorigin="anonymous">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<style>
	.btn {
		display: inline-block;
		border-radius: 4px;
		align-self: center;
		background-color: #ff642e;
		border: none;
		color: white;
		text-align: center;
		font-size: 28px;
		padding: 10px;
		width: 200px;
		transition: all 0.5s;
		cursor: pointer;
		margin: 5px;
	}

	.btn span {
		cursor: pointer;
		align-self: auto;
		display: inline-block;
		position: relative;
		transition: 0.5s;
	}

	.btn span:after {
		content: '\00bb';
		position: absolute;
		opacity: 0;
		top: 0;
		right: -20px;
		transition: 0.5s;
	}

	.btn:hover span {
		padding-right: 25px;
	}

	.btn:hover span:after {

		opacity: 1;
		right: 0;
	}
</style>

<body style="background-color: #ffffff;">

	<div class="container" style="padding-bottom: 50px;background-color: #292929; margin: 150px; padding: 30px; margin-top: 40px;">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<h1 class="text-center" style="color: white;font-family: Arial, Helvetica, sans-serif; font-style: oblique;">Mage Admin Panel</h1>
				<br>
				<div>
					<form action="login.php" method="post" name="login">
						<input type="text" class="form-control" placeholder="Email" name="email" required autofocus style="box-shadow: #ffffff;border: 2px solid #ff642e;border-radius: 4px;"><br>
						<input type="password" class="form-control" placeholder="Password" name="password" required style="box-shadow: #ffffff;border: 2px solid #ff642e;border-radius: 4px;"><br>
						<button class="btn btn-lg btn-primary btn-block" type="submit"> Sign in </button>
					</form>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
				</div>
			</div>
		</div>
	</div>
</body>

</html>