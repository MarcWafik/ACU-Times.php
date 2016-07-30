<?php
require_once 'autoload.php';
$ArticleArr = Array();
if (Null === @$_GET["Search"] || "" === @$_GET["Search"]) {
	//$ArticleArr = LoadAllArticle();
} else {
	//$ArticleArr = SearchArticleTitle($_GET["Search"]);
}
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Title</title>
		<?php require_once("header.php"); ?>
	</head>
	<body>
		<?php include ("navbar.php"); ?>
		<!-- content -->

		<div class="container">
			<!-------------------------------- Search -------------------------------->
			<br><br>
			<div class="col-md-6 col-md-offset-3">
				<form action="search.php" method="get">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for..." id="Search" name="Search">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
						</span> </div>
				</form><br>
			</div>
			<div class="clearfix"></div>

			<div class="input-group pull-right" style="width:150px">
				<select class="selectpicker form-control  input-sm" onBlur="">
					<option selected disabled>Sort by</option>
					<option>by Title</option>
					<option>by Date</option>
				</select>
				<span class="input-group-btn">
					<button class="btn input-sm"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></button>
				</span> </div><br>
			<!-------------------------------- Articles -------------------------------->
			<div class="container">
				<?php
				$title = "Sed ultrices turpis sed rhoncus semper";
				$link = "#";
				$description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque scelerisque mi, eu varius eros interdum sit amet. Maecenas at vulputate nisl. Aenean in varius purus. Praesent commodo fringilla euismod. In eu eros id arcu imperdiet rutrum.";
				$time = new DateTime;
				$time = $time->format('g:i a - D, d F Y');
				$img = "http://placehold.it/1920x1080";
				PrintHTML::portofolio_12row_next_normal($title, $link, $description, $time, $img);
				PrintHTML::portofolio_12row_next_normal($title, $link, $description, $time, $img);
				PrintHTML::portofolio_12row_next_normal($title, $link, $description, $time, $img);
				PrintHTML::portofolio_12row_next_normal($title, $link, $description, $time, $img);
				?></div>
			<!-------------------------------- pagination -------------------------------->
			<button type="button" class="btn btn-primary center-block" onClick="">Load more <i class="fa fa-arrow-down" aria-hidden="true"></i></button>
			<div class="clear"></div>
		</div>
		<?php include ("footer.php"); ?>
	</body>
</html>