<?php

class Accses extends Entity implements iCRUD {

	protected $poll;
	protected $article;
	protected $youtube;
	protected $gallery;
	protected $user;
	protected $email;
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
		$this->email = 0;
		$this->titleEnglish = "";
		$this->titleArabic = "";
	}

	protected function fillFromAssoc($DBrow) {
		$this->poll = $DBrow['poll'];
		$this->article = $DBrow['article'];
		$this->youtube = $DBrow['youtube'];
		$this->gallery = $DBrow['gallery'];
		$this->user = $DBrow['user'];
		$this->email = $DBrow['email'];
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
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':titleEnglish', $this->titleEnglish);
		$stmt->bindParam(':titleArabic', $this->titleArabic);
	}

//=================================================Const===================================================

	const DB_TABLE_NAME = "accses";
	const READ = 0;
	const CREAT = 1;
	const APPROVE = 2;
	const PUBLISH = 3;
	const FULL = 4;

//==================================================CRUD===================================================
	public function create() {
		
	}

	public function update() {
		
	}

//===================================================SET===================================================
//===================================================HasAccses===================================================

	function hasAccsesPoll($AccsesLevel) {
		return $this->poll >= $AccsesLevel;
	}

	function hasAccsesArticle($AccsesLevel) {
		return $this->article >= $AccsesLevel;
	}

	function hasAccsesYoutube($AccsesLevel) {
		return $this->youtube >= $AccsesLevel;
	}

	function hasAccsesGallery($AccsesLevel) {
		return $this->gallery >= $AccsesLevel;
	}

	function hasAccsesUser($AccsesLevel) {
		return $this->user >= $AccsesLevel;
	}

	function hasAccsesEmail($AccsesLevel) {
		return $this->email >= $AccsesLevel;
	}

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

	function getEmail() {
		return $this->email;
	}

	function getTitleEnglish() {
		return $this->titleEnglish;
	}

	function getTitleArabic() {
		return $this->titleArabic;
	}

}
