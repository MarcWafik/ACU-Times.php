<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccessController
 *
 * @author marcw
 */
class AccessController {

	public static function Creat() {
		// Check for accses
		User::CheckLogin();
		$access = new Access();
		$UserAccess = User::getSessionAccses();
		if (!$UserAccess->hasAccsesAdmin()) {
			Header::ResponseCode(Header::UNAUTHORIZED);
		}

// Update
		if (isset($_GET["id"])) {
			if ($access->read($_GET["id"])) {
				$Data = array(
					"titleEnglish" => $access->getTitleEnglish(),
					"titleArabic" => $access->getTitleArabic(),
					"article" => $access->getArticle(),
					"poll" => $access->getPoll(),
					"gallery" => $access->getGallery(),
					"multimedia" => $access->getYoutube(),
					"user" => $access->getUser()
				);
			} else {
				Header::ResponseCode(Header::NOT_FOUND);
				exit;
			}
		}

		if (valAllNotnull()) {

			// setting the data
			$iscorrect = array(
				"titleEnglish" => (bool) $access->setTitleEnglish($_POST["titleEnglish"]),
				"titleArabic" => (bool) $access->setTitleArabic($_POST["titleArabic"]),
				"article" => (bool) $access->setArticle($_POST["article"]),
				"poll" => (bool) $access->setPoll($_POST["poll"]),
				"gallery" => (bool) $access->setGallery($_POST["titleEnglish"]),
				"multimedia" => (bool) $access->setYoutube($_POST["multimedia"]),
				"user" => (bool) $access->setUser($_POST["user"])
			);
			$passed = FALSE;

			// check if the imput is valid
			if (Validation::valAll($iscorrect)) {

				if (isset($_GET["id"])) {
					$passed = (bool) $access->update();
				} else {
					$passed = (bool) $access->create();
				}
			}

			// check if every thing went right
			if ($passed) {
				Header::Location(Header::REDIR_HOME);
				exit;
			} else {
				$Data = array(
					"titleEnglish" => $_POST["titleEnglish"],
					"titleArabic" => $_POST["titleArabic"],
					"article" => $_POST["article"],
					"poll" => $_POST["poll"],
					"gallery" => $_POST["gallery"],
					"multimedia" => $_POST["multimedia"],
					"user" => $_POST["user"]
				);
			}
		}

		function valAllNotnull() {
			return
					isset($_POST["titleEnglish"]) &&
					isset($_POST["titleArabic"]) &&
					isset($_POST["article"]) &&
					isset($_POST["poll"]) &&
					isset($_POST["gallery"]) &&
					isset($_POST["multimedia"]) &&
					isset($_POST["user"]);
		}

		return $iscorrect;
	}

}
