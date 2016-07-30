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
		$this->display = 0;
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
	const DISPLAY_DRAFT = 0;
	const DISPLAY_NEW = 1;
	const DISPLAY_DENIED = 2;
	const DISPLAY_APPROVED = 3;
	const DISPLAY_PUBLISHED = 4;
	const DISPLAY_HIDEN = 5;

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
		if (Validation::isNumInRange($display, 0, 4)) {
			$this->display = (int) $display;
		}
		return FALSE;
	}

	public function setWriterID($writerID) {
		if (Validation::isNumLagerThan($writerID, 0)) {
			$this->writerID = (int) $writerID;
		}
		return FALSE;
	}

//===================================================GET===================================================
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
