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
</head>
<body>
<?php include ("Header.html");?>
<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
<div class="wrapper row3">
	<div style="margin: 0 auto; width: 325px;text-align:left;"> <br>
		<form action="#" method="post">
			<p>
			<div>
				<label for="name"><small>Full name :</small></label>
				<br>
				<input type="text" name="name" id="name" value="" style="width:320px">
			</div>
			</p>
			<p>
			<div>
				<label for="ID"><small>University ID :</small></label>
				<br>
				<input type="text" name="ID" id="ID" value="" style="width:320px">
			</div>
			</p>
			<p>
			<div>
				<label for="email"><small>E-Mail :</small></label>
				<br>
				<input type="email" name="email" id="email" value="" style="width:320px">
			</div>
			</p>
			<p>
			<div>
				<label for="Password"><small>Password :</small></label>
				<br>
				<input type="password" name="Password" id="Password" value="" style="width:320px">
			</div>
			</p>
			<p>
			<div>
				<label for="RePassword"><small>Reenter password :</small></label>
				<br>
				<input type="password" name="RePassword" id="RePassword" value="" style="width:320px">
			</div>
			</p>
			<p>
			<div>
				<label for="PhoneNumber"><small>Phone Number (optional) :</small></label>
				<br>
				<input type= "text" name="PhoneNumber" id="PhoneNumber" value="" style="width:320px">
			</div>
			</p>
			<p>
			<div>
				<label for="Gender" ><small>Gender :</small></label>
				<br>
				<select   style="width:320px" name="Gender">
					<option>Male</option>
					<option>Female</option>
					<option selected="selected">Do not specify</option>
				</select>
			</div>
			</p>
			<div>
				<label for="Birthday" ><small>Birthday :</small></label>
				<br>
				<input type="date"  name="Birthday" id="Birthday" value=""    style="width:320px">
				<br>
				<br>
			</div>
			<p>
			<div class="g-recaptcha" data-sitekey="6Ldh-RkTAAAAAPtk9mzLYazqa7A9twsF8-2dMPuC"></div>
			</p>
			<div style="text-align:center">
				<p> <small>Clicking Create account means that you agree to <br>
					our <a href="Register.html" title="Services Agreement">Services Agreement</a> and <a href="Register.html">Privacy Policy</a></small></p>
				<p>
					<input name="submit" type="submit" id="submit" value="&nbsp; Creat Account &nbsp;">
					&nbsp;
					<input name="reset" type="reset" id="reset" value="&nbsp; Reset &nbsp;">
					<br>
					<br>
				</p>
			</div>
		</form>
	</div>
</div>
<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
<?php include ("Footer.html");?>
</body>
</html>
