<?php

require_once 'autoload.php';
if (isset($_GET["CategoryID"])) {
	$isFirst = TRUE;
	$offsetMultiplier = 0;
	if (isset($_GET["offsetMultiplier"])) {
		$isFirst = FALSE;
		$offsetMultiplier = $_GET["offsetMultiplier"];
	}
	$arr = Article::getAllInCat($_GET["CategoryID"], $offsetMultiplier * 6, 6);
	foreach ($arr as $value) {
		if ($isFirst) {
			ArticleView::Large12Next($value->getTitleEnglish(), "Article.php?id=" . $value->getId(), $value->getDescriptionEnglish(), $value->getCreatDate_StringLong(), $value->getImgThumbnail());
			$isFirst = FALSE;
		} else {
			ArticleView::Normal12Next($value->getTitleEnglish(), "Article.php?id=" . $value->getId(), $value->getDescriptionEnglish(), $value->getCreatDate_StringLong(), $value->getImgThumbnail());
		}
	}
}

