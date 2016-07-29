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
<script src="https://www.google.com/recaptcha/api.js"></script>
<style>
.MyAlret {
	color: red;
	padding-top: 5px;
}
.MyLable {
}
.MyInput {
	width: 320px;
}
</style>
</head>
<body>
<?php include ("Header.html");?>

<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
<div class="wrapper row3">
	<div style="margin: 0 auto; width: 325px;text-align:left;"> <br>
		<form action="#" method="post">
			<p>
			<div>
				<label for="name">Full name :</label>
				<br>
				<input type="text" name="name" id="name" value="" class="MyInput" onBlur="valName()" required>
				<small>
				<div id="Validate_name" name = "Validate_name" class="MyAlret"></div>
				</small> </div>
			<p>
			<div>
				<label for="ID">University ID :</label>
				<br>
				<input type="text" name="ID" id="ID" value="" class="MyInput" onBlur="valID()" required>
				<small>
				<div id="Validate_ID" name = "Validate_ID" class="MyAlret"></div>
				</small> </div>
			</p>
			<p>
			<div>
				<label for="email">E-Mail :</label>
				<br>
				<input type="email" name="email" id="email" value="" class="MyInput" onBlur="valEmail()" required>
				<small>
				<div id="Validate_email" name = "Validate_email" class="MyAlret"></div>
				</small> </div>
			</p>
			<p>
			<div>
				<label for="Password">Password :</label>
				<br>
				<input type="password" name="Password" id="Password" value="" class="MyInput" onBlur="valPassword()" required>
				<small>
				<div id="Validate_Password" name = "Validate_Password" class="MyAlret"></div>
				</small> </div>
			</p>
			<p>
			<div>
				<label for="RePassword">Reenter password :</label>
				<br>
				<input type="password" name="RePassword" id="RePassword" value="" class="MyInput" onBlur="valRePassword()" required>
				<small>
				<div id="Validate_RePassword" name = "Validate_RePassword" class="MyAlret"></div>
				</small> </div>
			</p>
			<p>
			<div>
				<label for="PhoneNo">Phone Number (optional) :</label>
				<br>
				<input type= "text" name="PhoneNo" id="PhoneNo" value="" class="MyInput" onBlur="valPhoneNo()">
				<small>
				<div id="Validate_PhoneNo" name = "Validate_PhoneNo" class="MyAlret"></div>
				</small> </div>
			</p>
			<p>
			<div>
				<label for="Gender" >Gender :</label>
				<br>
				<select   class="MyInput" name="Gender" required >
					<option>Male</option>
					<option>Female</option>
					<option selected="selected">Do not specify</option>
				</select>
				<small>
				<div id="Validate_Gender" name = "Validate_Gender" class="MyAlret"></div>
				</small> </div>
			</p>
			<div>
				<label for="Birthday" >Birthday :</label>
				<br>
				<input type="date"  name="Birthday" id="Birthday" value=""    class="MyInput" onBlur="valBirthday()" required>
				<small>
				<div id="Validate_Birthday" name = "Validate_Birthday" class="MyAlret"></div>
				</small> </div>
			<p>
			<div style="padding:5px" class="g-recaptcha" data-sitekey="6Ldh-RkTAAAAAPtk9mzLYazqa7A9twsF8-2dMPuC"></div>
			</p>
			<div style="text-align:center">
				<p> <small>Clicking Create account means that you agree to <br>
					our <a href="Register.html" title="Services Agreement">Services Agreement</a> and <a href="Register.html">Privacy Policy</a></small></p>
				<p>
					<input class="Mysubmit" style="border-radius:5px" name="submit" type="submit" id="submit" value="Creat Account">
					<br>
					<br>
				</p>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
//=========================================Name=========================================
var fullName = document.getElementById("name");
var fullNameAlert = document.getElementById("Validate_name");
 function valName() {
		var patt =  /^[A-Za-z\s]+$/;
	if(!patt.test(fullName.value))
	{
		fullNameAlert.innerHTML = "Enter a Valid Name (Letters and space only)";
	}
	else
	{
		fullNameAlert.innerHTML = "";
	}
	
}
//=========================================ID=========================================
var ID = document.getElementById("ID");
var IDAlert = document.getElementById("Validate_ID");
 function valID() {
	 var patt =  /^\d+$/;
	if(!patt.test(ID.value))
	{
		IDAlert.innerHTML ="Enter your university ID";
	}
	else
	{
		IDAlert.innerHTML ="";
	}
}
//=========================================Email=========================================
var Email = document.getElementById("email")
var EmailAlert = document.getElementById("Validate_email");
 function valEmail() {
	var patt =  /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(!patt.test(Email.value))
	{
		EmailAlert.innerHTML = "Enter a Valid E-mail";
	}
	else
	{
		EmailAlert.innerHTML = "";
	}
}
//=========================================Password=========================================
var Password = document.getElementById("Password");
var PasswordAlert = document.getElementById("Validate_Password");
 function valPassword() {
	PasswordAlert.innerHTML = Password.value;
	var patt =/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/
	if(!patt.test(Password.value))
	{
		PasswordAlert.innerHTML = "Must contain a number ,upercase letter (A-Z) & lowercase letter (a-z)";
	}
	else
	{
		PasswordAlert.innerHTML = "";
	}
}
//=========================================RePassword=========================================
var RePassword = document.getElementById("RePassword");
var RePasswordAlert = document.getElementById("Validate_RePassword");
 function valRePassword() {
	if(Password.value!==RePassword.value)
	{
		RePasswordAlert.innerHTML = "Password does not match";
	}
	else
	{
		RePasswordAlert.innerHTML = "";
	}
}
//=========================================PhoneNo=========================================
var PhoneNo = document.getElementById("PhoneNo");
var PhoneNoAlert = document.getElementById("Validate_PhoneNo");
 function valPhoneNo() {
	var patt =  /^\d+$/;
	
	if(patt.test(PhoneNo.value))
	{
		PhoneNoAlert.innerHTML ="";
	}
	else
	{
		PhoneNoAlert.innerHTML ="Enter a correct Phone Number";
	}
}
//=========================================Gender=========================================

//=========================================BrithDay=========================================
var BrithDay = document.getElementById("Birthday");
var BrithDayAlert = document.getElementById("Validate_Birthday");
 function valBirthday() {
	//BrithDayAlert.innerHTML = BrithDay.value;
}
</script> 
<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
<?php include ("Footer.html");?>
</body>
</html>
