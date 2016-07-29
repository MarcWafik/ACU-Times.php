<?php
require_once 'autoload.php';
if (isset($_POST["submit"])) {
	$iscorrect = valArrIscorrect();
	$iscorrect["IDtaken"] = (bool) (NULL == SearchIDUserSTR($_POST["ID"]));
	if (valAll($iscorrect)) {
		$right_now = getdate();
		$User = array(
			"ID" => $_POST["ID"],
			"Password" => Encrypt_And_Hash($_POST["Password"]),
			"name" => $_POST["name"],
			"email" => $_POST["email"],
			"PhoneNo" => $_POST["PhoneNo"],
			"Gender" => $_POST["Gender"],
			"BirthdayDay" => $_POST["BirthdayDay"],
			"BirthdayMonth" => $_POST["BirthdayMonth"],
			"BirthdayYear" => $_POST["BirthdayYear"],
			"RegisterDay" => $right_now["mday"],
			"RegisterMonth" => $right_now["mon"],
			"RegisterYear" => $right_now["year"]
		);
		appendUser($User);
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
?>
<!DOCTYPE html>
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
			<form class="form-horizontal" role="form" action="SignUp.php" method="post">
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
						<span class="help-block">
							<?php if (isset($iscorrect["name"]) && !$iscorrect["name"]) echo "Enter a Valid Name (Letters and space only)" ?>
						</span> </div>
				</div>
				<!-- #################################################################### ID #################################################################### -->
				<div class="form-group">
					<label class="control-label" for="ID">University ID :</label>
					<div class="controls">
						<input type="number" 
							   name="ID" id="ID" 
							   value="<?php echo @$_POST["ID"]; ?>" 
							   class="form-control" onBlur="valID(this)" 
							   maxlength="7" 
							   required 
							   autocomplete="on">
						<span class="help-block">
							<?php
							if (isset($iscorrect["ID"]) && !$iscorrect["ID"]) {
								echo "Enter your university ID";
							} else if (isset($iscorrect["IDtaken"]) && !$iscorrect["IDtaken"]) {
								echo "ID is Alreaty taken";
							}
							?>
						</span> </div>
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
						<span class="help-block">
							<?php if (isset($iscorrect["email"]) && !$iscorrect["email"]) echo "Enter a Valid E-mail" ?>
						</span></div>
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
						<span class="help-block">
							<?php if (isset($iscorrect["Password"]) && !$iscorrect["Password"]) echo "Must contain a number (0-9) ,upercase letter (A-Z) & lowercase letter (a-z)" ?>
						</span></div>
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
						<span class="help-block">
							<?php if (isset($iscorrect["RePassword"]) && !$iscorrect["RePassword"]) echo "Passwords don't match" ?>
						</span></div>
				</div>

				<!-- #################################################################### PhoneNo #################################################################### -->
				<div class="form-group">
					<label class="control-label" for="PhoneNo">Phone Number (optional) :</label>
					<div class="controls">
						<input type="number" 
							   name="PhoneNo" 
							   id="PhoneNo" 
							   value="<?php echo @$_POST["PhoneNo"]; ?>" 
							   class="form-control" 
							   maxlength="13" 
							   onBlur="valPhoneNo(this)" 
							   autocomplete="on">
						<span class="help-block">
							<?php if (isset($iscorrect["PhoneNo"]) && !$iscorrect["PhoneNo"]) echo "Enter a correct Phone Number" ?>
						</span></div>
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
										PrintHTML::numericOption($right_now['year'] - 16, 1900)
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
						<span class="help-block"><?php if (isset($iscorrect["BirthDay"]) && !$iscorrect["BirthDay"]) echo "Enter a valid date" ?></span>
					</div>
				</div>
		</div>

		<!-- #################################################################### Submit #################################################################### -->
		<div  class="MyContainer text-center">Clicking Create account means that you agree to <br>
			our <a href="Register.html" title="Services Agreement">Services Agreement</a> and <a href="Register.html">Privacy Policy</a><br>
			<br>
			<button type="submit" name="submit" id="submit" class="btn btn-primary center-block">Creat Account</button>
		</div>
	</form>
</div>
<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
<?php include ("Footer.php"); ?>
</body>
</html>
