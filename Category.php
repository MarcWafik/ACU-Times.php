<?php
require_once 'autoload.php';

$cat = new Category();
if (isset($_GET["CategoryID"]) && $cat->read($_GET["CategoryID"])) {
	
} else {
	header("Location: 404.php");
	exit();
}
?><!DOCTYPE html>
<html lang="en">

	<head>
		<title>ACU Times | Category</title>
		<?php require_once("header.php"); ?>
		<script src="js/load_more.js" type="text/javascript"></script>
	</head>
	<body>
		<?php include ("navbar.php"); ?>
		<div class="container" id="apendAJAX">
			<br><h2 class="text-primary"><?php echo $cat->getNameEnglish() ?></h2>
			<hr>
			<!-------------------------------- Articles -------------------------------->
			<?php include 'ajax_category.php'; ?>
		</div>
		<!-------------------------------- pagination -------------------------------->
		<input type="hidden" value="ajax_category.php?CategoryID=<?php echo @$_GET["CategoryID"] ?>" id="hide" name="hide">
		<button type="button" class="btn btn-primary center-block" onClick="loadMore(hide)">Load more <i class="fa fa-arrow-down" aria-hidden="true"></i></button>
			<?php include ("footer.php"); ?>

	</body>
</html>