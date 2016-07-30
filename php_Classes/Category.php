<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category
 *
 * @author marcw
 */
class Category extends Entity implements iCRUD {

	private static $allCategorys;
	private $possition;
	private $nameEnglish;
	private $nameArabic;
	private $arrSubCategorys;
	private $ParentID;

	function __construct() {
		$this->__init();
	}

	function __init() {
		parent::__init();
		$this->possition = 0;
		$this->nameEnglish = "";
		$this->nameArabic = "";
		$this->arrSubCategorys = array();
		$this->ParentID = 0;
	}

	protected function fillFromAssoc($DBrow) {
		parent::fillFromAssoc($DBrow);
		$this->possition = $DBrow['possition'];
		$this->nameEnglish = $DBrow['nameEnglish'];
		$this->nameArabic = $DBrow['nameArabic'];
		$this->ParentID = $DBrow['ParentID'];
	}

	protected function bindParamClass($stmt) {
		parent::bindParamClass($stmt);
		$stmt->bindParam(':possition', $this->possition);
		$stmt->bindParam(':nameEnglish', $this->nameEnglish);
		$stmt->bindParam(':nameArabic', $this->nameArabic);
		$stmt->bindParam(':ParentID', $this->ParentID);
	}

//=================================================Const===================================================
	const DB_TABLE_NAME = "category";

//==================================================CUID===================================================

	public static function readAll($offset = 0, $size = 0) {
		if (isset(static::$allCategorys)) {
			return static::$allCategorys;
		}
		static::$allCategorys = static::readAllSubcat(NULL);
		foreach (static::$allCategorys as $value) {
			$subcatTemp = static::readAllSubcat($value->id);
			if (isset($subcatTemp) && $subcatTemp !== FALSE) {
				$value->arrSubCategorys = $subcatTemp;
			}
		}
		return static::$allCategorys;
	}

	private static function readAllSubcat($id) {

		try {
			$conn = DataBase::getConnection();
			if ($id !== NULL) {
				$stmt = $conn->prepare("SELECT * FROM " . static::DB_TABLE_NAME . " WHERE ParentID=:imputID");
				$stmt->bindParam(':imputID', $id);
			} else {
				$stmt = $conn->prepare("SELECT * FROM " . static::DB_TABLE_NAME . " WHERE ParentID is NULL");
			}
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);

			$result = array();
			foreach ($stmt->fetchAll() as $value) {
				$temp = new static();
				$temp->fillFromAssoc($value);
				array_push($result, $temp);
			}
			return $result;
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	public function create() {
		return $this->Do_comand_Update_Creat("INSERT INTO " . static::DB_TABLE_NAME . "
				(	
					possition,
					nameEnglish,
					nameArabic,
					ParentID
				) VALUES ( 
					:possition,
					:nameEnglish,
					:nameArabic,
					:ParentID
				)", FALSE, TRUE);
	}

	public function update() {
		return $this->Do_comand_Update_Creat("UPDATE " . static::DB_TABLE_NAME . " SET 
					possition = :possition,
					nameEnglish = :nameEnglish,
					nameArabic = :nameArabic,
					ParentID = :ParentID
				WHERE id=:id", TRUE, FALSE);
	}

//===================================================SET===================================================

	public function setNameEnglish($nameEnglish) {
		if (Validation::isStringMinMaxLenth($nameEnglish, 3, 32)) {
			$this->nameEnglish = htmlspecialchars($nameEnglish);
			return TRUE;
		}
		return FALSE;
	}

	public function setNameArabic($nameArabic) {
		if (Validation::isStringMinMaxLenth($nameArabic, 3, 32)) {
			$this->nameArabic = htmlspecialchars($nameArabic);
			return TRUE;
		}
		return FALSE;
	}

	public function setParentID($ParentID) {
		$this->ParentID = $ParentID;
		return $this;
	}

//===================================================GET===================================================
	static function getAllCategorys() {
		return self::$allCategorys;
	}

	function getNameEnglish() {
		return $this->nameEnglish;
	}

	function getNameArabic() {
		return $this->nameArabic;
	}

	function getArrSubCategorys() {
		return $this->arrSubCategorys;
	}

//=================================================PRINT===================================================
	function PrintCategory() {
		if (isset($this->arrSubCategorys[0])) {
			echo '<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="Category.php?Category=' . $this->id . '">' . $this->nameEnglish . ' <span class="caret"></span></a><ul class="dropdown-menu">';
			foreach ($this->arrSubCategorys as $value) {
				echo '<li><a href="Category.php?CategoryID=' . $value->id . '">' . $value->nameEnglish . '</a></li>';
			}
			echo '</ul></li>';
		} else {
			echo '<li><a href="Category.php?CategoryID=' . $this->id . '">' . $this->nameEnglish . '</a></li>';
		}
	}

	function PrintOptionCategory($selected) {
		$temp = "";
		if ($selected == $this->id) {
			$temp = " selected ";
		}
		if (isset($this->arrSubCategorys[0])) {
			echo "<optgroup label='{$this->nameEnglish}'>";
			foreach ($this->arrSubCategorys as $value) {
				$value->PrintOptionCategory($selected);
			}
			echo "</optgroup>";
		} else {
			echo "<option value='{$this->id}' {$selected}>{$this->nameEnglish}</option>";
		}
	}

	function PrintOptionMainCategory($selected) {
		$temp = "";
		if ($selected == $this->id) {
			$temp = " selected ";
		}
		echo "<option value='{$this->id}' {$selected}>{$this->nameEnglish}</option>";
	}

}
