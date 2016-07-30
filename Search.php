<?php
require_once 'autoload.php';
$ArticleArr = Array();
if (Null === @$_GET["Search"] || "" === @$_GET["Search"]) {
	$ArticleArr = array();
} else {
	$ArticleArr = Article::Search($_GET["Search"]);
}
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Search</title>
		<?php require_once("header.php"); ?>
		<script src="js/load_more.js" type="text/javascript"></script>
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

		</div>
		<div class="container" id="apendAJAX">
			<!-------------------------------- Articles -------------------------------->
			<?php include 'ajax_search.php'; ?>
		</div>
		<!-------------------------------- pagination -------------------------------->
		<input type="hidden" value="ajax_search.php?Search=<?php echo @$_GET["Search"] ?>" id="hide" name="hide">
		<button type="button" class="btn btn-primary center-block" onClick="loadMore(hide)">Load more <i class="fa fa-arrow-down" aria-hidden="true"></i></button>
			<?php include ("footer.php"); ?>
	</body>
</html>