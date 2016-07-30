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
		// Check for accses
		User::CheckLogin();
		$article = new Article();
		$access = User::getSessionAccses();
		if (!$article->hasAccsesToModify($access)) {
			Header::ResponseCode(Header::UNAUTHORIZED);
		}

// Update
		if (isset($_GET["id"])) {
			if ($article->read($_GET["id"])) {
				$Data = array(
					"Category" => $article->getCategoryID(),
					"Importance" => $article->getImportance(),
					"Youtubelink" => $article->getyoutubeURLString(),
					"lang" => $article->getLanguage(),
					"titleEnglish" => $article->getTitleEnglish(),
					"descriptionEnglish" => $article->getDescriptionEnglish(),
					"bodyEnglish" => $article->getBodyEnglish(),
					"titleArabic" => $article->getTitleArabic(),
					"descriptionArabic" => $article->getDescriptionArabic(),
					"bodyArabic" => $article->getBodyArabic()
				);
			} else {
				Header::ResponseCode(Header::NOT_FOUND);
				exit;
			}
		}

		if (valAllNotnull()) {

			// setting the data
			$iscorrect = array(
				"Category" => (bool) $article->setCategoryID($_POST["Category"]),
				"Importance" => (bool) $article->setImportance($_POST["Importance"]),
				"Youtubelink" => (bool) $article->setyoutubeID($_POST["Youtubelink"]),
				"lang" => (bool) $article->setLanguage($_POST["lang"]),
				"WriterID" => (bool) $article->setWriterID(User::getSessionUserID()));

			// set the English data
			if ($_POST["lang"] == Language::ENGLISH || $_POST["lang"] == Language::BOTH) {
				$iscorrect["titleEnglish"] = (bool) $article->setTitleEnglish($_POST["titleEnglish"]);
				$iscorrect["descriptionEnglish"] = (bool) $article->setDescriptionEnglish($_POST["descriptionEnglish"]);
				$iscorrect["bodyEnglish"] = (bool) $article->setBodyEnglish($_POST["bodyEnglish"]);
			}

			// set the Arabic data
			if ($_POST["lang"] == Language::ARABIC || $_POST["lang"] == Language::BOTH) {
				$iscorrect["titleArabic"] = (bool) $article->setTitleArabic($_POST["titleArabic"]);
				$iscorrect["descriptionArabic"] = (bool) $article->setDescriptionArabic($_POST["descriptionArabic"]);
				$iscorrect["bodyArabic"] = (bool) $article->setBodyArabic($_POST["bodyArabic"]);
			}
			$article->setImageNumber(1);
			// set the publish or aprove or creat
			$article->setDisplayFromSession($access);
			$passed = FALSE;
			// check if the imput is valid
			if (Validation::valAll($iscorrect)) {

				if (isset($_GET["id"])) {
					$passed = (bool) $article->update();
					if ($passed) {
						$x = new Updates;
						$x->setEditorID(User::getSessionUserID());
						$x->setTargetType(Updates::TARGET_TYPE_ARTICLE);
						$x->setTargetID($Gallery->getId());
						$x->setMessageType(Updates::MESSAGE_TYPE_UPDATE);
						$x->create();

						$y = new Notification;
						$y->setUserID($article->getWriterID());
						$y->setSource(Notification::SOURCE_ARTICLE);
						$y->setsourceID($article->getId());
						$y->setMessage("Article was updated by " . User::getSessionUserFullName());
						$y->create();
					}
				} else {
					$article->setWriterID(User::getSessionUserID());
					$passed = (bool) $article->create();
					rename("images\\article\\upload.jpg", "images\\article\\" . $article->getId() . "-0.jpg");
				}
			}

			// check if every thing went right
			if ($passed) {

				Header::Location("article.php?id=" . $article->getId());
				exit;
			} else {
				$Data = array(
					"Category" => $_POST["Category"],
					"Importance" => $_POST["Importance"],
					"Youtubelink" => $_POST["Youtubelink"],
					"lang" => $_POST["lang"],
					"titleEnglish" => $_POST["titleEnglish"],
					"descriptionEnglish" => $_POST["descriptionEnglish"],
					"titleArabic" => $_POST["titleArabic"],
					"descriptionArabic" => $_POST["descriptionArabic"],
					"bodyArabic" => $_POST["bodyArabic"]
				);
			}
		}

		function valAllNotnull() {
			return
					isset($_POST["Category"]) &&
					isset($_POST["Importance"]) &&
					isset($_POST["Youtubelink"]) &&
					isset($_POST["lang"]) &&
					isset($_POST["titleEnglish"]) &&
					isset($_POST["descriptionEnglish"]) &&
					isset($_POST["bodyEnglish"]) &&
					isset($_POST["titleArabic"]) &&
					isset($_POST["descriptionArabic"]) &&
					isset($_POST["bodyArabic"]);
		}

	}

}
