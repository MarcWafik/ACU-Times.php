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

	private $textEnglish;
	private $textArabic;
	private $votes;

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

	public function setTextEnglish($textEnglish) {
		$this->textEnglish = $textEnglish;
		return TRUE;
	}

	public function setTextArabic($textArabic) {
		$this->textArabic = $textArabic;
		return TRUE;
	}

//===================================================GET===================================================
	public function getId() {
		return $this->id;
	}

	public function getTextEnglish() {
		return $this->textEnglish;
	}

	public function getTextArabic() {
		return $this->textArabic;
	}

	public function getClicked() {
		return $this->votes;
	}
//==================================================CRUD===================================================
	public function create() {
		
	}

	public function update() {
		
	}

}
