<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comment
 *
 * @author marcw
 */
class Comment extends EntityUser implements iCRUD {

	protected $message; //2048
	protected $for;
	protected $targetID;

	public function init() {
		parent::init();
		$this->message = "";
		$this->for = 0;
		$this->targetID = 0;
	}

//=================================================Const===================================================

	const FOR_ARTICLE = 0;
	const FOR_YOUTUBE = 1;
	const FOR_CONTACTUS = 2;

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
		if (isset($message) && strlen($message) < 2048) {
			$this->message = htmlspecialchars($message);
			return TRUE;
		}
		return FALSE;
	}

	public function setTargetID($targetID) {
		if (Validation::isNumLagerThan($targetID, 0)) {
			$this->targetID = (int) $targetID;
		}
		return FALSE;
	}

	public function setFor($for) {
		if (Validation::isNumInRange($for, 0, 2)) {
			$this->for = (int) $for;
		}
		return FALSE;
	}

//===================================================GET===================================================
	public function getMessage() {
		return $this->message;
	}

	public function getTargetID() {
		return $this->targetID;
	}

	public function getFor() {
		return $this->for;
	}

}
