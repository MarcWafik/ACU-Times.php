<?php
require_once 'autoload.php';
User::CheckLogin();
if (!User::getSessionAccses()->hasAccsesAdmin()) {
	Header::ResponseCode(Header::UNAUTHORIZED);
	exit;
}
$arrArticle = Access::readAll();
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Category</title>
		<?php require_once("header.php"); ?>
	</head>
	<body>
		<?php include ("navbar.php"); ?>
		<div class="container">
			<!-------------------------------- New -------------------------------->
			<br><h2 class="text-primary" >Access</h2>
			<hr>
			<h3>
				<?php
				foreach ($arrArticle as &$value) {
					//<a href="#" class="alert-link">...</a>
					echo '<a href="create_access.php?id=' . $value->getId() . '">' . $value->getTitleEnglish() . '</a><br><br>';
				}
				?></h4>
				<!-------------------------------- Articles -------------------------------->

		</div>
		<?php include ("footer.php"); ?>
	</body>
</html>