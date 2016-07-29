<?php require_once 'autoload.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ACU Times | Title</title>
<?php require_once("Header.php");?>
<script src="js/Validate.js"></script>
</head>
<body>
<?php include ("Navbar.php");?>
<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
<div class="container">
<h3>
	<ul class="nav nav-pills">
		<li role="presentation"><a href="Profile.php">Profile</a></li>
		<li role="presentation"><a href="EditProfile.php">Change personal info</a></li>
		<li role="presentation" class="active"><a>Change Password</a></li>
	</ul>
</h3>
<br>
<?php if($Passed) 
echo '<div class="alert alert-info alert-dismissable"> <a class="panel-close close" data-dismiss="alert">×</a> <i class="fa fa-check"></i> Password updated succsesfuly </div>' ?>
<form role="form" action="ChangePW.php" method="post">
	<!-- #################################################################### Old Password #################################################################### -->
	<div class="form-group">
		<label for="OldPassword">Old password :</label>
		<input type="password" name="OldPassword" id="OldPassword" value="" class="form-control" required>
		<div id="Validate_Password" name = "Validate_OldPassword" class="MyAlret">
			<?php if(isset($iscorrect["OldPassword"])&&!$iscorrect["OldPassword"]) echo "Password is incorrect" ?>
		</div>
	</div>
	<!-- #################################################################### Password #################################################################### -->
	<div class="form-group">
		<label for="Password">New password :</label>
		<input type="password" name="Password" id="Password" value="" class="form-control" onBlur="valPassword(this,Validate_Password)" required>
		<div id="Validate_Password" name = "Validate_Password" class="MyAlret">
			<?php if(isset($iscorrect["Password"])&&!$iscorrect["Password"]) echo "Must contain a number (0-9) ,upercase letter (A-Z) & lowercase letter (a-z)" ?>
		</div>
	</div>
	<!-- #################################################################### RePassword #################################################################### -->
	<div class="form-group">
		<label for="RePassword">Reenter password :</label>
		<input type="password" name="RePassword" id="RePassword" value="" class="form-control" onBlur="valRePassword(this,Validate_RePassword,Password)" required>
		<div id="Validate_RePassword" name = "Validate_RePassword" class="MyAlret">
			<?php if(isset($iscorrect["RePassword"])&&!$iscorrect["RePassword"]) echo "Password does not match" ?>
		</div>
	</div>
	<!-- #################################################################### Submit #################################################################### -->
	<button type="submit" class="btn btn-primary pull-right">Change Password</button>
	</div>
	<!-- ####################################################################  #################################################################### -->
</form>
</div>
<?php include ("Footer.php");?>
</body>
</html>