<?php 
require_once ("ControlUsers.php");
require_once ("ControlSession.php");
?>
<?php
session_start_once();
if(isset($_SESSION['user'])){
	header("Location: MangeUsers.php");
	exit;
}

$FirstOpen = false;
if(isset($_POST["ID"])&&isset($_POST["Password"])){
	$user = Login($_POST["ID"] ,$_POST["Password"] );
	if(isset($user)){
		session_start_once();
		$_SESSION["user"] = $user;
		header("Location: MangeUsers.php");
		exit;
	}
	else
		$FirstOpen=true;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ACU Times | Login</title>
<?php require_once("Header.php");?>
</head>
<body>
<?php include ("Navbar.php");?>
<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
<div class="container">
	<h3>
		<ul class="nav nav-pills">
			<li role="presentation" class="active"><a>Login</a></li>
			<li role="presentation"><a href="SignUp.php">Sign up</a></li>
		</ul>
	</h3>
	<br>
	<form role="form" action="LogIn.php" method="post">
		<div class="form-group">
			<label for="ID">ID:</label>
			<input type="text" name="ID" id="ID" class="form-control" placeholder="Enter university ID" required>
		</div>
		<div class="form-group">
			<label for="Password">Password:</label>
			<input type="password" name="Password" id="Password" class="form-control" id="pwd" placeholder="Enter password" required>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox">
				Remember me</label>
		</div>
		<button type="submit" class="btn btn-primary pull-right">Login</button>
	</form>
</div>
<div class="clearfix" style="padding:150px"></div>
<?php include ("Footer.php");?>
</body>
</html>