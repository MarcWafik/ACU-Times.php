<!DOCTYPE html>

<html>
<head>
<title>Log in</title>
<meta charset="iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="layout/styles/mediaqueries.css" type="text/css" media="all">
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery-mobilemenu.min.js"></script>
</head>
<body>
<?php include ("Header.html");?>
<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
<div class="wrapper row3">
	<div class=" center"> <br>
		<br><p><h6>Log in</h6></p><br>
		<form action="#" method="post">
			<p>
			<div class="row3">
				<label for="name"><small>ID :</small></label>
				<br>
				<input type= "text" name="ID" id="ID" value="" size="50%">
			</div>
			</p>
			<p>
			<div class="row3">
				<label for="Password"><small>Password :</small></label>
				<br>
				<input type="password" name="Password" id="Password" value="" size="50%">
			</div>
			</p>
			<p><a href="##################"><small>Forgotten your username or password?</small></a></p>
			<p>
			<div class="row3">
				<input name="Login" type="submit" id="Login" value="Login">
			</div>
			</p>
		</form>
		<br>
		<br>
	</div>
</div>
<?php include ("Footer.html");?>
</body>
</html>