<?php
require_once 'autoload.php';
$err = Header::FirendlyErrorCode($_GET["err"]);
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | <?php echo $_GET["err"]; ?></title>
		<?php require_once("header.php"); ?>
	</head>
	<body>
		<?php include ("navbar.php"); ?>
		<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
		<div class="text-center center-block">
			<br>
			<div class="error-code"> <?php echo $_GET["err"]; ?> <i class="fa fa-warning"></i></div>
			<h3> <?php echo $err["text"] ?> </h3>
			<div class="text-muted">
				<?php echo $err["description"] ?>
				<div> <a class="login-detail-panel-button btn" href="javascript:history.go(-1)"> <i class="fa fa-arrow-left"></i> Go back</a> 
					<a class=" login-detail-panel-button btn" href="index.php">Homepage <i class="fa fa-arrow-right"></i></a> </div>
			</div>
			<br>
		</div>
		<?php include ("footer.php"); ?>
	</body>
</html>