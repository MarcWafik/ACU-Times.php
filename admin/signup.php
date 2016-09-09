<?php
require_once 'autoload.php';
UserController::Create();
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Title</title>
		<?php require_once("header.php"); ?>
		<script src="js/Validate.js"></script>
	</head>
	<body>
		<?php include ("navbar.php"); ?>
		<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
		<div class="container">
			<h3>
				<ul class="nav nav-pills">
					<li role="presentation"><a href="login.php">Login</a></li>
					<li role="presentation" class="active"><a>Sign up</a></li>
				</ul>
			</h3>
			<br>
			<form  role="form" action="signup.php" method="post" onSubmit="return isAllValid()">
				<div class="form-group">
					<label  class="control-label" for="fullName">Full name :</label>
					<div class="controls">
						<input type="text" 
							   name="fullName" 
							   id="fullName" 
							   value="<?php echo @$_POST["fullName"]; ?>" 
							   class="form-control" 
							   onBlur="valName(this)" 
							   required 
							   autocomplete="on"
							   maxlength="32">
						<span class="help-block"><ul>
							</ul></span>
					</div>
				</div>
				<!-- #################################################################### ID #################################################################### -->
				<div class="form-group">
					<label class="control-label" for="ID">University ID :</label>
					<div class="controls">
						<input type="text" 
							   name="ID" 
							   id="ID" 
							   value="<?php echo @$_POST["ID"]; ?>" 
							   class="form-control" 
							   onBlur="valID(this)" 
							   maxlength="7" 
							   required 
							   autocomplete="on">
						<span class="help-block"><ul>
							</ul></span> </div>
				</div>

				<!-- #################################################################### email #################################################################### -->
				<div class="form-group">
					<label class="control-label" for="email">E-Mail :</label>
					<div class="controls">
						<input type="email" 
							   name="email" 
							   id="email" 
							   value="<?php echo @$_POST["email"]; ?>" 
							   class="form-control" 
							   onBlur="valEmail(this)" 
							   required 
							   autocomplete="on" 
							   maxlength="256">
						<span class="help-block"><ul>
							</ul></span>
					</div>
				</div>

				<!-- #################################################################### Password #################################################################### -->
				<div class="form-group">
					<label class="control-label" for="password">Password :</label>
					<div class="controls">
						<input type="password" 
							   name="password" 
							   id="password" 
							   value="" 
							   class="form-control" 
							   onBlur="valPassword(this)" 
							   maxlength="32" 
							   required>
						<span class="help-block"><ul></ul></span>
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
						<span class="help-block"><ul></ul></span>
					</div>
				</div>

				<!-- #################################################################### PhoneNo #################################################################### -->
				<div class="form-group">
					<label class="control-label" for="phoneNumber">Phone Number (optional) :</label>
					<div class="controls">
						<input type="text" 
							   name="phoneNumber" 
							   id="phoneNumber" 
							   value="<?php echo @$_POST["phoneNumber"]; ?>" 
							   class="form-control" 
							   maxlength="13" 
							   onBlur="valPhoneNo(this)" 
							   autocomplete="on">
						<span class="help-block"><ul></ul></span>
					</div>
				</div>

				<!-- #################################################################### Gender #################################################################### -->
				<div class="form-group">
					<label class="control-label" for="gender">Gender :</label>
					<div class="controls">
						<select class="selectpicker form-control" 
								name="gender" 
								id="gender" 
								required>
							<option value="1">Male</option>
							<option value="2">Female</option>
							<option value="0" selected="selected">Leave Empty</option>
						</select>
						<span class="help-block"></span></div>
				</div>

				<!-- #################################################################### Birthday #################################################################### -->

				<div class="form-group">
					<label class="control-label" for="BirthdayYear">Birthday :</label>
					<div class="row controls">
						<div class="col-xs-4">
							<select class="selectpicker form-control" 
									name="BirthdayYear" 
									id="BirthdayYear" 
									required  
									onBlur="valBirthday(BirthdayMonth, BirthdayYear, BirthdayDay)">
										<?php
										$right_now = getdate();
										PrintHTML::numericOption($right_now['year'] - 16, 1900, @$_POST["BirthdayYear"]);
										?>
							</select>
						</div>
						<div class="col-xs-4">
							<select class="selectpicker form-control" name="BirthdayMonth" id="BirthdayMonth" required onBlur="valBirthday(BirthdayMonth, BirthdayYear, BirthdayDay)">
								<?php PrintHTML::numericOptionMonth(@$_POST["BirthdayMonth"]); ?>
							</select>
						</div>
						<div class="col-xs-4">
							<select class="selectpicker form-control" 
									name="BirthdayDay" 
									id="BirthdayDay" 
									required 
									onBlur="valBirthday(BirthdayMonth, BirthdayYear, BirthdayDay)">
										<?php PrintHTML::numericOption(1, 31, @$_POST["BirthdayDay"]) ?>
							</select>
						</div>
						<span class="help-block"><ul></ul></span>
					</div>
				</div>
				<!-- #################################################################### Submit #################################################################### -->
				<div  class="MyContainer text-center">Clicking Create account means that you agree to <br>
					our <a href="Register.html" title="Services Agreement">Services Agreement</a> and <a href="Register.html">Privacy Policy</a><br>
					<br>
					<button type="submit" name="submit" id="submit" class="btn btn-primary center-block" >Creat Account</button>
				</div>
			</form>
		</div>
		<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
		<?php include ("footer.php"); ?>
	</body>
</html>
