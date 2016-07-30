<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PollChoice
 *
 * @author marcw
 */
class PollChoice extends Entity implements iCRUD {

	protected $textEnglish;
	protected $textArabic;
	protected $votes;
	protected $PollID;

	public function init() {
		$this->id = 0;
		$this->textEnglish = "";
		$this->textArabic = "";
		$this->votes = 0;
	}

//===================================================SET===================================================
	public function increment() {
		if (!isset($this->votes)) {
			$this->votes = 1;
		} else {
			$this->votes ++;
		}
	}

	public function setText($textEnglish, $textArabic) {
		return setTextEnglish($textEnglish) && setTextArabic($textArabic);
	}

	public function setTextEnglish($textEnglish) {
		if (isset($textEnglish) && Validation::isStringMinMaxLenth($textEnglish, 2, 32)) {
			$this->textEnglish = htmlspecialchars($textEnglish);
			return TRUE;
		}

		return FALSE;
	}

	public function setTextArabic($textArabic) {
		if (isset($textArabic) && Validation::isStringMinMaxLenth($textArabic, 2, 32)) {
			$this->textArabic = htmlspecialchars($textArabic);
			return TRUE;
		}

		return FALSE;
	}

	function setPollID($PollID) {
		$this->PollID = $PollID;
	}

//===================================================GET===================================================
	function getVotes() {
		return $this->votes;
	}

	function getPollID() {
		return $this->PollID;
	}

	public function getTextEnglish() {
		return $this->textEnglish;
	}

	public function getTextArabic() {
		return $this->textArabic;
	}

}
