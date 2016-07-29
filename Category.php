<?php require_once 'autoload.php';
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Title</title>
		<?php require_once("Header.php"); ?>
	</head>
	<body>
		<?php include ("Navbar.php"); ?>
		<div class="container">
			<br><h2 class="text-primary">Category name</h2>
			<hr>
			<!-------------------------------- Articles -------------------------------->
			<?php
			$title = "Sed ultrices turpis sed rhoncus semper";
			$link = "#";
			$description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque scelerisque mi, eu varius eros interdum sit amet. Maecenas at vulputate nisl. Aenean in varius purus. Praesent commodo fringilla euismod. In eu eros id arcu imperdiet rutrum.";
			$time = new DateTime;
			$time = $time->format('g:i a - D, d F Y');
			$img = "http://placehold.it/1920x1080";
			PrintHTML::portofolio_12row_next_large($title, $link, $description, $time, $img);
			PrintHTML::portofolio_12row_next_normal($title, $link, $description, $time, $img);
			PrintHTML::portofolio_12row_next_normal($title, $link, $description, $time, $img);
			PrintHTML::portofolio_12row_next_normal($title, $link, $description, $time, $img);
			PrintHTML::portofolio_12row_next_normal($title, $link, $description, $time, $img);
			?></div>
		<!-------------------------------- pagination -------------------------------->
		<button type="button" class="btn btn-primary center-block" onClick="">Load more <i class="fa fa-arrow-down" aria-hidden="true"></i></button>
			<?php include ("Footer.php"); ?>
	</body>
</html>