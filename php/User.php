<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author marcw
 */
class User extends Entity implements iCRUD {

// photo is stored as 4141235.jpeg
	protected $password; //32
	protected $fullName; //64
	protected $email; // 254
	protected $phoneNumber; //13
	protected $gender; //0 dont say 1 male 2 female 
	protected $accses; //0 regular 1 editor 2 admin
	protected $about; //2048
	protected $birthDate;  // using datetime class

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
	public function setID($id) {
		if (isset($id) && (preg_match('/^[0-9]{7,7}$/', $id) || $id == "")) {
			$this->id = (int) $id;
			return TRUE;
		}
		return FALSE;
	}

	public function setPassword($password) {
		if (isset($password) && preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,32}$/', $password)) {
			$this->password = hash("sha256", $password);
			return TRUE;
		}
		return FALSE;
	}

	public function setPhoneNumber($phoneNumber) {
		if (isset($phoneNumber) && (preg_match('/^[0-9]{8,13}$/', $phoneNumber) || $phoneNumber == "")) {
			$this->phoneNumber = (int) $phoneNumber;
			return TRUE;
		}
		return FALSE;
	}

	public function setfullName($name) {
		if (isset($name) && preg_match('/^[A-Za-z ].{3,64}$/', $name)) {
			$this->fullName = (String) $name;
			return TRUE;
		}
		return FALSE;
	}

	public function setEmail($email) {
		if (isset($email) && strlen($email) < 254 && preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email)) {
			$this->email = (string) $email;
			return TRUE;
		}
		return FALSE;
	}

	public function setGender($gender) {
		if (isset($gender)) {
			if ($gender == 1 || substr(strtoupper($gender), 0, 1) == 'M') {
				$this->gender = 1;
				return TRUE;
			} else if ($gender == 2 || substr(strtoupper($gender), 0, 1) == 'F') {
				$this->gender = 2;
				return TRUE;
			} else if ($gender == 0 || $gender = "") {
				$this->gender = 0;
				return TRUE;
			}
		}
		return FALSE;
	}

	public function setAccses($accses) {
		if (isset($accses)) {
			if ($accses == 1 || substr(strtoupper($accses), 0, 1) == 'E') {
				$this->accses = 1;
				return TRUE;
			} else if ($accses == 2 || substr(strtoupper($accses), 0, 1) == 'A') {
				$this->accses = 2;
				return TRUE;
			} else if ($accses == 0 || $accses = "" || substr(strtoupper($accses), 0, 1) == 'W') {
				$this->accses = 0;
				return TRUE;
			}
		}
		return FALSE;
	}

	public function setAbout($about) {
		if (isset($about) && strlen($about) < 2048) {
			$this->about = htmlspecialchars($about);
			return TRUE;
		}
		return FALSE;
	}

	public function setBirthDate($year, $month, $day) {
		if (isset($year) && isset($month) && isset($day) && checkdate($month, $day, $year)) {
			$this->birthDate = new DateTime;
			$this->birthDate->setDate($year, $month, $day);
			return TRUE;
		}
		return FALSE;
	}

//===================================================GET===================================================
	public function getIsCorrectPassword($password) {
		return (isset($password) && hash("sha256", $password) == $password);
	}

	public function getImagePath() {
		return "{$this->id}.jpg";
	}

	public function getfullName() {
		return $this->fullName;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getPhoneNumber() {
		return $this->phoneNumber;
	}

	public function getGender() {
		return $this->gender;
	}

	public function getAccses() {
		return $this->accses;
	}

	public function getBirthDate() {
		return $this->birthDate;
	}

	public function getAbout() {
		return $this->about;
	}

}
