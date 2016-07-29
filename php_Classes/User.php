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
class User extends EntityUser implements iCRUD {

// photo is stored as 4141235.jpeg
	protected $password; //32
	protected $gender; //1 - 0 dont say 1 male 2 female 
	protected $accses; //1 - 0 regular 1 editor 2 admin
	protected $about; //2048
	protected $birthDate;  // using datetime class
	protected $listNotification; // an array of notification

	public function init() {
		parent::init();
		$this->password = "";
		$this->gender = 0;
		$this->accses = 0;
		$this->about = "";
		$this->birthDate = new DateTime();
		$this->listNotification = array();
	}

//=================================================Const===================================================

	const ACCSES_REGULAR = 0;
	const ACCSES_EDITOR = 1;
	const ACCSES_ADMIN = 2;
	const GENDER_NOTSET = 0;
	const GENDER_MALE = 1;
	const GENDER_FEMALE = 2;

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

//==========================================NOTIFICATION===================================================
//===============================================Session===================================================
	function Login($id, $password) {
		if (read($id)) {
			if ($this->getIsCorrectPassword($password)) {
				Session::startOnce();
				$_SESSION["id"] = $this->id;
				$_SESSION["accses"] = $this->accses;
				$_SESSION["fullName"] = $this->fullName;
			}
		}
		return FALSE;
	}

	static function Logout() {
		Session::startOnce();
		$_SESSION = array();
		session_destroy();
		header("Location: index.php");
	}

//=========================================Session Check===================================================
	static function CheckLogin() {
		Session::startOnce();
		if (!isset($_SESSION['id'])) {
			header("Location: Login.php");
		}
	}

	static function CheckEditor() {
		self::CheckLogin();
		if ($_SESSION['accses'] != self::ACCSES_EDITOR) {
			header("Location: AccsesDenied.php");
		}
	}

	static function CheckAdmin() {
		self::CheckLogin();
		if ($_SESSION['accses'] != self::ACCSES_ADMIN) {
			header("Location: AccsesDenied.php");
		}
	}

//===========================================Session Get===================================================
	static function getSessionUserID() {
		Session::startOnce();
		if (isset($_SESSION['id'])) {
			return $_SESSION['id'];
		}
		return NULL;
	}

	static function getSessionUserFullName() {
		Session::startOnce();
		if (isset($_SESSION['fullName'])) {
			return $_SESSION['fullName'];
		}
		return NULL;
	}

//===================================================SET===================================================
	public function setID($id) {
		if (Validation::isNumMinMaxLenth($id, 7, 7)) {
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

	public function setGender($gender) {
		if (Validation::isNumInRange($gender, 0, 2)) {
			$this->gender = (int) $gender;
		}
		return FALSE;
	}

	public function setAccses($accses) {
		if (Validation::isNumInRange($accses, 0, 2)) {
			$this->accses = (int) $accses;
			return TRUE;
		}
		return FALSE;
	}

	public function setAbout($about) {
		if (Validation::isStringMinMaxLenth($about, 0, 2048)) {
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

function UnitTest_User() {
	$temp = new User();
	$temp->setAccses(User::ACCSES_ADMIN);
	$temp->init();
	echo"<pre>";
	print_r(get_defined_vars());
	echo "</pre>";
}

UnitTest_User();
