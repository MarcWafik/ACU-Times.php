<?php 
require_once ("ControlUsers.php");
require_once ("Session.php");
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

//=========================================All=========================================
?>
<!DOCTYPE html>

<html>
<head>
<title>ACU Times | Log in</title>
<meta charset="iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="layout/styles/mediaqueries.css" type="text/css" media="all">
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery-mobilemenu.min.js"></script>
<style>
.MyAlret { color: red; padding-top: 5px; }
.MyLable { }
.MyInput { width: 320px; }
.MyContainer { padding: 10px; }
</style>
</head>
<body>
<?php include ("Header.php");?>
<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
<div class="wrapper row3">
	<div class="clear"><br>
		<br>
		<br>
	</div>
	<h6 class="center">Login</h6>
	<div class="clear"><br>
		<br>
		<br>
	</div>
	<div style="margin: 0 auto; width: 340px;text-align:left;">
		<form action="LogIn.php" method="post">
			<div class="MyContainer">
				<label for="ID">University ID :</label>
				<br>
				<input type="text" name="ID" id="ID" value="" class="MyInput" onBlur="valID()" required>
				<small>
				<div id="Validate_ID" name = "Validate_ID" class="MyAlret"></div>
				</small> </div>
			<div class="MyContainer">
				<label for="Password">Password :</label>
				<br>
				<input type="password" name="Password" id="Password" value="" class="MyInput" onBlur="valPassword()" required>
				<small>
				<div id="Validate_Password" name = "Validate_Password" class="MyAlret">
					<?php if($FirstOpen) echo" ID or Password is incorrect "; ?>
				</div>
				</small> </div>
			<div class="MyContainer" style="text-align:right">
				<input class="Mysubmit" style="border-radius:5px;" name="submit" type="submit" id="submit" value="Login">
			</div>
		</form>
	</div>
	<div class="clear"><br>
		<br>
		<br>
	</div>
</div>
<?php include ("Footer.html");?>
</body>
</html>