<?php
require_once 'autoload.php';
UserController::Update();
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Edit Profile</title>
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
					<li role="presentation" class="active"><a>Change personal info</a></li>
					<li role="presentation"><a href="edit_profile_pw.php">Change Password</a></li>
				</ul>
			</h3>
			<br>
			<br>
			<br>
			<form class="form-horizontal" role="form" action="edit_profile.php" method="post" onSubmit="return isAllValid()">
				<!-- left column -->
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="text-center"> <img src="<?php echo "images/User.png"; ?>" class="img-200x200 img-circle" alt="avatar">
						<div style="padding:5px"></div>
						<input type="file" class="text-center center-block well well-sm btn-file">
					</div>
				</div>
				<!-- edit form column -->
				<div class="col-md-8 col-sm-6 col-xs-12 personal-info">
					<?php
					if (@$Passed)
						echo '<div class="alert alert-info alert-dismissable"> <a class="panel-close close" data-dismiss="alert">×</a> <i class="fa fa-check"></i> Personal updated succsesfuly </div>'
						?>
					<h3>Personal info</h3>

					<!-- #################################################################### full name #################################################################### -->	
					<div class="form-group">
						<label class="col-md-3 control-label" for="fullName">Full name :</label>
						<div class="controls col-md-8 ">
							<input type="text" 
								   name="fullName" 
								   id="fullName" 
								   value="<?php echo $User->getfullName(); ?>" 
								   class="form-control" 
								   onBlur="valName(this)" 
								   required 
								   autocomplete="on"
								   maxlength="32">
							<span class="help-block"><ul>
									<?php PrintHTML::validation("fullName", @$iscorrect["fullName"], "Enter a Valid Name (Letters and space only)") ?>
								</ul></span>
						</div>
					</div>
					<!-- #################################################################### PhoneNo #################################################################### -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="phoneNumber">Phone Number :</label>
						<div class="col-md-8 controls">
							<input type="text" 
								   name="phoneNumber" 
								   id="phoneNumber" 
								   value="<?php echo $User->getPhoneNumber(); ?>" 
								   class="form-control" 
								   maxlength="13" 
								   onBlur="valPhoneNo(this)" 
								   autocomplete="on">
							<span class="help-block"><ul>
									<?php PrintHTML::validation("phoneNumber", @$iscorrect["phoneNumber"], "Enter a correct Phone Number") ?>
								</ul></span>
						</div>
					</div>
					<!-- #################################################################### email #################################################################### -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="email">E-Mail :</label>
						<div class="col-md-8 controls">
							<input type="email" 
								   name="email" 
								   id="email" 
								   value="<?php echo $User->getEmail(); ?>" 
								   class="form-control" 
								   onBlur="valEmail(this)" 
								   required autocomplete="on" 
								   maxlength="256">
							<span class="help-block"><ul>
									<?php PrintHTML::validation("email", @$iscorrect["email"], "Enter a Valid E-mail") ?>
								</ul></span>
						</div>
					</div>
					<!-- #################################################################### Gender #################################################################### -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="gender">Gender :</label>
						<div class="col-md-8 controls">
							<select class="selectpicker form-control" 
									name="gender" 
									id="gender" 
									required>
										<?php PrintHTML::OptionGender($User->getGender()) ?>
							</select>
							<span class="help-block"></span></div>
					</div>

					<!-- #################################################################### Birthday #################################################################### -->

					<div class="form-group">
						<label class="col-md-3 control-label" for="BirthdayYear">Birthday :</label>
						<div class="col-md-8  controls" style="padding:0">
							<div class="col-xs-4">
								<select class="selectpicker form-control" 
										name="BirthdayYear" 
										id="BirthdayYear" 
										required  
										onBlur="valBirthday(BirthdayMonth, BirthdayYear, BirthdayDay)">
											<?php
											$right_now = getdate();
											PrintHTML::numericOption($right_now['year'] - 16, 1900, $User->getBirthYear());
											?>
								</select>
							</div>
							<div class="col-xs-4">
								<select class="selectpicker form-control" name="BirthdayMonth" id="BirthdayMonth" required onBlur="valBirthday(BirthdayMonth, BirthdayYear, BirthdayDay)">
									<?php PrintHTML::numericOptionMonth($User->getBirthMonth()); ?>
								</select>
							</div>
							<div class="col-xs-4">
								<select class="selectpicker form-control" 
										name="BirthdayDay" 
										id="BirthdayDay" 
										required 
										onBlur="valBirthday(BirthdayMonth, BirthdayYear, BirthdayDay)">
											<?php PrintHTML::numericOption(1, 31, $User->getBirthDay()) ?>
								</select>
							</div>
							<span class="help-block"><ul>
									<?php PrintHTML::validation("birthDate", @$iscorrect["birthDate"], "Enter a valid date") ?>
								</ul></span>
						</div>
					</div>

					<!-- ####################################################################  #################################################################### -->

					<div class="form-group">
						<label class="col-md-3 control-label" for="about">About:</label>
						<div class="col-md-8 controls">
							<textarea 
								class="form-control" 
								rows="5" 
								id="about" 
								name="about" 
								maxlength="256"><?php echo $User->getAbout(); ?></textarea>
							<span class="help-block"></span> </div>
					</div>
					<!-- ####################################################################  #################################################################### -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="OldPassword">Old password :</label>
						<div class="col-md-8 controls">
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
					<!-- ####################################################################  #################################################################### -->
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-8">
							<input class="btn btn-primary" value="Save Changes" type="submit" name="submit" id="submit">
							<span></span>
							<input class="btn btn-default" value="Cancel" type="reset">
						</div>
					</div>
				</div>
			</form>
		</div>
		<?php include ("footer.php"); ?>
	</body>
</html>