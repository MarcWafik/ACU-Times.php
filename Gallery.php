<?php require_once 'autoload.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Gallery</title>
		<?php require_once("header.php"); ?>
		<style>
			.link-img-gallery{padding:1px ; margin:0}
		</style>
	</head>
	<body>
		<?php include ("navbar.php"); ?>
		<!-- content -->
		<div class="container"> 
			<!-------------------------------- Gallery -------------------------------->
			<div class="row">

				<div class="col-lg-12">
					<h1 class="page-header">Gallery</h1>
				</div>

                <a class="col-lg-3 col-md-4 col-xs-6 link-img-gallery" href="#">
                    <img class="img-responsive img-hover img-gallery" src="http://placehold.it/1920x1080" alt="">
                </a>
				<a class="col-lg-3 col-md-4 col-xs-6 link-img-gallery" href="#">
                    <img class="img-responsive img-hover img-gallery" src="http://placehold.it/1920x1080" alt="">
                </a>
				<a class="col-lg-3 col-md-4 col-xs-6 link-img-gallery" href="#">
                    <img class="img-responsive img-hover img-gallery" src="http://placehold.it/1920x1080" alt="">
                </a>

			</div>

			<hr>
			<!-------------------------------- pagination -------------------------------->
			<div class="text-center center-block">
				<ul class = "pagination">
					<li><a href = "#">&laquo;</a></li>
					<li><a href = "?Page=1">1</a></li>
					<li><a href = "#">&raquo;</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<?php include ("footer.php"); ?>
	</body>
</html>