<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Article
 *
 * @author marcw
 */
class Article extends Youtube implements iCRUD {

	protected $categoryID;
	protected $language; //0 for ENG  1 for Arabic
	protected $importance; // 0~9
	protected $imageNumber;
	protected $views = 0;

	public function init() {
		parent::init();
		$this->categoryID = 0;
		$this->language = 0;
		$this->importance = 0; // 0~9
		$this->imageNumber = 0;
		$this->views = 0;
	}

//=================================================Const===================================================
	const LANGUAGE_ENGLISH = 0;
	const LANGUAGE_ARABIC = 1;
	const LANGUAGE_Both = 2;

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

	public function setyoutubeID($youtubeLink) {
		if (isset($youtubeLink) && $youtubeLink == "") {
			$this->youtubeID = "";
			return TRUE;
		}
		return parent::setyoutubeID($youtubeLink);
	}

	public function setCategoryID($categoryID) {
		if (isset($categoryID) && Validation::isNumLagerThan($categoryID, 0)) {
			$this->categoryID = (int) $categoryID;
			return TRUE;
		}
		return FALSE;
	}

	public function setLanguage($language) {
		if (isset($language) && Validation::isNumInRange($language, 0, 2)) {
			$this->language = (int) $language;
		}
		return TRUE;
	}

	public function setImportance($importance) {
		if (isset($importance) && Validation::isNumInRange($importance, 0, 9)) {
			$this->importance = (int) $importance;
			return TRUE;
		}
		return FALSE;
	}

	public function setImageNumber($imageNumber) {
		if (isset($imageNumber) && Validation::isNumInRange($imageNumber, 0, 9)) {
			$this->imageNumber = (int) $imageNumber;
			return TRUE;
		}
		return FALSE;
	}

	public function incrementViews() {
		if (!isset($this->views)) {
			$this->views = 0;
		} else {
			$this->views++;
		}
	}

//===================================================GET===================================================

	public function getViews() {
		return $this->views;
	}

	public function getCategoryID() {
		return $this->categoryID;
	}

	public function getLanguage() {
		return $this->language;
	}

	public function getImportance() {
		return $this->importance;
	}

	public function getImageNumber() {
		return $this->imageNumber;
	}

}
