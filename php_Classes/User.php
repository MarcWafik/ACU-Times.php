.<?php
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
	protected $phoneNumber;   //13
	protected $nameArabic;  //32
	protected $password; //32             for varchar 64
	protected $gender; //1 - 0 dont say 1 male 2 female 
	protected $accsesID;   //11
	protected $about;  //2048
	protected $birthDate;  // using datetime class

	function __construct() {
		$this->__init();
	}

	public function __init() {
		parent::__init();
		$this->phoneNumber = 0;
		$this->nameArabic = "";
		$this->password = "";
		$this->gender = 0;
		$this->accsesID = 0;
		$this->about = "";
		$this->birthDate = new DateTime();
		$this->arrNotification = array();
	}

	protected function fillFromAssoc($DBrow) {
		parent::fillFromAssoc($DBrow);
		$this->phoneNumber = $DBrow['phoneNumber'];
		$this->nameArabic = $DBrow['nameArabic'];
		$this->password = $DBrow['password'];
		$this->gender = $DBrow['gender'];
		$this->accsesID = $DBrow['accsesID'];
		$this->about = $DBrow['about'];
		$this->birthDate = new DateTime($DBrow['birthDate']);
	}

	protected function bindParamClass($stmt) {
		parent::bindParamClass($stmt);
		$stmt->bindParam(':phoneNumber', $this->phoneNumber);
		$stmt->bindParam(':nameArabic', $this->nameArabic);
		$stmt->bindParam(':password', $this->password);
		$stmt->bindParam(':gender', $this->gender);
		$stmt->bindParam(':accsesID', $this->accsesID);
		$stmt->bindParam(':about', $this->about);
		$stmt->bindParam(':birthDate', $this->birthDate->format('Y-m-d'));
	}

//=================================================Const===================================================
	const ACCSES_REGULAR = 0;
	const ACCSES_EDITOR = 1;
	const ACCSES_ADMIN = 2;
	const GENDER_NOTSET = 0;
	const GENDER_MALE = 1;
	const GENDER_FEMALE = 2;
	const DB_TABLE_NAME = "user";

//==================================================CRUD===================================================

	public function create() {
		return $this->Do_comand_Update_Creat(
						"INSERT INTO " . static::DB_TABLE_NAME . " 
						(
							id, 
							fullName, 
							email, 
							phoneNumber, 
							nameArabic, 
							password, 
							gender, 
							accsesID, 
							about, 
							birthDate
						) VALUES (
							:id, 
							:fullName, 
							:email, 
							:phoneNumber, 
							:nameArabic, 
							:password, 
							:gender, 
							:accsesID, 
							:about, 
							:birthDate
						)", TRUE);
	}

	public function update() {
		return $this->Do_comand_Update_Creat("UPDATE " . static::DB_TABLE_NAME . " SET 
				fullName = :fullName, 
				email =  :email, 
				phoneNumber = :phoneNumber, 
				nameArabic = :nameArabic, 
				password = :password, 
				gender = :gender, 
				accsesID = :accsesID, 
				about = :about, 
				birthDate = :birthDate 
				WHERE id=:id", TRUE);
	}

	public function search($imput) {
		
	}

	public static function isIDAvailable($id) {
		return TRUE;
	}

	public static function isEmailAvailable($email) {
		return TRUE;
	}

//============================================GETrelated===================================================
	function LoadArrNotification() {
		
	}

	function LoadArrArticle() {
		
	}

	function LoadArrPoll() {
		
	}

	function LoadArrGallery() {
		
	}

	function LoadArrYoutube() {
		
	}

//===============================================Session===================================================
	function Login($id, $password) {
		if ($this->read($id) && $this->isCorrectPassword($password)) {
			Session::startOnce();
			$_SESSION["id"] = $this->id;
			$_SESSION["accsesID"] = $this->accsesID;
			$_SESSION["fullName"] = $this->fullName;
			return TRUE;
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
			header("Location: login.php");
		}
	}

//=========================================Session IS===================================================
	static function isLogin() {
		Session::startOnce();
		return isset($_SESSION['id']);
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

	static function getSessionAccsesID() {
		Session::startOnce();
		if (isset($_SESSION['accsesID'])) {
			return $_SESSION['accsesID'];
		}
		return NULL;
	}

	static function getSessionAccses() {

		Session::startOnce();
		if (isset($_SESSION['accsesID'])) {
			$temp = new Accses();
			$temp->read($_SESSION['accsesID']);

			return $temp;
		}
		return NULL;
	}

//===================================================SET===================================================
	public function setPhoneNumber($phoneNumber) {
		if (Validation::isNumMinMaxLenth($phoneNumber, 8, 13) || $phoneNumber == "") {
			$this->phoneNumber = (int) $phoneNumber;
			return TRUE;
		}
		return FALSE;
	}

	public function setNameArabic($nameArabic) {
		if (Validation::isStringMinMaxLenth($nameArabic, 0, 32)) {
			$this->nameArabic = htmlspecialchars($nameArabic);
			return TRUE;
		}
		return FALSE;
	}

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

	public function setPasswordRandom() {
		$result = substr(md5(uniqid(rand(), true)), 0, 8);
		$this->password = hash("sha256", $result);
		return $result;
	}

	public function setGender($gender) {
		if (Validation::isNumInRange($gender, 0, 2)) {
			$this->gender = (int) $gender;
			return TRUE;
		}
		return FALSE;
	}

	public function setAccsesID($accses) {
		if (Validation::isNumInRange($accses, 0, 2)) {
			$this->accsesID = (int) $accses;
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
	public function getPhoneNumber() {
		return $this->phoneNumber;
	}

	public function getNameArabic() {
		return $this->nameArabic;
	}

	public function isCorrectPassword($password) {
		return (isset($password) && hash("sha256", $password) == $this->password);
	}

	public function getImagePath() {
		return "{$this->id}.jpg";
	}

	public function getGender() {
		return $this->gender;
	}

	public function getGenderString() {
		if ($this->gender == self::GENDER_FEMALE) {
			return "Female";
		} else if ($this->gender == self::GENDER_MALE) {
			return "Male";
		} else {
			return "";
		}
	}

	public function getAccsesID() {
		return $this->accsesID;
	}

	public function getAccses() {
		$x = new Accses();
		return $x->read($this->accsesID);
	}

	public function getBirthDate() {
		return $this->birthDate;
	}

	public function getBirthdateStringLong() {
		return $this->birthDate->format("D, d F Y");
	}

	public function getBirthdateStringShort() {
		return $this->birthDate->format("d/m/Y");
	}

	public function getBirthDay() {
		return $this->birthDate->format("d");
	}

	public function getBirthYear() {
		return $this->birthDate->format("Y");
	}

	public function getBirthMonth() {
		return $this->birthDate->format("m");
	}

	public function getAbout() {
		return $this->about;
	}

}
