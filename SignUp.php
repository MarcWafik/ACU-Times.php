<!DOCTYPE html>

<html>
<head>
<title>ACU Times | Register</title>
<meta charset="iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="layout/styles/mediaqueries.css" type="text/css" media="all">
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery-mobilemenu.min.js"></script>
<script src="layout/scripts/Validate.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<style>
</style>
</head>
<body>
<?php include ("Header.php");?>

<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
<div class="wrapper row3">
	<div class="clear"><br>
		<br>
	</div>
	<div style="margin: 0 auto; width: 340px;text-align:left;"> <br>
		<form action="SignupConfirm.php" method="post">
			<!-- #################################################################### name #################################################################### -->
			<div class="MyContainer">
				<label for="name">Full name :</label>
				<br>
				<input type="text" name="name" id="name" value="" class="MyInput" onBlur="valName(this,Validate_name)" required autocomplete="on">
				<small>
				<div id="Validate_name" name = "Validate_name" class="MyAlret"></div>
				</small> </div>
			<!-- #################################################################### ID #################################################################### -->
			<div class="MyContainer">
				<label for="ID">University ID :</label>
				<br>
				<input type="text" name="ID" id="ID" value="" class="MyInput" onBlur="valID(this,Validate_ID)" required autocomplete="on">
				<small>
				<div id="Validate_ID" name = "Validate_ID" class="MyAlret"></div>
				</small> </div>
			<!-- #################################################################### email #################################################################### -->
			<div class="MyContainer">
				<label for="email">E-Mail :</label>
				<br>
				<input type="email" name="email" id="email" value="" class="MyInput" onBlur="valEmail(this,Validate_email)" required autocomplete="on">
				<small>
				<div id="Validate_email" name = "Validate_email" class="MyAlret"></div>
				</small> </div>
			<!-- #################################################################### Password #################################################################### -->
			<div class="MyContainer">
				<label for="Password">Password :</label>
				<br>
				<input type="password" name="Password" id="Password" value="" class="MyInput" onBlur="valPassword(this,Validate_Password)" required>
				<small>
				<div id="Validate_Password" name = "Validate_Password" class="MyAlret"></div>
				</small> </div>
			<!-- #################################################################### RePassword #################################################################### -->
			<div class="MyContainer">
				<label for="RePassword">Reenter password :</label>
				<br>
				<input type="password" name="RePassword" id="RePassword" value="" class="MyInput" onBlur="valRePassword(this,Validate_RePassword,Password)" required>
				<small>
				<div id="Validate_RePassword" name = "Validate_RePassword" class="MyAlret"></div>
				</small> </div>
			<!-- #################################################################### PhoneNo #################################################################### -->
			<div class="MyContainer">
				<label for="PhoneNo">Phone Number (optional) :</label>
				<br>
				<input type= "tel" name="PhoneNo" id="PhoneNo" value="" class="MyInput" onBlur="valPhoneNo(this,Validate_PhoneNo)" autocomplete="on">
				<small>
				<div id="Validate_PhoneNo" name = "Validate_PhoneNo" class="MyAlret"></div>
				</small> </div>
			<!-- #################################################################### Gender #################################################################### -->
			<div class="MyContainer">
				<label for="Gender" >Gender :</label>
				<br>
				<select  style="padding:3px;"  class="MyInput" name="Gender" id="Gender" required >
					<option value="M">Male</option>
					<option value="F">Female</option>
					<option value="" selected="selected">Do not specify</option>
				</select>
				<small>
				<div id="Validate_Gender" name = "Validate_Gender" class="MyAlret"></div>
				</small> </div>
			<!-- #################################################################### Birthday #################################################################### -->
			<div class="MyContainer">
				<label for="Birthday" >Birthday :</label>
				<br>
				<input type="date"  name="Birthday" id="Birthday" value="" class="MyInput" onBlur="valBirthday(this,Validate_Birthday)" required autocomplete="on">
				<small>
				<div id="Validate_Birthday" name = "Validate_Birthday" class="MyAlret"></div>
				</small> </div>
			<!-- #################################################################### g-recaptcha #################################################################### -->
			<div class="MyContainer">
				<div class="g-recaptcha" data-sitekey="6Ldh-RkTAAAAAPtk9mzLYazqa7A9twsF8-2dMPuC"> </div>
			</div>
			<!-- #################################################################### Submit #################################################################### -->
			<div  class="MyContainer" style="text-align:center"> <small>Clicking Create account means that you agree to <br>
				our <a href="Register.html" title="Services Agreement">Services Agreement</a> and <a href="Register.html">Privacy Policy</a><br>
				<br>
				</small>
				<div class="center">
					<input class="Mysubmit" style="border-radius:5px" name="submit" type="submit" id="submit" value="Creat Account">
				</div>
			</div>
			<!-- ####################################################################  #################################################################### -->
		</form>
		<div class="clear"><br>
			<br>
		</div>
	</div>
</div>
<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
<?php include ("Footer.html");?>
</body>
</html>
