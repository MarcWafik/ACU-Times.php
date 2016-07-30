<?php require_once 'autoload.php';
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Title</title>
		<?php require_once("header.php"); ?>
	</head>
	<body>
		<?php include ("navbar.php"); ?>
		<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
		<div class="text-center center-block">
			<div class="Succses-code"><i class="fa fa-check"></i></div>
			<h1>Registration Succsesfull</h1>
			<div class="text-muted"> You can now continue to control panel and edit your info.
				<div> <a class="login-detail-panel-button btn" href="login.php"> <i class="fa fa-arrow-left"></i> Login </a> 
					<a class=" login-detail-panel-button btn" href="index.php"> Homepage <i class="fa fa-arrow-right"></i></a> </div>
			</div>
		</div>
		<?php include ("footer.php"); ?>
	</body>
</html>