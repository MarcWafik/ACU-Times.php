<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PollController
 *
 * @author marcw
 */
class PollController {

	public static function Create() {
		// Check for accses
		User::CheckLogin();
		$poll = new Poll();
		$access = User::getSessionAccses();
		if (!$poll->hasAccsesToModify($access)) {
			Header::ResponseCode(Header::UNAUTHORIZED);
		}

		$choises = $poll->getArrChoices();
		$choise = new PollChoice();
// Update
		if (isset($_GET["id"])) {
			if ($poll->read($_GET["id"])) {
				$Data = array(
					"titleEnglish" => $poll->getTitleEnglish(),
					"titleArabic" => $poll->getTitleArabic(),
					"choice1_en" => $choises[1],
					"choice1_ar" => $choises['choice1_ar'],
					"choice2_en" => $choises['choice2_en'],
					"choice2_ar" => $choises['4'],
					"choice3_en" => $choises['5'],
					"choice3_ar" => $choises['6'],
					"choice4_en" => $choises['7'],
					"choice4_ar" => $choises['8']
				);
			} else {
				Header::ResponseCode(Header::NOT_FOUND);
				exit;
			}
		}

		if (isset($_POST["submit"])) {

			// setting the data
			$iscorrect = array(
				"titleEnglish" => (bool) $poll->setCategoryID($_POST["titleEnglish"]),
				"titleArabic" => (bool) $poll->setImportance($_POST["titleArabic"]),
				"choice1_en" => (bool) $poll->setyoutubeID($_POST["choice1_en"]),
				"choice1_ar" => (bool) $poll->setLanguage($_POST["choice1_ar"]),
				"choice2_en" => (bool) $poll->setCategoryID($_POST["choice2_en"]),
				"choice2_ar" => (bool) $poll->setImportance($_POST["choice2_ar"]),
				"choice3_en" => (bool) $poll->setyoutubeID($_POST["choice3_en"]),
				"choice3_ar" => (bool) $poll->setLanguage($_POST["choice3_ar"]),
				"choice4_en" => (bool) $poll->setCategoryID($_POST["choice4_en"]),
				"choice4_ar" => (bool) $poll->setImportance($_POST["choice4_ar"]));



			// set the publish or aprove or creat
			$poll->setDisplayFromSession($access);
			$passed = FALSE;
			// check if the imput is valid
			if (Validation::valAll($iscorrect)) {

				if (isset($_GET["id"])) {
					$passed = (bool) $poll->update();
				} else {
					$poll->setWriterID(User::getSessionUserID());
					$passed = (bool) $poll->create();
				}
			}

			// check if every thing went right
			if ($passed) {
				header("Location: article.php?id=" . $poll->getId());//<<<<<<<<<<<<<<<<<<======================================================
				exit;
			} else {
				$Data = array(
					"titleEnglish" => $_POST["titleEnglish"],
					"titleArabic" => $_POST["titleArabic"],
					"choice1_en" => $_POST["choice1_en"],
					"choice1_ar" => $_POST["choice1_ar"],
					"choice2_en" => $_POST["choice2_en"],
					"choice2_ar" => $_POST["choice2_ar"],
					"choice3_en" => $_POST["choice3_en"],
					"choice3_ar" => $_POST["choice3_ar"],
					"choice4_en" => $_POST["choice4_en"],
					"choice4_ar" => $_POST["choice4_ar"]
				);
			}
		}

		return $iscorrect;
	}

}
