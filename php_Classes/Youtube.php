<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Youtube
 *
 * @author marcw
 */
class Youtube extends EntityArticle implements iCRUD {

	protected $youtubeID;
	protected $descriptionEnglish;
	protected $descriptionArabic;

	const DB_TABLE_NAME = "youtube";

	function __construct() {
		$this->__init();
	}

	public function __init() {
		parent::__init();
		$this->youtubeID = "";
		$this->descriptionEnglish = "";
		$this->descriptionArabic = "";
		$this->ArrComments = array();
	}

	protected function fillFromAssoc($DBrow) {
		parent::fillFromAssoc($DBrow);
		$this->youtubeID = $DBrow['youtubeID'];
		$this->descriptionEnglish = $DBrow['descriptionEnglish'];
		$this->descriptionArabic = $DBrow['descriptionArabic'];
	}

	protected function bindParamClass($stmt) {
		parent::bindParamClass($stmt);
		$stmt->bindParam('youtubeID', $this->youtubeID);
		$stmt->bindParam('descriptionEnglish', $this->descriptionEnglish);
		$stmt->bindParam('descriptionArabic', $this->descriptionArabic);
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
					descriptionArabic
				) VALUES ( 
					:titleEnglish, 
					:titleArabic, 
					:display, 
					:writerID, 
					:youtubeID, 
					:descriptionEnglish, 
					:descriptionArabic 
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
					descriptionArabic = :descriptionArabic
				WHERE id=:id", TRUE, FALSE);
	}

	public function search($imput) {
		
	}

//===================================================SET===================================================
	public function setyoutubeID($youtubeLink) {
		if (isset($youtubeLink) && strlen($youtubeLink) < 256 && preg_match('/(?:https?:\/\/)?(?:youtu\.be\/|(?:www\.)?youtube\.com\/watch(?:\.php)?\?.*v=)([a-zA-Z0-9\-_]+)/', $youtubeLink)) {
			$this->youtubeID = Youtube::ExtractYoutubeID($youtubeLink);
			return TRUE;
		}
		return FALSE;
	}

	public function setDescriptionEnglish($description) {
		if (Validation::isStringMinMaxLenth($description, 0, 256)) {
			$this->descriptionEnglish = htmlspecialchars($description);
			return TRUE;
		}
		return FALSE;
	}

	public function setDescriptionArabic($description) {
		if (Validation::isStringMinMaxLenth($description, 0, 256)) {
			$this->descriptionArabic = htmlspecialchars($description);
			return TRUE;
		}
		return FALSE;
	}

	public function setDisplayFromSession(Accses $Accses) {
		$this->display = $Accses->getYoutube();
	}

//===================================================GET===================================================
	public function getyoutubeID() {
		return $this->youtubeID;
	}

	public function getyoutubeURLString() {
		return "https://www.youtube.com/watch?v=" . $this->youtubeID;
	}

	public function getyoutubeEmbededString() {
		return "https://www.youtube.com/embed/" . $this->youtubeID;
	}

	public function getDescriptionEnglish() {
		return $this->descriptionEnglish;
	}

	public function getDescriptionArabic() {
		return $this->descriptionArabic;
	}

	static function ExtractYoutubeID($url) {
		$ID_youtube = array();
		parse_str(parse_url($url, PHP_URL_QUERY), $ID_youtube);
		return $ID_youtube['v'];
	}

	public function hasAccsesToModify(Accses $Accses) {
		return $this->hasAccsesToModify_private($Accses->getYoutube());
	}

}
