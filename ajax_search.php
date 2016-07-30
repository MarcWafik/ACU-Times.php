<?php

require_once 'autoload.php';

if (isset($_GET["Search"])) {
	$offsetMultiplier = 0;
	if (isset($_GET["offsetMultiplier"])) {
		$offsetMultiplier = $_GET["offsetMultiplier"];
	}
	$arr = Article::Search($_GET["Search"], $offsetMultiplier * 6, 6);
	foreach ($arr as $value) {
		PrintHTML::portofolio_12row_next_normal($value->getTitleEnglish(), "Article.php?id=" . $value->getId(), $value->getDescriptionEnglish(), $value->getCreatDate_StringLong(), $value->getImgThumbnail());
	}
}


