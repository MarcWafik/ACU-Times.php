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
	protected $Comments; // and array of class comment

	public function _init() {
		parent::_init();
		$this->youtubeID = "";
		$this->descriptionEnglish = "";
		$this->descriptionArabic = "";
		$this->Comments = array();
	}

	public function getComments() {
		
	}

	public function addComment(Comment $imput) {
		
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

//===================================================GET===================================================
	public function getyoutubeID() {
		return $this->youtubeID;
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

}
