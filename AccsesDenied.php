<!DOCTYPE html>
<html lang="en">
<head>
<title>ACU Times | Title</title>
<?php require_once("Header.php");?>
</head>
<body>
<?php include ("Navbar.php");?>
<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
<div class="text-center center-block">
	<div class="error-code"><i class="fa fa-warning"></i></div>
	<h1>Accses Denied</h1>
	<div class="text-muted"> Sorry, but you don't have accses to that page. <br/>
		<div> <a class="login-detail-panel-button btn" href="javascript:history.go(-1)"> <i class="fa fa-arrow-left"></i> Go back</a> 
				<a class=" login-detail-panel-button btn" href="index.php">Homepage <i class="fa fa-arrow-right"></i></a> </div>
	</div>
</div>
<?php include ("Footer.php");?>
</body>
</html>