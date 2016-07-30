<?php
require_once 'autoload.php';
$arrArticle = Article::readAllrelatedWriterID(User::getSessionUserID());
User::CheckLogin();
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
			<br><a href="#New" class="text-primary" data-toggle="collapse"><h2>New</h2></a>
			<hr>
			<div id="New" class="collapse in container">
				<?php
				foreach ($arrArticle as &$value) {
					$value = new Article;
					if ($value->getDisplay() == EntityArticle::DISPLAY_NEW) {
						PrintHTML::portofolio_12row_next_normal($value->getTitleEnglish(), "creat_article.php?id=" . $value->getId(), $value->getDescriptionEnglish(), $value->getCreatDate_StringLong(), $value->getImgThumbnail());
					}
				}
				?>
			</div>
			<!-------------------------------- Approved -------------------------------->
			<br><a href="#Approved" class="text-primary" data-toggle="collapse"><h2>Approved</h2></a>
			<hr>
			<div id="Approved" class="collapse in container">
				Lorem ipsum dolor text....
			</div>
			<!-------------------------------- Published -------------------------------->
			<br><a href="#Published" class="text-primary" data-toggle="collapse"><h2>Published</h2></a>
			<hr>
			<div id="Published" class="collapse in container">
				Lorem ipsum dolor text....
			</div>
			<!-------------------------------- Rejected -------------------------------->
			<br><a href="#Rejected" class="text-danger" data-toggle="collapse"><h2>Rejected</h2></a>
			<hr>
			<div id="Rejected" class="collapse in container">
				Lorem ipsum dolor text....
			</div>
			<!-------------------------------- Articles -------------------------------->

		</div>
		<?php include ("footer.php"); ?>
	</body>
</html>