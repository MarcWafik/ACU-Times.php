<?php
require_once 'autoload.php';
User::CheckLogin();

$arrArticle = Article::readAllrelatedWriterID(User::getSessionUserID());
$arrPoll = Poll::readAllrelatedWriterID(User::getSessionUserID());
$arrYoutube = Youtube::readAllrelatedWriterID(User::getSessionUserID());
$arrGallery = Gallery::readAllrelatedWriterID(User::getSessionUserID());

function printthem($displayLVL) {
	global $arrArticle, $arrPoll, $arrYoutube, $arrGallery;
	foreach ($arrArticle as &$value) {
		if ($value->getDisplay() == $displayLVL) {
			ArticleView::Normal12Next($value->getTitleEnglish(), "create_article.php?id=" . $value->getId(), $value->getDescriptionEnglish(), $value->getCreatDate_StringLong(), $value->getImgThumbnail());
		}
	}
	foreach ($arrYoutube as &$value) {
		if ($value->getDisplay() == $displayLVL) {
			YoutubeView::Thumb($value, True);
		}
	}
	foreach ($arrPoll as &$value) {
		if ($value->getDisplay() == $displayLVL) {
			PollView::Normal($imput);
		}
	}
}
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
				<?php printthem(EntityArticle::DISPLAY_NEW); ?>
			</div>
			<!-------------------------------- Approved -------------------------------->
			<br><a href="#Approved" class="text-primary" data-toggle="collapse"><h2>Approved</h2></a>
			<hr>
			<div id="Approved" class="collapse in container">
				<?php printthem(EntityArticle::DISPLAY_APPROVED); ?>
			</div>
			<!-------------------------------- Published -------------------------------->
			<br><a href="#Published" class="text-primary" data-toggle="collapse"><h2>Published</h2></a>
			<hr>
			<div id="Published" class="collapse in container">
				<?php printthem(EntityArticle::DISPLAY_PUBLISHED); ?>
			</div>
			<!-------------------------------- Rejected -------------------------------->
			<br><a href="#Rejected" class="text-danger" data-toggle="collapse"><h2>Rejected</h2></a>
			<hr>
			<div id="Rejected" class="collapse in container">
				<?php printthem(EntityArticle::DISPLAY_DENIED); ?>
			</div>
			<!-------------------------------- Articles -------------------------------->

		</div>
		<?php include ("footer.php"); ?>
	</body>
</html>