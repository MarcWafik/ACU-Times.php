<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of YoutubeController
 *
 * @author marcw
 */
class YoutubeController {

	public static function Create() {
		// Check for accses
		User::CheckLogin();
		$Multimedia = new Youtube();
		$access = User::getSessionAccses();
		if (!$Multimedia->hasAccsesToModify($access)) {
			Header::ResponseCode(Header::UNAUTHORIZED);
		}

// Update
		if (isset($_GET["id"])) {
			if ($Multimedia->read($_GET["id"])) {
				$Data = array(
					"Youtubelink" => $Multimedia->getyoutubeURLString(),
					"titleEnglish" => $Multimedia->getTitleEnglish(),
					"descriptionEnglish" => $Multimedia->getDescriptionEnglish(),
					"titleArabic" => $Multimedia->getTitleArabic(),
					"descriptionArabic" => $Multimedia->getDescriptionArabic()
				);
			} else {
				Header::ResponseCode(Header::NOT_FOUND);
				exit;
			}
		}

		if (valAllNotnull()) {

			// setting the data
			$iscorrect = array(
				"Youtubelink" => (bool) $Multimedia->setyoutubeID($_POST["Youtubelink"]),
				"titleEnglish" => (bool) $Multimedia->setTitleEnglish($_POST["titleEnglish"]),
				"descriptionEnglish" => (bool) $Multimedia->setDescriptionEnglish($_POST["descriptionEnglish"]),
				"titleArabic" => (bool) $Multimedia->setTitleArabic($_POST["titleArabic"]),
				"descriptionArabic" => (bool) $Multimedia->setDescriptionEnglish($_POST["descriptionArabic"]));


			// set the publish or aprove or creat
			$Multimedia->setDisplayFromSession($access);
			$passed = FALSE;
			// check if the imput is valid
			if (Validation::valAll($iscorrect)) {

				if (isset($_GET["id"])) {
					$passed = (bool) $Multimedia->update();
					if ($passed) {
						$x = new Updates;
						$x->setEditorID(User::getSessionUserID());
						$x->setTargetType(Updates::TARGET_TYPE_YOUTUBE);
						$x->setTargetID($Multimedia->getId());
						$x->setMessageType(Updates::MESSAGE_TYPE_UPDATE);
						$x->create();

						$y = new Notification;
						$y->setUserID($Multimedia->getWriterID());
						$y->setSource(Notification::SOURCE_MULTIMEDIA);
						$y->setsourceID($Multimedia->getId());
						$y->setMessage("Multimedia was updated by " . User::getSessionUserFullName());
						$y->create();
					}
				} else {
					$Multimedia->setWriterID(User::getSessionUserID());
					$passed = (bool) $Multimedia->create();
				}
			}

			// check if every thing went right
			if ($passed) {
				Header::Location("multimedia.php?id=" . $Multimedia->getId());
				exit;
			} else {
				$Data = array(
					"Youtubelink" => $_POST["Youtubelink"],
					"titleEnglish" => $_POST["titleEnglish"],
					"descriptionEnglish" => $_POST["descriptionEnglish"],
					"titleArabic" => $_POST["titleArabic"],
					"descriptionArabic" => $_POST["descriptionArabic"]
				);
			}
		}

		function valAllNotnull() {
			return
					isset($_POST["Youtubelink"]) &&
					isset($_POST["titleEnglish"]) &&
					isset($_POST["descriptionEnglish"]) &&
					isset($_POST["titleArabic"]) &&
					isset($_POST["descriptionArabic"]);
		}

		return $iscorrect;
	}

}
