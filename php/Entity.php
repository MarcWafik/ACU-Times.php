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

//===================================================SET===================================================
	public function setLastUpdateDate() {
		date_default_timezone_set('Africa/Cairo');
		$this->lastUpdateDate = date('m/d/Y h:i:s a', time());
	}

	public function setCreatDate() {
		date_default_timezone_set('Africa/Cairo');
		$this->creatDate = date('m/d/Y h:i:s a', time());
	}

//===================================================GET===================================================
	public function getId() {
		return $this->id;
	}

	public function getCreatDate() {
		return $this->creatDate;
	}

	public function getLastUpdateDate() {
		return $this->lastUpdateDate;
	}

}
