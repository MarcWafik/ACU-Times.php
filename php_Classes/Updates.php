<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Updates
 *
 * @author marcw
 */
class Updates extends Entity implements iCRUD {

	protected $editorID;
	protected $targetID;
	protected $targetType;
	protected $MessageType;

	function __construct() {
		$this->__init();
	}

	public function __init() {
		parent::__init();

		$this->editorID = 0;
		$this->targetID = 0;
		$this->targetType = 0;
		$this->MessageType = 0;
	}

	protected function fillFromAssoc($DBrow) {
		parent::fillFromAssoc($DBrow);

		$this->editorID = $DBrow['editorID'];
		$this->targetID = $DBrow['targetID'];
		$this->targetType = $DBrow['targetType'];
		$this->MessageType = $DBrow['MessageType'];
	}

	protected function bindParamClass($stmt) {
		parent::bindParamClass($stmt);

		$stmt->bindParam('editorID', $this->editorID);
		$stmt->bindParam('targetID', $this->targetID);
		$stmt->bindParam('targetType', $this->targetType);
		$stmt->bindParam('MessageType', $this->MessageType);
	}

//=================================================Const===================================================

	const DB_TABLE_NAME = "updates";
	const TARGET_TYPE_POLL = 1;
	const TARGET_TYPE_YOUTUBE = 2;
	const TARGET_TYPE_GALLERY = 3;
	const TARGET_TYPE_ARTICLE = 4;
	const TARGET_TYPE_USER = 5;
	//=================================
	const MESSAGE_TYPE_RESETPW = 1;
	const MESSAGE_TYPE_DELETE = 2;
	const MESSAGE_TYPE_UPDATE = 3;
	const MESSAGE_TYPE_PUBLISH = 4;
	const MESSAGE_TYPE_APPROVE = 5;

//==================================================CRUD===================================================
	public function create() {
		return $this->Do_comand_Update_Creat("INSERT INTO " . static::DB_TABLE_NAME . "
				(	editorID,
					targetID,
					targetType,
					MessageType
				) VALUES ( 
					:editorID,
					:targetID,
					:targetType,
					:MessageType
				)", FALSE, TRUE);
	}

	public function update() {
		return $this->Do_comand_Update_Creat("UPDATE " . static::DB_TABLE_NAME . " SET 
					editorID = :editorID,
					targetID = :targetID,
					targetType = :targetType,
					MessageType = :MessageType
				WHERE id=:id", TRUE, FALSE);
	}

//===================================================SET===================================================
	function setEditorID($editorID) {
		$this->editorID = $editorID;
	}

	function setTargetID($targetID) {
		$this->targetID = $targetID;
	}

	function setTargetType($targetType) {
		$this->targetType = $targetType;
	}

	function setMessageType($MessageType) {
		$this->MessageType = $MessageType;
	}

//===================================================GET===================================================
	function getEditorID() {
		return $this->editorID;
	}

	function getTargetID() {
		return $this->targetID;
	}

	function getTargetType() {
		return $this->targetType;
	}

	function getMessageType() {
		return $this->MessageType;
	}

}
