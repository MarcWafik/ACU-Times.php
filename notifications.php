<?php
require_once 'autoload.php';
User::CheckLogin();

$arrArticle = Notification::readAllrelatedWriterID(User::getSessionUserID());
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Category</title>
		<?php require_once("header.php"); ?>
		<script type="text/javascript" src="js/Poll.js"></script>
	</head>
	<body>
		<?php include ("navbar.php"); ?>
		<div class="container">
			<!-------------------------------- New -------------------------------->
			<br><h2 class="text-primary" >Notification</h2>
			<hr>
			<?php
			foreach ($arrArticle as $value) {
				//<a href="#" class="alert-link">...</a>
				PrintHTML::alert_dismissible($value->getMessage(), PrintHTML::ALERT_INFO);
			}
			?>
			<!-------------------------------- Articles -------------------------------->

		</div>
		<?php include ("footer.php"); ?>
	</body>
</html>