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
	private $sourceID;
	private $userID;

//=================================================Const===================================================
	const IMPORTANCE_INFO = 0;
	const IMPORTANCE_SUCCESS = 1;
	const IMPORTANCE_WARNING = 2;
	const IMPORTANCE_DANGER = 3;
	const SOURCE_USER = 0;
	const SOURCE_ARTICLE = 1;
	const SOURCE_GALLERY = 2;
	const SOURCE_POLL = 3;
	const SOURCE_MULTIMEDIA = 4;
	const DB_TABLE_NAME = "notification";

	function __construct() {
		$this->__init();
	}

	public function __init() {
		parent::__init();
		$this->message = "";
		$this->importance = 0;
		$this->source = 0;
		$this->sourceID = 0;
		$this->userID = 0;
	}

	protected function fillFromAssoc($DBrow) {
		parent::fillFromAssoc($DBrow);

		$this->message = $DBrow['message'];
		$this->importance = $DBrow['importance'];
		$this->source = $DBrow['source'];
		$this->sourceID = $DBrow['sourceID'];
		$this->userID = $DBrow['userID'];
	}

	protected function bindParamClass($stmt) {
		parent::bindParamClass($stmt);

		$stmt->bindParam('message', $this->message);
		$stmt->bindParam('importance', $this->importance);
		$stmt->bindParam('source', $this->source);
		$stmt->bindParam('sourceID', $this->sourceID);
		$stmt->bindParam('userID', $this->userID);
	}

//==================================================CRUD===================================================
	public function create() {
		return $this->Do_comand_Update_Creat("INSERT INTO " . static::DB_TABLE_NAME . "
				(	message, 
					importance, 
					source, 
					sourceID, 
					userID
				) VALUES ( 
					:message, 
					:importance, 
					:source, 
					:sourceID, 
					:userID
				)", FALSE, TRUE);
	}

	public function update() {
		return $this->Do_comand_Update_Creat("UPDATE " . static::DB_TABLE_NAME . " SET 
					message = :message, 
					importance = :importance, 
					source = :source, 
					sourceID = sourceID, 
					userID = :userID
				WHERE id=:id", TRUE, FALSE);
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

	public function setUserID($ID) {
		if (Validation::isNumLagerThan($ID, 0)) {
			$this->userID = (int) $ID;
			return TRUE;
		}
		return FALSE;
	}

	public function setsourceID($ID) {
		if (Validation::isNumLagerThan($ID, 0)) {
			$this->sourceID = (int) $ID;
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

	public function getUserID() {
		return $this->userID;
	}

	function getSourceID() {
		return $this->sourceID;
	}

}
