<?php require_once("PrintPortofolio.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ACU Times | Title</title>
<?php require_once("Header.php");?>
</head>
<body>
<?php include ("Navbar.php");?>

	<!-------------------------------- Articles -------------------------------->
	<div class="container">
		<?php printPortofolio_1Line (); ?>
		<?php printPortofolio_1Line (); ?>
		<?php printPortofolio_1Line (); ?>
		<?php printPortofolio_1Line (); ?>
		<?php printPortofolio_1Line (); ?>
		<?php printPortofolio_1Line (); ?>
		<?php printPortofolio_1Line (); ?>
		<?php printPortofolio_1Line (); ?>
		<?php printPortofolio_1Line (); ?>
		<?php echo session_id(); ?>
	</div>
	<!-------------------------------- pagination -------------------------------->
	<div class="text-center center-block">
		<ul class = "pagination">
			<li><a href = "#">&laquo;</a></li>
			<li><a href = "?Page=1">1</a></li>
			<li><a href = "#">&raquo;</a></li>
		</ul>
	</div>
<?php include ("Footer.php");?>
</body>
</html>