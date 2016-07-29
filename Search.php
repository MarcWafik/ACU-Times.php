<?php require_once 'autoload.php'; ?>
<?php
$ArticleArr = Array();
if (Null === @$_GET["Search"] || "" === @$_GET["Search"]) {
	$ArticleArr = LoadAllArticle();
} else {
	$ArticleArr = SearchArticleTitle($_GET["Search"]);
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Title</title>
		<?php require_once("Header.php"); ?>
	</head>
	<body>
		<?php include ("Navbar.php"); ?>
		<!-- content -->

		<div class="container">
			<!-------------------------------- Search -------------------------------->
			<div class="col-md-6 col-md-offset-3">
				<form action="Search.php" method="get">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for..." id="Search" name="Search">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
						</span> </div>
				</form>
			</div>
			<div class="clearfix"></div>
			<!-------------------------------- Articles -------------------------------->
			<div class="container">
				<hr>
				<?php
				foreach ($ArticleArr as &$Article) {
					if (isset($Article["ID"]) && $Article["ID"] != "" && $Article["ID"] != " ") {
						echo
						printPortofolio_1Line(
								$Article["IMG"], $Article["Name"], "Article.php?ID=" . $Article["ID"], $Article["Brief"], $Article["ArticleDay"], $Article["ArticleMonth"], $Article["ArticleYear"]);
					}
				}
				?>
			</div>
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
		<?php include ("Footer.php"); ?>
	</body>
</html>