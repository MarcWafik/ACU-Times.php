<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControlArticle
 *
 * @author marcw
 */
class ArticleController {

	public static function Create() {
		
	}
	public static function ReadSearch() {
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
	}

	public static function ReadCategory() {
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
	}

}
