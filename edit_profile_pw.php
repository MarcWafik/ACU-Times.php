<?php
require_once 'autoload.php';
UserController::UpdatePW();
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Change PW</title>
		<?php require_once("header.php"); ?>
		<script src="js/Validate.js"></script>
	</head>
	<body>
		<?php include ("navbar.php"); ?>
		<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
		<div class="container">
			<h3>
				<ul class="nav nav-pills">
					<li role="presentation"><a href="profile.php">Profile</a></li>
					<li role="presentation"><a href="edit_profile.php">Change personal info</a></li>
					<li role="presentation" class="active"><a>Change Password</a></li>
				</ul>
			</h3>
			<br><br><br>
			<?php
			if (@$Passed)
				echo '<div class="alert alert-info alert-dismissable"> <a class="panel-close close" data-dismiss="alert">×</a> <i class="fa fa-check"></i> Password updated succsesfuly </div>'
				?>
			<form role="form" action="edit_profile_pw.php" method="post" onSubmit="return isAllValid()">
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
								<?php PrintHTML::validation("OldPassword", @$iscorrect["OldPassword"], "password Don't Match") ?>
							</ul></span>
					</div>
				</div>

				<!-- #################################################################### Password #################################################################### -->
				<div class="form-group">
					<label class="control-label" for="password">New password :</label>
					<div class="controls">
						<input type="password" 
							   name="password" 
							   id="password" 
							   value="" 
							   class="form-control" 
							   onBlur="valPassword(this)" 
							   maxlength="32" 
							   required>
						<span class="help-block"><ul>
								<?php PrintHTML::validation("password", @$iscorrect["password"], "Must contain a number (0-9) ,upercase letter (A-Z) & lowercase letter (a-z)") ?>
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
								<?php PrintHTML::validation("RePassword", @$iscorrect["RePassword"], "password does not match") ?>
							</ul></span>
					</div>
				</div>

				<!-- #################################################################### Submit #################################################################### -->
				<button type="submit" class="btn btn-primary pull-right">Change Password</button>
		</div>
		<!-- ####################################################################  #################################################################### -->
	</form>
</div>
<?php include ("footer.php"); ?>
</body>
</html>