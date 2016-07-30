<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GalleryController
 *
 * @author marcw
 */
class GalleryController {

	public static function Create() {
		User::CheckLogin();
		$Gallery = new Gallery();
		$access = User::getSessionAccses();
		if (!$Gallery->hasAccsesToModify($access)) {
			Header::ResponseCode(Header::UNAUTHORIZED);
		}

// Update
		if (isset($_GET["id"])) {
			if ($Gallery->read($_GET["id"])) {
				$Data = array(
					"titleEnglish" => $Gallery->getTitleEnglish(),
					"titleArabic" => $Gallery->getTitleArabic()
				);
				$Gallery->setImageNumber(1);
			} else {
				Header::ResponseCode(Header::NOT_FOUND);
				exit;
			}
		}

		if (isset($_POST["titleEnglish"]) && isset($_POST["titleArabic"])) {
			// setting the data
			$iscorrect = array(
				"titleEnglish" => (bool) $Gallery->setTitleEnglish($_POST["titleEnglish"]),
				"titleArabic" => (bool) $Gallery->setTitleArabic($_POST["titleArabic"])
			);


			// set the publish or aprove or creat
			$Gallery->setDisplayFromSession($access);
			$passed = FALSE;
			// check if the imput is valid
			if (Validation::valAll($iscorrect)) {

				if (isset($_GET["id"])) {
					$passed = (bool) $Gallery->update();
					if ($passed) {
						$x = new Updates;
						$x->setEditorID(User::getSessionUserID());
						$x->setTargetType(Updates::TARGET_TYPE_GALLERY);
						$x->setTargetID($Gallery->getId());
						$x->setMessageType(Updates::MESSAGE_TYPE_UPDATE);
						$x->create();

						$y = new Notification;
						$y->setUserID($Gallery->getWriterID());
						$y->setSource(Notification::SOURCE_GALLERY);
						$y->setsourceID($Gallery->getId());
						$y->setMessage("Gallery was updated succsesfuly");
						$y->create();
					}
				} else {
					$Gallery->setWriterID(User::getSessionUserID());
					$Gallery->setImageNumber(1);
					$passed = (bool) $Gallery->create();
					rename("images\\gallery\\upload.jpg", "images\\gallery\\" . $Gallery->getId() . "-0.jpg");
				}
			}

			// check if every thing went right
			if ($passed) {
				Header::Location("Location: gallery.php");
				exit;
			} else {
				$Data = array(
					"titleEnglish" => $_POST["titleEnglish"],
					"titleArabic" => $_POST["titleArabic"]
				);
			}
		}
		return $iscorrect;
	}

}
