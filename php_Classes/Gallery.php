<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gallery
 *
 * @author marcw
 */
class Gallery extends EntityArticle implements iCRUD {

	protected $imageNumber; // how many images  max is 99 (just for db)

	const DB_TABLE_NAME = "gallery";

	function __construct() {
		$this->__init();
	}

	public function __init() {
		parent::__init();
		$this->imageNumber = 0;
	}

	protected function fillFromAssoc($DBrow) {
		parent::fillFromAssoc($DBrow);
		$this->imageNumber = $DBrow['imageNumber'];
	}

	protected function bindParamClass($stmt) {
		parent::bindParamClass($stmt);
		$stmt->bindParam('imageNumber', $this->imageNumber);
	}

//==================================================CRUD===================================================
	public function create() {
		return $this->Do_comand_Update_Creat("INSERT INTO " . static::DB_TABLE_NAME . "
				(	titleEnglish, 
					titleArabic, 
					display, 
					writerID, 
					imageNumber, 
				) VALUES ( 
					:titleEnglish, 
					:titleArabic, 
					:display, 
					:writerID, 
					:imageNumber, 
				)", FALSE, TRUE);
	}

	public function update() {
		return $this->Do_comand_Update_Creat("UPDATE " . static::DB_TABLE_NAME . " SET 
					titleEnglish = :titleEnglish, 
					titleArabic = :titleArabic, 
					display = :display, 
					writerID = :writerID, 
					imageNumber = :imageNumber, 
				WHERE id=:id", TRUE, FALSE);
	}

	public function hasAccsesToModify(Accses $Accses) {
		return $this->hasAccsesToModify_private($Accses->getArticle());
	}

	public function setDisplayFromSession(Accses $Accses) {
		$this->display = $Accses->getGallery();
		return TRUE;
	}

//===================================================SET===================================================


	public function setImageNumber($imageNumber) {
		if (isset($imageNumber) && Validation::isNumInRange($imageNumber, 0, 9)) {
			$this->imageNumber = (int) $imageNumber;
			return TRUE;
		}
		return FALSE;
	}

//===================================================GET===================================================

	public function getViews() {
		return $this->views;
	}

}
