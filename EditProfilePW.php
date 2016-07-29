<?php
require_once 'autoload.php';
$User = new User();
$User->__init();
$User->read(User::getSessionUserID());
if (valAllNotnull()) {
	$User->setLastUpdateDate();
	$iscorrect = array(
		"OldPassword" => (bool) $User->isCorrectPassword($_POST["OldPassword"]),
		"RePassword" => (bool) $_POST["Password"] === $_POST["RePassword"],
		"Password" => (bool) $User->setPassword($_POST["Password"]),
	);
	if (Validation::valAll($iscorrect) && $User->update()) {
		$Passed = true;
	}
}

//=========================================validate=========================================
function valAllNotnull() {
	return
			isset($_POST["submit"]) &&
			isset($_POST["Password"]) &&
			isset($_POST["RePassword"]) &&
			isset($_POST["OldPassword"]);
}
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Title</title>
		<?php require_once("Header.php"); ?>
		<script src="js/Validate.js"></script>
	</head>
	<body>
		<?php include ("Navbar.php"); ?>
		<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
		<div class="container">
			<h3>
				<ul class="nav nav-pills">
					<li role="presentation"><a href="Profile.php">Profile</a></li>
					<li role="presentation"><a href="EditProfile.php">Change personal info</a></li>
					<li role="presentation" class="active"><a>Change Password</a></li>
				</ul>
			</h3>
			<br><br><br>
			<?php
			if (@$Passed)
				echo '<div class="alert alert-info alert-dismissable"> <a class="panel-close close" data-dismiss="alert">×</a> <i class="fa fa-check"></i> Password updated succsesfuly </div>'
				?>
			<form role="form" action="EditProfilePW.php" method="post" onSubmit="return isAllValid()">
				<!-- #################################################################### Old Password #################################################################### -->	
				<div class="form-group">
					<label class="control-label" for="OldPassword">Old password :</label>
					<div class="controls">
						<input type="password" 
							   name="OldPassword" 
							   id="OldPassword" 
							   value="" 
							   class="form-control" 
							   maxlength="32" 
							   required>
						<span class="help-block"><ul>
								<?php PrintHTML::validation("OldPassword", @$iscorrect["OldPassword"], "Password Don't Match") ?>
							</ul></span>
					</div>
				</div>

				<!-- #################################################################### Password #################################################################### -->
				<div class="form-group">
					<label class="control-label" for="Password">New password :</label>
					<div class="controls">
						<input type="password" 
							   name="Password" 
							   id="Password" 
							   value="" 
							   class="form-control" 
							   onBlur="valPassword(this)" 
							   maxlength="32" 
							   required>
						<span class="help-block"><ul>
								<?php PrintHTML::validation("Password", @$iscorrect["Password"], "Must contain a number (0-9) ,upercase letter (A-Z) & lowercase letter (a-z)") ?>
							</ul></span>
					</div>
				</div>

				<!-- #################################################################### RePassword #################################################################### -->
				<div class="form-group">
					<label class="control-label" for="RePassword">Reenter password :</label>
					<div class="controls">
						<input type="password" 
							   name="RePassword" 
							   id="RePassword" 
							   value="" 
							   class="form-control" 
							   onBlur="valRePassword(this, Password)" 
							   maxlength="32" 
							   required>
						<span class="help-block"><ul>
								<?php PrintHTML::validation("RePassword", @$iscorrect["RePassword"], "Password does not match") ?>
							</ul></span>
					</div>
				</div>

				<!-- #################################################################### Submit #################################################################### -->
				<button type="submit" class="btn btn-primary pull-right">Change Password</button>
		</div>
		<!-- ####################################################################  #################################################################### -->
	</form>
</div>
<?php include ("Footer.php"); ?>
</body>
</html>