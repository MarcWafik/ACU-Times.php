<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EntityUser
 *
 * @author marcw
 */
class EntityUser extends Entity {

	protected $fullName; //32
	protected $email; // 254

	public function __init() {
		parent::__init();
		$this->fullName = "";
		$this->email = "";
	}

	protected function fillFromAssoc($DBrow) {
		parent::fillFromAssoc($DBrow);
		$this->fullName = $DBrow['fullName'];
		$this->email = $DBrow['email'];
	}

	protected function bindParamClass($stmt) {
		parent::bindParamClass($stmt);
		$stmt->bindParam(':fullName', $this->fullName);
		$stmt->bindParam(':email', $this->email);
	}

//===================================================SET===================================================

	public function setfullName($name) {
		if (isset($name) && preg_match('/^[A-Za-z ].{3,32}$/', $name)) {
			$this->fullName = (String) $name;
			return TRUE;
		}
		return FALSE;
	}

	public function setEmail($email) {
		if (Validation::isStringMinMaxLenth($email, 5, 254) && preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email)) {
			$this->email = (string) $email;
			return TRUE;
		}
		return FALSE;
	}

//===================================================GET===================================================
	public function getfullName() {
		return $this->fullName;
	}

	public function getEmail() {
		return $this->email;
	}

}
