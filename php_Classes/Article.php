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
	protected $bodyEnglish = ""; // max 64k
	protected $bodyArabic = ""; // max 64k

	const DB_TABLE_NAME = "article";

	function __construct() {
		$this->__init();
	}

	public function __init() {
		parent::__init();
		$this->categoryID = 0;
		$this->language = 0;
		$this->importance = 0;
		$this->imageNumber = 0;
		$this->views = 0;
		$this->bodyEnglish = "";
		$this->bodyArabic = "";
	}

	protected function fillFromAssoc($DBrow) {
		parent::fillFromAssoc($DBrow);

		$this->categoryID = $DBrow['categoryID'];
		$this->language = $DBrow['language'];
		$this->importance = $DBrow['importance'];
		$this->imageNumber = $DBrow['imageNumber'];
		$this->views = $DBrow['views'];
		$this->bodyEnglish = $DBrow['bodyEnglish'];
		$this->bodyArabic = $DBrow['bodyArabic'];
	}

	protected function bindParamClass($stmt) {
		parent::bindParamClass($stmt);

		$stmt->bindParam('categoryID', $this->categoryID);
		$stmt->bindParam('language', $this->language);
		$stmt->bindParam('importance', $this->importance);
		$stmt->bindParam('imageNumber', $this->imageNumber);
		$stmt->bindParam('views', $this->views);
		$stmt->bindParam('bodyEnglish', $this->bodyEnglish);
		$stmt->bindParam('bodyArabic', $this->bodyArabic);
	}

//==================================================CRUD===================================================
	public function create() {
		return $this->Do_comand_Update_Creat("INSERT INTO " . static::DB_TABLE_NAME . "
				(	titleEnglish, 
					titleArabic, 
					display, 
					writerID, 
					youtubeID, 
					descriptionEnglish, 
					descriptionArabic, 
					bodyEnglish, 
					bodyArabic, 
					categoryID, 
					language, 
					importance, 
					imageNumber, 
					views
				) VALUES ( 
					:titleEnglish, 
					:titleArabic, 
					:display, 
					:writerID, 
					:youtubeID, 
					:descriptionEnglish, 
					:descriptionArabic, 
					:bodyEnglish, 
					:bodyArabic, 
					:categoryID, 
					:language, 
					:importance, 
					:imageNumber, 
					:views
				)", FALSE, TRUE);
	}

	public function update() {
		return $this->Do_comand_Update_Creat("UPDATE " . static::DB_TABLE_NAME . " SET 
					titleEnglish = :titleEnglish, 
					titleArabic = :titleArabic, 
					display = :display, 
					writerID = :writerID, 
					youtubeID = :youtubeID, 
					descriptionEnglish = :descriptionEnglish, 
					descriptionArabic = :descriptionArabic, 
					bodyEnglish = :bodyEnglish, 
					bodyArabic = :bodyArabic, 
					categoryID = :categoryID, 
					language = :language, 
					importance = :importance, 
					imageNumber = :imageNumber, 
					views = :views
				WHERE id=:id", TRUE, TRUE);
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

	public function hasAccsesToModify(Accses $Accses) {
		return $this->hasAccsesToModify_private($Accses->getArticle());
	}

}
