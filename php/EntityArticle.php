<?php

use Entity;

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

	protected $title; //128
	protected $display;
	protected $writerID;
	protected $editorID;

//===================================================SET===================================================
	public function setTitle($title) {
		$this->Title = $title;
		if (isset($title) && strlen($title) < 128) {
			$this->title = htmlspecialchars($title);
			return TRUE;
		}
		return FALSE;
	}

	public function setDisplay($display) {
		$this->display = $display;
	}

	public function setWriterID($writerID) {
		$this->writerID = $writerID;
	}

	public function setEditorID($editorID) {
		$this->editorID = $editorID;
	}

//===================================================GET===================================================
	public function getTitle() {
		return $this->Title;
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
