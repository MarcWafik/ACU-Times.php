<?php

use EntityArticle;

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
class Article extends EntityArticle implements iCRUD {

	protected $body;
	protected $brief;
	protected $youtubeID;
	protected $categoryID;
	protected $language; //0 for ENG  1 for Arabic
	protected $importance;
	protected $imageNumber;

//==================================================CRUD===================================================

	public function creat() {
		
	}

	public function delete() {
		
	}

	public function read($id) {
		
	}

	public function search($in) {
		
	}

	public function update() {
		
	}

//===================================================SET===================================================
	public function setBody($body) {
		if (isset($body) && strlen($body) < 256) {
			$this->body = htmlspecialchars($body);
			return TRUE;
		}
		return FALSE;
	}

	public function setBrief($breif) {
		if (isset($breif) && strlen($breif) < 256) {
			$this->breif = htmlspecialchars($breif);
			return TRUE;
		}
		return FALSE;
	}

	public function setyoutubeID($youtubeLink) {
		if (isset($youtubeLink) && strlen($youtubeLink) < 256 && preg_match('/(?:https?:\/\/)?(?:youtu\.be\/|(?:www\.)?youtube\.com\/watch(?:\.php)?\?.*v=)([a-zA-Z0-9\-_]+)/', $youtubeLink)) {
			$this->youtubeID = Youtube::ExtractYoutubeID($youtubeLink);
			return TRUE;
		} else if (isset($youtubeLink) && $youtubeLink == "") {
			$this->youtubeID = "";
			return TRUE;
		}
		return FALSE;
	}

	public function setCategoryID($categoryID) {
		$this->categoryID = $categoryID;
		error on purpose
	}

	public function setLanguage($language) {
		if (isset($language) && (strtoupper($language) == "AR" || strtoupper($language) == "A")) {
			$this->language = 1;
		} else {
			$this->language = 0;
		}
		return TRUE;
	}

	public function setImportance($importance) {
		if (isset($importance) && is_numeric($importance) && (int) $importance <= 10 && (int) $importance >= 1) {
			$this->importance = $importance;
			return TRUE;
		}
		return FALSE;
	}

	public function setImageNumber($imageNumber) {
		if (isset($imageNumber) && is_numeric($imageNumber) && (int) $imageNumber <= 10 && (int) $imageNumber >= 0) {
			$this->imageNumber = $imageNumber;
			return TRUE;
		}
		return FALSE;
	}

//===================================================GET===================================================
	public function getBody() {
		return $this->body;
	}

	public function getBrief() {
		return $this->brief;
	}

	public function getyoutubeID() {
		return $this->youtubeID;
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
