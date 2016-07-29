<!DOCTYPE html>

<html>
<head>
<title>ACU Times | Log in</title>
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
	<div style=" text-align:center"> <br>
		<br><p><h6>Log in</h6></p><br>
		<form action="#" method="post">
			<p>
			<div class="row3">
				<label for="name"><small>ID :</small></label>
				<br>
				<input style=" width:250px" type= "text" name="ID" id="ID" value="">
			</div>
			</p>
			<p>
			<div class="row3">
				<label for="Password"><small>Password :</small></label>
				<br>
				<input style=" width:250px" type="password" name="Password" id="Password" value="">
			</div>
			</p>
			<p><a href="##################"><small>Forgotten your username or password?</small></a></p>
			<p>
			<div class="row3">
				<input class="Mysubmit" style=" width:100px" name="Login" type="submit" id="Login" value="Login">
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