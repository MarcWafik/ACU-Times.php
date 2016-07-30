<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EntityArticle
 *
 * @author marcw
 */
abstract class EntityArticle extends Entity {

	protected $titleEnglish; //64
	protected $titleArabic; //64
	protected $display; //1
	protected $writerID;
	protected $arrUpdates;

	public function __init() {
		parent::__init();
		$this->titleEnglish = "";
		$this->titleArabic = "";
		$this->display = 1;
		$this->writerID = 0;
	}

	protected function fillFromAssoc($DBrow) {
		parent::fillFromAssoc($DBrow);
		$this->titleEnglish = $DBrow['titleEnglish'];
		$this->titleArabic = $DBrow['titleArabic'];
		$this->display = $DBrow['display'];
		$this->writerID = $DBrow['writerID'];
	}

	protected function bindParamClass($stmt) {
		parent::bindParamClass($stmt);
		$stmt->bindParam('titleEnglish', $this->titleEnglish);
		$stmt->bindParam('titleArabic', $this->titleArabic);
		$stmt->bindParam('display', $this->display);
		$stmt->bindParam('writerID', $this->writerID);
	}

//=================================================Const===================================================
	const DISPLAY_DENIED = 0;
	const DISPLAY_NEW = 1;
	const DISPLAY_APPROVED = 2;
	const DISPLAY_PUBLISHED = 3;
	const TYPE_ARTICLE = 0;
	const TYPE_YOUTUBE = 1;
	const TYPE_POLL = 2;
	const TYPE_GALLERY = 3;

//==================================================CRUD===================================================
	public static function Search($find, $offset = 0, $size = 0) {
		$comand = "SELECT * FROM " . static::DB_TABLE_NAME . " WHERE 
				`titleEnglish` LIKE :find OR 
				`titleArabic` LIKE :find";
		return static::Do_comand_Search($comand, $find, $offset, $size);
	}

	public static function readAllrelatedWriterID($writerID, $offset = 0, $size = 0) {
		$comand = "SELECT * FROM " . static::DB_TABLE_NAME . " WHERE writerID=" . $writerID;
		return static::Do_comand_readAll($comand, $offset, $size);
	}

//===================================================SET===================================================

	public function setTitleEnglish($title) {
		$this->Title = $title;
		if (Validation::isStringMinMaxLenth($title, 4, 64)) {
			$this->titleEnglish = htmlspecialchars($title);
			return TRUE;
		}
		return FALSE;
	}

	public function setTitleArabic($title) {
		$this->Title = $title;
		if (Validation::isStringMinMaxLenth($title, 4, 64)) {
			$this->titleArabic = htmlspecialchars($title);
			return TRUE;
		}
		return FALSE;
	}

	public function setDisplay($display) {
		if (Validation::isNumInRange($display, 0, 3)) {
			$this->display = (int) $display;
			return TRUE;
		}
		return FALSE;
	}

	public function setWriterID($writerID) {
		if (Validation::isNumLagerThan($writerID, 0)) {
			$this->writerID = (int) $writerID;
			return TRUE;
		}
		return FALSE;
	}

	abstract public function setDisplayFromSession(Access $Accses);

	protected function doit_setDisplayFromSession($Accses_Specific) {
		if ($Accses_Specific == Access::APPROVE) {
			$this->display = static::DISPLAY_APPROVED;
			return TRUE;
		} else if ($Accses_Specific == Access::CREATE) {
			$this->display = static::DISPLAY_NEW;
			return TRUE;
		} else if ($Accses_Specific == Access::PUBLISH) {
			$this->display = static::DISPLAY_PUBLISHED;
			return TRUE;
		} else if ($Accses_Specific == Access::FULL) {
			$this->display = static::DISPLAY_PUBLISHED;
			return TRUE;
		}
		return FALSE;
	}

//===================================================GET===================================================
	abstract public function hasAccsesToModify(Access $Accses);

	protected function hasAccsesToModify_private($Accses_unitNumber) {
		$WriterID = User::getSessionUserID();
		return ($this->writerID == $WriterID && $this->display <= $Accses_unitNumber) || $this->display <= $Accses_unitNumber;
	}

	public function getTitleEnglish() {
		return $this->titleEnglish;
	}

	public function getTitleArabic() {
		return $this->titleArabic;
	}

	public function getDisplay() {
		return $this->display;
	}

	public function getWriterID() {
		return $this->writerID;
	}

	public function getEditorID() {
		return $this->editorID;
	}

}
