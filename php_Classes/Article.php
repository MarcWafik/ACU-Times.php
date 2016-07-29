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
	protected $language; //0 for ENG  1 for Arabic 2 for both
	protected $importance; // 0~9
	protected $imageNumber; // how many images  max is 99 (just for db)
	protected $views = 0; // max 11
	protected $bodyEnglish = 0; // max 64k
	protected $bodyArabic = 0; // max 64k

	function __construct() {
		$this->__init();
	}

	public function __init() {
		parent::__init();
		$this->categoryID = 0;
		$this->language = 0;
		$this->importance = 0; // 0~9
		$this->imageNumber = 0;
		$this->views = 0;
	}

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
		if (Language::isValidLang($language)) {
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

	function setBodyEnglish($bodyEnglish) {
		if (Validation::isStringMinMaxLenth($bodyEnglish, 0, 64000)) {
			$this->bodyEnglish = Validation::Sanetize($bodyEnglish);
			return TRUE;
		}
		return FALSE;
	}

	function setBodyArabic($bodyArabic) {
		if (Validation::isStringMinMaxLenth($bodyArabic, 0, 64000)) {
			$this->bodyArabic = Validation::Sanetize($bodyArabic);
			return TRUE;
		}
		return FALSE;
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

	function getBodyEnglish() {
		return $this->bodyEnglish;
	}

	function getBodyArabic() {
		return $this->bodyArabic;
	}

}
