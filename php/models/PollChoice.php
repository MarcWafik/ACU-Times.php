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

	const DB_TABLE_NAME = "pollchoice";

	public function __init() {
		parent::__init();
		$this->textEnglish = "";
		$this->textArabic = "";
		$this->votes = 0;
		$this->PollID = 0;
	}

	function __construct() {
		$this->__init();
	}

	protected function fillFromAssoc($DBrow) {
		parent::fillFromAssoc($DBrow);

		$this->textEnglish = $DBrow['textEnglish'];
		$this->textArabic = $DBrow['textArabic'];
		$this->votes = $DBrow['votes'];
		$this->PollID = $DBrow['PollID'];
	}

	protected function bindParamClass($stmt) {
		parent::bindParamClass($stmt);

		$stmt->bindParam('textEnglish', $this->textEnglish);
		$stmt->bindParam('textArabic', $this->textArabic);
		$stmt->bindParam('votes', $this->votes);
		$stmt->bindParam('PollID', $this->PollID);
	}

//==================================================CRUD===================================================
	public function create() {
		return $this->Do_comand_Update_Creat("INSERT INTO " . static::DB_TABLE_NAME . "
				(	
					textEnglish,
					textArabic,
					votes,
					PollID
				) VALUES ( 
					:textEnglish,
					:textArabic,
					:votes,
					:PollID
				)", FALSE, TRUE);
	}

	public function update() {
		return $this->Do_comand_Update_Creat("UPDATE " . static::DB_TABLE_NAME . " SET 
					textEnglish = :textEnglish,
					textArabic = :textArabic,
					votes = :votes,
					PollID = :PollID
				WHERE id=:id", TRUE, FALSE);
	}

	public static function readAllrelatedPoll($PollID, $offset = 0, $size = 0) {
		$comand = "SELECT * FROM " . static::DB_TABLE_NAME . " WHERE PollID=" . $PollID;
		return static::Do_comand_readAll($comand, $offset, $size);
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
		return TRUE;
	}

//===================================================GET===================================================
	function isValidChoice() {
		return setTextEnglish($this->textEnglish) && setTextArabic($this->textArabic);
	}

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
