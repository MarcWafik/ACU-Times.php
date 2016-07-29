<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Entity
 *
 * @author marcw
 */
abstract class Entity {

	protected $id;
	protected $creatDate;
	protected $lastUpdateDate;

	public function _init() {
		$this->id = 0;
		$this->setCreatDate();
		$this->setLastUpdateDate();
	}

//=================================================Const===================================================
	const LANGUAGE_ENGLISH = 0;
	const LANGUAGE_ARABIC = 1;
	const LANGUAGE_Both = 2;

//===================================================SET===================================================
	public function setLastUpdateDate() {
		$this->lastUpdateDate = new DateTime();
	}

	public function setCreatDate() {
		$this->creatDate = new DateTime();
	}

//===================================================GET===================================================
	public function getId() {
		return $this->id;
	}

	public function getCreatDate() {
		return $this->creatDate;
	}

	public function getCreatDate_StringShort() {
		return $this->creatDate->format('g:i a - d/m/Y');
	}

	public function getCreatDate_StringLong() {
		return $this->creatDate->format('g:i a - D, d F Y');
	}

	public function getLastUpdateDate() {
		return $this->lastUpdateDate;
	}

	public function getLastUpdateDate_StringShort() {
		return $this->lastUpdateDate->format('g:i a - d/m/Y');
	}

	public function getLastUpdateDate_StringLong() {
		return $this->lastUpdateDate->format('g:i a - D, d F Y');
	}

}
