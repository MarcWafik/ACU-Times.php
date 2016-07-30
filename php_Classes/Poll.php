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

	protected $arrChoices = array(); // an array of poll choices

	function __construct() {
		$this->__init();
	}

	public function __init() {
		parent::__init();
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
	public function addOption($textEnglish, $textArabic) {
		$temp = new PollChoice();
		if ($temp->setText($textEnglish, $textArabic)) {
			array_push($this->arrChoices, $temp);
			return TRUE;
		}
		return False;
	}

	public function clearAllOption() {
		$this->arrChoices = array();
		return TRUE;
	}

	public function setDisplayFromSession(Accses $Accses) {
		$this->display = $Accses->getPoll();
	}

//===================================================GET===================================================
	public function getArrChoices() {
		return $this->arrChoices;
	}

	public function hasAccsesToModify(Accses $Accses) {
		return $this->hasAccsesToModify_private($Accses->getPoll());
	}

	public function isValidPoll() {
		return count($this->arrChoices) >= 2;
	}

}
