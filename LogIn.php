<?php require_once 'autoload.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Login</title>
		<?php require_once("Header.php"); ?>
		<script src="js/Validate.js"></script>
	</head>
	<body>
		<?php include ("Navbar.php"); ?>
		<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
		<div class="container">
			<h3>
				<ul class="nav nav-pills">
					<li role="presentation" class="active"><a>Login</a></li>
					<li role="presentation"><a href="SignUp.php">Sign up</a></li>
				</ul>
			</h3>
			<br>
			<form role="form" action="Login.php" method="post">
				<div class="form-group">
					<label for="ID">University ID :</label>
					<div class="controls">
						<input type="number" name="ID" id="ID" value="<?php echo @$_POST["ID"]; ?>" class="form-control" onBlur="valID(this)" maxlength="7" placeholder="Enter university ID"required autocomplete="on">
						<span class="help-block"></span> 
					</div>
				</div>

				<div class="form-group">
					<label for="Password">Password :</label>
					<div class="controls">
						<input type="password" name="Password" id="Password" value="" class="form-control" maxlength="32" required>
						<span class="help-block"></span>
					</div>
				</div>

				<div class="checkbox">
					<label>
						<input type="checkbox">
						Remember me</label>
				</div>
				<button type="submit" class="btn btn-primary pull-right">Login</button>
			</form>
		</div>
		<div class="clearfix" style="padding:150px"></div>
		<?php include ("Footer.php"); ?>
	</body>
</html>