<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PollChoice
 *
 * @author marcw
 */
class PollChoice extends Entity implements iCRUD {

	protected $textEnglish;
	protected $textArabic;
	protected $votes;
	protected $PollID;

	public function init() {
		$this->id = 0;
		$this->textEnglish = "";
		$this->textArabic = "";
		$this->votes = 0;
	}
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
	public function increment() {
		if (!isset($this->votes)) {
			$this->votes = 1;
		} else {
			$this->votes ++;
		}
	}

	public function setText($textEnglish, $textArabic) {
		return setTextEnglish($textEnglish) && setTextArabic($textArabic);
	}

	public function setTextEnglish($textEnglish) {
		if (isset($textEnglish) && Validation::isStringMinMaxLenth($textEnglish, 2, 32)) {
			$this->textEnglish = htmlspecialchars($textEnglish);
			return TRUE;
		}

		return FALSE;
	}

	public function setTextArabic($textArabic) {
		if (isset($textArabic) && Validation::isStringMinMaxLenth($textArabic, 2, 32)) {
			$this->textArabic = htmlspecialchars($textArabic);
			return TRUE;
		}

		return FALSE;
	}

	function setPollID($PollID) {
		$this->PollID = $PollID;
	}

//===================================================GET===================================================
	function getVotes() {
		return $this->votes;
	}

	function getPollID() {
		return $this->PollID;
	}

	public function getTextEnglish() {
		return $this->textEnglish;
	}

	public function getTextArabic() {
		return $this->textArabic;
	}

}
