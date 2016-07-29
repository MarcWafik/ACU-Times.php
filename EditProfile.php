<?php require_once 'autoload.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Edit Profile</title>
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
					<li role="presentation" class="active"><a>Change personal info</a></li>
					<li role="presentation"><a href="ChangePW.php">Change Password</a></li>
				</ul>
			</h3>
			<br>
			<br>
			<br>
			<div class="row"> 
				<!-- left column -->
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="text-center"> <img src="<?php
						if (isset($user["Photo"]) && $user["Photo"] != "" && $user["Photo"] != " ")
							echo $user["Photo"];
						else
							echo "images/User.png";
						?>" style="height:200px; width:200px;" class="avatar img-circle" alt="avatar">
						<input type="file" class="text-center center-block well well-sm">
					</div>
				</div>
				<!-- edit form column -->
				<div class="col-md-8 col-sm-6 col-xs-12 personal-info">
					<?php
					if (@$Passed)
						echo '<div class="alert alert-info alert-dismissable"> <a class="panel-close close" data-dismiss="alert">×</a> <i class="fa fa-check"></i> Personal updated succsesfuly </div>'
						?>
					<h3>Personal info</h3>
					<form class="form-horizontal" role="form" action="EditProfile.php" method="post">
						<div class="form-group">
							<label for="name" class="col-md-3 control-label">Full name :</label>
							<div class="col-md-8 controls">
								<input type="text" name="name" id="name" value="<?php echo @$user["name"]; ?>" class="form-control" onBlur="valName(this)" required autocomplete="on" maxlength="32">
								<span class="help-block">
									<?php if (isset($iscorrect["name"]) && !$iscorrect["name"]) echo "Enter a Valid Name (Letters and space only)" ?>
								</span> </div>
						</div>
						<!-- ####################################################################  #################################################################### -->
						<div class="form-group">
							<label for="PhoneNo" class="col-md-3 control-label">Phone Number :</label>
							<div class="col-md-8 controls">
								<input type= "number" name="PhoneNo" id="PhoneNo" value="<?php echo @$user["PhoneNo"]; ?>" class="form-control" maxlength="13" onBlur="valPhoneNo(this)" autocomplete="on">
								<span class="help-block">
									<?php if (isset($iscorrect["PhoneNo"]) && !$iscorrect["PhoneNo"]) echo "Enter a correct Phone Number" ?>
								</span> </div>
						</div>
						<!-- ####################################################################  #################################################################### -->
						<div class="form-group">
							<label for="email" class="col-md-3 control-label">E-Mail :</label>
							<div class="col-md-8 controls">
								<input type="email" name="email" id="email" value="<?php echo @$user["email"]; ?>"  class="form-control" onBlur="valEmail(this)" required autocomplete="on" maxlength="256">
								<span class="help-block">
									<?php if (isset($iscorrect["email"]) && !$iscorrect["email"]) echo "Enter a Valid E-mail" ?>
								</span></div>
						</div>
						<!-- ####################################################################  #################################################################### -->

						<div class="form-group">
							<label class="col-md-3 control-label" for="Gender">Gender :</label>
							<div class="col-md-8 controls">
								<select class="selectpicker form-control" name="Gender" id="Gender" required>
									<option value="M"<?php if (@$user["Gender"] == "M") echo "selected"; ?>>Male</option>
									<option value="F"<?php if (@$user["Gender"] == "F") echo "selected"; ?>>Female</option>
									<option value="" <?php if (@$user["Gender"] != "M" || @$user["Gender"] != "F") echo "selected"; ?>>Leave Empty</option>
								</select>
								<span class="help-block"></span></div>
						</div>

						<!-- ####################################################################  #################################################################### -->
						<div class="form-group">
							<label class="col-md-3 control-label">Birthday:</label>
							<div class="col-md-8  controls" style="padding:0">
								<div class="col-xs-4">
									<select class="selectpicker form-control" name="BirthdayYear" id="BirthdayYear" required  onBlur="valBirthday(BirthdayMonth, BirthdayYear, BirthdayDay)" required>
										<?php
										$right_now = getdate();
										PrintHTML::numericOption($right_now['year'] - 16, 1900, @$user["BirthdayYear"])
										?>
									</select>
								</div>
								<div class="col-xs-4">
									<select class="selectpicker form-control" name="BirthdayMonth" id="BirthdayMonth" required onBlur="valBirthday(BirthdayMonth, BirthdayYear, BirthdayDay)" required>
										<?php PrintHTML::numericOptionMonth(@$user["BirthdayMonth"]); ?>
									</select>
								</div>
								<div class="col-xs-4">
									<select class="selectpicker form-control" name="BirthdayDay" id="BirthdayDay" required onBlur="valBirthday(BirthdayMonth, BirthdayYear, BirthdayDay)" required>
										<?php PrintHTML::numericOption(1, 31, @$user["BirthdayDay"]); ?>
									</select>
								</div>
								<span class="help-block">
									<?php if (isset($iscorrect["BirthDay"]) && !$iscorrect["BirthDay"]) echo "Enter a valid date" ?>
								</span> </div>
						</div>
						<!-- ####################################################################  #################################################################### -->

						<div class="form-group">
							<label class="col-md-3 control-label" for="About">About:</label>
							<div class="col-md-8 controls">
								<textarea class="form-control" rows="5" id="About" name="About" autocomplete="on" maxlength="256"><?php echo @$user["About"]; ?></textarea>
								<span class="help-block"></span> </div>
						</div>
						<!-- ####################################################################  #################################################################### -->
						<div class="form-group">
							<label class="col-md-3 control-label" for="Password">Current Password:</label>
							<div class="col-md-8 controls">
								<input type="password" name="Password" id="Password" value="" class="form-control" maxlength="32" required>
								<span class="help-block">
									<?php if (isset($iscorrect["Password"]) && !$iscorrect["Password"]) echo "Password is incorrect" ?>
								</span></div>
						</div>
						<!-- ####################################################################  #################################################################### -->
						<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-8">
								<input class="btn btn-primary" value="Save Changes" type="submit">
								<span></span>
								<input class="btn btn-default" value="Cancel" type="reset">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php include ("Footer.php"); ?>
	</body>
</html>