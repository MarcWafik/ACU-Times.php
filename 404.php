<?php require_once 'autoload.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | 404</title>
		<?php require_once("Header.php"); ?>
	</head>
	<body>
		<?php include ("Navbar.php"); ?>
		<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
		<div class="text-center center-block">
			<br>
			<div class="error-code">404 <i class="fa fa-warning"></i></div>
			<h3>We couldn't find the page..</h3>
			<div class="text-muted"> Sorry, but the page you are looking for was either not found or does not exist. <br/>
				Try refreshing the page or click the button below to go back to the Homepage.
				<div> <a class="login-detail-panel-button btn" href="javascript:history.go(-1)"> <i class="fa fa-arrow-left"></i> Go back</a> 
					<a class=" login-detail-panel-button btn" href="index.php">Homepage <i class="fa fa-arrow-right"></i></a> </div>
			</div>
			<br>
		</div>
		<?php include ("Footer.php"); ?>
	</body>
</html>