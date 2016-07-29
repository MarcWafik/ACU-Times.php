<?php
require_once 'autoload.php';

if (valAllNotnull()) {
	$User = new User();
	$User->setAccses(User::ACCSES_REGULAR);
	$User->setCreatDate();
	$User->setLastUpdateDate();
	$iscorrect = array();
	$iscorrect = array(
		"ID" => (bool) $User->setID($_POST["ID"]),
		"RePassword" => (bool) $User->setPassword($_POST["Password"]),
		"Password" => (bool) ($_POST["Password"] === $_POST["RePassword"]),
		"name" => (bool) $User->setfullName($_POST["name"]),
		"email" => (bool) $User->setEmail($_POST["email"]),
		"PhoneNo" => (bool) $User->setPhoneNumber($_POST["PhoneNo"]),
		"Gender" => (bool) $User->setGender($_POST["Gender"]),
		"Birthday" => (bool) $User->setBirthDate($_POST["BirthdayDay"], $_POST["BirthdayMonth"], $_POST["BirthdayYear"]),
		"IDtaken" => (bool) $User->isIDAvailable($_POST["ID"]),
		"emailtaken" => (bool) $User->isEmailAvailable($_POST["email"]),
	);
	if (valAll($iscorrect)) {
		$User->create();
		header("Location: SignupSuccessful.php");
		exit;
	}
}

//=========================================validate=========================================
function valAll($iscorrect) {
	foreach ($iscorrect as $key => $value) {
		if (FALSE == $value) {
			return FALSE;
		}
	}
	return TRUE;
}

function valAllNotnull() {
	return
			isset($_POST["submit"]) &&
			isset($_POST["name"]) &&
			isset($_POST["ID"]) &&
			isset($_POST["email"]) &&
			isset($_POST["Password"]) &&
			isset($_POST["RePassword"]) &&
			isset($_POST["BirthdayMonth"]) &&
			isset($_POST["BirthdayYear"]) &&
			isset($_POST["BirthdayDay"]) &&
			isset($_POST["PhoneNo"]);
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
					<li role="presentation"><a href="Login.php">Login</a></li>
					<li role="presentation" class="active"><a>Sign up</a></li>
				</ul>
			</h3>
			<br>
			<form  role="form" action="SignUp.php" method="post" onSubmit="return isAllValid()">
				<div class="form-group">
					<label  class="control-label" class="control-label" for="name">Full name :</label>
					<div class="controls">
						<input type="text" 
							   name="name" 
							   id="name" 
							   value="<?php echo @$_POST["name"]; ?>" 
							   class="form-control" 
							   onBlur="valName(this)" 
							   required 
							   autocomplete="on"
							   maxlength="32">
						<span class="help-block"><ul>
								<?php PrintHTML::validation("name", @$iscorrect["name"], "Enter a Valid Name (Letters and space only)") ?>
							</ul></span>
					</div>
				</div>
				<!-- #################################################################### ID #################################################################### -->
				<div class="form-group">
					<label class="control-label" for="ID">University ID :</label>
					<div class="controls">
						<input type="number" 
							   name="text" id="ID" 
							   value="<?php echo @$_POST["ID"]; ?>" 
							   class="form-control" onBlur="valID(this)" 
							   maxlength="7" 
							   required 
							   autocomplete="on">
						<span class="help-block"><ul>
								<?php PrintHTML::validation("ID", @$iscorrect["ID"], "") ?>
								<?php PrintHTML::validation("IDtaken", @$iscorrect["IDtaken"], "ID is Already Taken") ?>
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
							   required autocomplete="on" 
							   maxlength="256">
						<span class="help-block"><ul>
								<?php PrintHTML::validation("email", @$iscorrect["email"], "Enter a Valid E-mail") ?>
							</ul></span>
					</div>
				</div>

				<!-- #################################################################### Password #################################################################### -->
				<div class="form-group">
					<label class="control-label" for="Password">Password :</label>
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

				<!-- #################################################################### PhoneNo #################################################################### -->
				<div class="form-group">
					<label class="control-label" for="PhoneNo">Phone Number (optional) :</label>
					<div class="controls">
						<input type="text" 
							   name="PhoneNo" 
							   id="PhoneNo" 
							   value="<?php echo @$_POST["PhoneNo"]; ?>" 
							   class="form-control" 
							   maxlength="13" 
							   onBlur="valPhoneNo(this)" 
							   autocomplete="on">
						<span class="help-block"><ul>
								<?php PrintHTML::validation("PhoneNo", @$iscorrect["PhoneNo"], "Enter a correct Phone Number") ?>
							</ul></span>
					</div>
				</div>

				<!-- #################################################################### Gender #################################################################### -->
				<div class="form-group">
					<label class="control-label" for="Gender">Gender :</label>
					<div class="controls">
						<select class="selectpicker form-control" 
								name="Gender" 
								id="Gender" 
								required>
							<option value="M">Male</option>
							<option value="F">Female</option>
							<option value="" selected="selected">Leave Empty</option>
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
						<span class="help-block"><ul>
								<?php PrintHTML::validation("Birthday", @$iscorrect["Birthday"], "Enter a valid date") ?>
							</ul></span>
					</div>
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
<?php include ("Footer.php"); ?>
</body>
</html>
