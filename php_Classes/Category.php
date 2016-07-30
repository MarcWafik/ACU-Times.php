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
		
	}

	public function update() {
		
	}

//===================================================SET===================================================

	function setPossition($possition) {
		$this->possition = $possition;
	}

	function setNameEnglish($nameEnglish) {
		$this->nameEnglish = $nameEnglish;
	}

	function setNameArabic($nameArabic) {
		$this->nameArabic = $nameArabic;
	}

	function setArrSubCategorys($arrSubCategorys) {
		$this->arrSubCategorys = $arrSubCategorys;
	}

//===================================================GET===================================================
	static function getAllCategorys() {
		return self::$allCategorys;
	}

	function getPossition() {
		return $this->possition;
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

	function PrintOptionCategory() {
		if (isset($this->arrSubCategorys[0])) {
			echo "<optgroup label='{$this->nameEnglish}'>";
			foreach ($this->arrSubCategorys as $value) {
				echo "<option value='{$value->id}'>{$value->nameEnglish}</option>";
			}
			echo "</optgroup>";
		} else {
			echo "<option value='{$this->id}'>{$this->nameEnglish}</option>";
		}
	}

}
