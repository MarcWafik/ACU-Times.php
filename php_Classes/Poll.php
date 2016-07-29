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

	protected $optionQuestionEnglish = array(); // an array of English Questions
	protected $optionQuestionArabic = array(); // an array of Arabic Questions
	protected $optionClicked = array(); // an array of how many times that question got clicked

	public function init() {
		parent::init();
		$this->optionQuestionEnglish = array();
		$this->optionQuestionArabic = array();
		$this->optionClicked = array();
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
	public function addOption($Question) {
		//if  is any not set
		if (!(isset($this->optionClicked) && isset($this->optionQuestionEnglish) && isset($this->optionQuestionArabic))) {
			$this->optionClicked = array();
			$this->optionQuestionEnglish = array();
			$this->optionQuestionArabic = array();
		}
		// if parameter is correct
		if (count($this->optionQuestionEnglish) <= 4 && Validation::isNumMinMaxLenth($Question, 2, 100)) {
			array_push($this->optionQuestionEnglish, htmlspecialchars($Question));
			array_push($this->optionClicked, 0);
			return TRUE;
		}
		return FALSE;
	}

	public function deleteOption($Location) {
		if (isValidLocation($Location)) {
			unset($this->optionQuestionEnglish[(int) $Location]);
			unset($this->optionClicked[(int) $Location]);
			return TRUE;
		}
		return FALSE;
	}

	public function incrementOption($Location) {
		if (isValidLocation($Location)) {
			$this->optionClicked[(int) $Location] ++; // increment the index of location
			return TRUE;
		}
		return FALSE;
	}

	public function isValidLocation($Location) {
		return (
				isset($Location) && is_numeric($Location) &&
				isset($this->optionClicked[(int) $Location]) &&
				isset($this->optionQuestionArabic[(int) $Location]) &&
				isset($this->optionQuestionEnglish[(int) $Location]));
	}

}
