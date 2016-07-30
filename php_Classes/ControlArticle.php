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
class ControlArticle {

	private static function valAllNotnull() {
		return
				isset($_POST["Category"]) &&
				isset($_POST["Importance"]) &&
				isset($_POST["Youtubelink"]) &&
				isset($_POST["lang"]) &&
				isset($_POST["title_en"]) &&
				isset($_POST["description_en"]) &&
				isset($_POST["body_en"]) &&
				isset($_POST["title_ar"]) &&
				isset($_POST["description_ar"]) &&
				isset($_POST["body_ar"]);
	}

	public static function toAssoc($article) {
		return $Data = array(
			"Category" => $article->getCategoryID(),
			"Importance" => $article->getImportance(),
			"Youtubelink" => $article->getyoutubeURLString(),
			"lang" => $article->getLanguage(),
			"title_en" => $article->getTitleEnglish(),
			"description_en" => $article->getDescriptionEnglish(),
			"body_en" => $article->getBodyEnglish(),
			"title_ar" => $article->getTitleArabic(),
			"description_ar" => $article->getDescriptionArabic(),
			"body_ar" => $article->getBodyArabic()
		);
	}

	public static function setData($article) {
		// setting the data
		$iscorrect = array(
			"Category" => (bool) $article->setCategoryID($_POST["Category"]),
			"Importance" => (bool) $article->setImportance($_POST["Importance"]),
			"Youtubelink" => (bool) $article->setyoutubeID($_POST["Youtubelink"]),
			"lang" => (bool) $article->setLanguage($_POST["lang"]),
			"WriterID" => (bool) $article->setWriterID(User::getSessionUserID()));

		// set the English data
		if ($_POST["lang"] == Language::ENGLISH || $_POST["lang"] == Language::BOTH) {
			$iscorrect["title_en"] = (bool) $article->setTitleEnglish($_POST["title_en"]);
			$iscorrect["description_en"] = (bool) $article->setDescriptionEnglish($_POST["description_en"]);
			$iscorrect["body_en"] = (bool) $article->setBodyEnglish($_POST["body_en"]);
		}

		// set the Arabic data
		if ($_POST["lang"] == Language::ARABIC || $_POST["lang"] == Language::BOTH) {
			$iscorrect["title_ar"] = (bool) $article->setTitleArabic($_POST["title_ar"]);
			$iscorrect["description_ar"] = (bool) $article->setDescriptionArabic($_POST["description_ar"]);
			$iscorrect["body_ar"] = (bool) $article->setBodyArabic($_POST["body_ar"]);
		}
	}

}
