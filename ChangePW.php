<!DOCTYPE html>

<html>
<head>
<title>Edit profile</title>
<meta charset="iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="layout/styles/mediaqueries.css" type="text/css" media="all">
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery-mobilemenu.min.js"></script>
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
.MyContainer {
	padding: 10px;
}
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
		<form action="#" method="post">
				<div class="MyContainer">
				<label for="Password">Old password :</label>
				<br>
				<input type="password" name="OldPassword" id="OldPassword" value="" class="MyInput" onBlur="valPassword()" required>
				<small>
				<div id="Validate_OldPassword" name = "Validate_OldPassword" class="MyAlret"></div>
				</small> </div>
			<div class="MyContainer">
				<label for="NewPassword">New password :</label>
				<br>
				<input type="password" name="NewPassword" id="NewPassword" value="" class="MyInput" onBlur="valPassword()" required>
				<small>
				<div id="Validate_NewPassword" name = "Validate_NewPassword" class="MyAlret"></div>
				</small> </div>
			<div class="MyContainer">
				<label for="RePassword">Reenter password :</label>
				<br>
				<input type="password" name="RePassword" id="RePassword" value="" class="MyInput" onBlur="valRePassword()" required>
				<small>
				<div id="Validate_RePassword" name = "Validate_RePassword" class="MyAlret"></div>
				</small> </div>
			<div  class="MyContainer" style="text-align:center">
				<div class="center">
					<input class="Mysubmit" style="border-radius:5px" name="submit" type="submit" id="submit" value="Change PW">
				</div>
			</div>
		</form>
		<div class="clear"><br>
			<br>
		</div>
	</div>
</div>
<?php include ("Footer.html");?>
</body>
</html>