<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Accses
 *
 * @author marcw
 */
class Accses extends Entity implements iCRUD {

	protected $poll;
	protected $article;
	protected $youtube;
	protected $gallery;
	protected $user;
	protected $titleEnglish;
	protected $titleArabic;

	function __construct() {
		$this->__init();
	}

	public function __init() {
		$this->poll = 0;
		$this->article = 0;
		$this->youtube = 0;
		$this->gallery = 0;
		$this->user = 0;
		$this->titleEnglish = "";
		$this->titleArabic = "";
	}

	protected function fillFromAssoc($DBrow) {
		$this->poll = $DBrow['poll'];
		$this->article = $DBrow['article'];
		$this->youtube = $DBrow['youtube'];
		$this->gallery = $DBrow['gallery'];
		$this->user = $DBrow['user'];
		$this->titleEnglish = $DBrow['titleEnglish'];
		$this->titleArabic = $DBrow['titleArabic'];
	}

	protected function bindParamClass($stmt) {
		parent::bindParamClass($stmt);
		$stmt->bindParam(':poll', $this->poll);
		$stmt->bindParam(':article', $this->article);
		$stmt->bindParam(':youtube', $this->youtube);
		$stmt->bindParam(':gallery', $this->gallery);
		$stmt->bindParam(':user', $this->user);
		$stmt->bindParam(':titleEnglish', $this->titleEnglish);
		$stmt->bindParam(':titleArabic', $this->titleArabic);
	}

//=================================================Const===================================================

	const DB_TABLE_NAME = "accses";
	const READ = 0;
	const CREAT = 1;
	const UPDATE = 2;
	const FULL = 3;

//==================================================CRUD===================================================
	public function create() {
		
	}

	public function update() {
		
	}

//===================================================SET===================================================
//===================================================GET===================================================
	function getPoll() {
		return $this->poll;
	}

	function getArticle() {
		return $this->article;
	}

	function getYoutube() {
		return $this->youtube;
	}

	function getGallery() {
		return $this->gallery;
	}

	function getUser() {
		return $this->user;
	}

	function getTitleEnglish() {
		return $this->titleEnglish;
	}

	function getTitleArabic() {
		return $this->titleArabic;
	}

}
