<!DOCTYPE html>
<html lang="en">
<head>
<title>ACU Times | Title</title>
<?php require_once("Header.php");?>
<script src="layout/js/Validate.js"></script>
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
	<form role="form" action="ChangePW.php" method="post">
		<!-- #################################################################### Old Password #################################################################### -->
		<div class="form-group">
			<label for="Password">Old password :</label>
			<input type="password" name="OldPassword" id="OldPassword" value="" class="form-control" required>
			<div id="Validate_Password" name = "Validate_OldPassword" class="MyAlret"></div>
		</div>
		<!-- #################################################################### Password #################################################################### -->
		<div class="form-group">
			<label for="Password">New password :</label>
			<input type="password" name="Password" id="Password" value="" class="form-control" onBlur="valPassword(this,Validate_Password)" required>
			<div id="Validate_Password" name = "Validate_Password" class="MyAlret"></div>
		</div>
		<!-- #################################################################### RePassword #################################################################### -->
		<div class="form-group">
			<label for="RePassword">Reenter password :</label>
			<input type="password" name="RePassword" id="RePassword" value="" class="form-control" onBlur="valRePassword(this,Validate_RePassword,Password)" required>
			<div id="Validate_RePassword" name = "Validate_RePassword" class="MyAlret"></div>
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