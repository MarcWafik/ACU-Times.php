<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Notification
 *
 * @author marcw
 */
class Notification extends Entity implements iCRUD {

	private $message;
	private $importance;
	private $source;
	private $targetID;

	public function _init() {
		parent::_init();
		$this->message = "";
		$this->importance = 0;
		$this->source = 0;
		$this->targetID = 0;
	}

//=================================================Const===================================================
	const IMPORTANCE_INFO = 0;
	const IMPORTANCE_SUCCESS = 1;
	const IMPORTANCE_WARNING = 2;
	const IMPORTANCE_DANGER = 3;
	const SOURCE_USER = 0;
	const SOURCE_COMMENT = 1;
	const SOURCE_ARTICLE = 2;

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


	public function setMessage($message) {
		if (Validation::isStringMinMaxLenth($message, 5, 256)) {
			$this->message = htmlspecialchars($message);
			return TRUE;
		}
		return FALSE;
	}

	public function setImportance($importance) {
		if (Validation::isNumInRange($importance, 0, 3)) {
			$this->importance = (int) $importance;
			return TRUE;
		}
		return FALSE;
	}

	public function setSource($source) {
		if (Validation::isNumInRange($source, 0, 2)) {
			$this->source = (int) $source;
			return TRUE;
		}
		return FALSE;
	}

	public function setTargetID($ID) {
		if (Validation::isNumLagerThan($ID, 0)) {
			$this->targetID = (int) $ID;
			return TRUE;
		}
		return FALSE;
	}

//===================================================GET===================================================
	public function getMessage() {
		return $this->message;
	}

	public function getImportance() {
		return $this->importance;
	}

	public function getSource() {
		return $this->source;
	}

	public function getTargetID() {
		return $this->targetID;
	}

}
