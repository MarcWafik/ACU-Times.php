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
	protected $editorID;

	public function __init() {
		parent::__init();
		$this->titleEnglish = "";
		$this->titleArabic = "";
		$this->display = 0;
		$this->writerID = 0;
		$this->editorID = 0;
	}

	protected function fillFromAssoc($DBrow) {
		parent::fillFromAssoc($DBrow);
		$this->titleEnglish = $DBrow['titleEnglish'];
		$this->titleArabic = $DBrow['titleArabic'];
		$this->display = $DBrow['display'];
		$this->writerID = $DBrow['writerID'];
		$this->editorID = $DBrow['editorID'];
	}

	protected function bindParamClass($stmt) {
		parent::bindParamClass($stmt);
		$stmt->bindParam('titleEnglish', $this->titleEnglish);
		$stmt->bindParam('titleArabic', $this->titleArabic);
		$stmt->bindParam('display', $this->display);
		$stmt->bindParam('writerID', $this->writerID);
		$stmt->bindParam('editorID', $this->editorID);
	}

//=================================================Const===================================================
	const DISPLAY_NEW = 0;
	const DISPLAY_DENIED = 1;
	const DISPLAY_HIDEN = 2;
	const DISPLAY_SHOWN = 3;

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
		if (Validation::isNumInRange($display, 0, 2)) {
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

	public function setEditorID($editorID) {
		if (Validation::isNumLagerThan($editorID, 0)) {
			$this->editorID = (int) $editorID;
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
