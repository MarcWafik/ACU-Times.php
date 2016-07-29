<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Poll
 *
 * @author marcw
 */
class Poll extends EntityArticle implements iCRUD {

	protected $choices = array(); // an array of poll choices

	public function init() {
		parent::init();
		$this->choices = array();
	}

//==================================================CRUD===================================================

	public function create() {
		
	}

	public function read($id) {
		
	}

	public function update() {
		
	}

	public function delete() {
		
	}

	public function search($imput) {
		
	}

//===================================================SET===================================================
	public function addOption(PollChoice $opt) {
		array_push($this->choices, $opt);
		return TRUE;
	}

}

class PollChoice {

	private $id;
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
	}

	public function setTextArabic($textArabic) {
		$this->textArabic = $textArabic;
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

}
