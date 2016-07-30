<?php

require_once 'autoload.php';

if (isset($_GET["Search"])) {
	$offsetMultiplier = 0;
	if (isset($_GET["offsetMultiplier"])) {
		$offsetMultiplier = $_GET["offsetMultiplier"];
	}
	$arr = Article::Search($_GET["Search"], $offsetMultiplier * 6, 6);
	foreach ($arr as $value) {
		ArticleView::Normal12Next($value->getTitleEnglish(), "Article.php?id=" . $value->getId(), $value->getDescriptionEnglish(), $value->getCreatDate_StringLong(), $value->getImgThumbnail());
	}
}


