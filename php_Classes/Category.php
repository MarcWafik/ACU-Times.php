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
class Category extends Entity {

	private static $allCategorys;
	private $possition;
	private $nameEnglish;
	private $nameArabic;
	private $arrSubCategorys;

	function __construct($possition, $nameEnglish, $nameArabic, $arrSubCategorys) {
		$this->possition = $possition;
		$this->nameEnglish = $nameEnglish;
		$this->nameArabic = $nameArabic;
		$this->arrSubCategorys = $arrSubCategorys;
	}

	function _init() {
		parent::_init();
		$this->possition = 0;
		$this->nameEnglish = "";
		$this->nameArabic = "";
		$this->arrSubCategorys = array();
	}

//==================================================CUID===================================================
	public static function getAllCategory() {

		$this->allCategorys = array();

		$tempsubcat = array(new Category("Local News", "LocalNews"),
			new Category("World News", "WorldNews"),
			new Category("ACU College News", "ACUCollegeNews"));

		array_push($this->allCategorys, new Category("News", "News", $tempsubcat));


		$tempsubcat = array(new Category("Cinema", "Cinema", NULL),
			new Category("Drama", "Drama", NULL),
			new Category("Theater", "Theater", NULL));
		array_push($this->allCategorys, new Category("Art", "Art", $tempsubcat));

		$tempsubcat = array(new Category("Local Footaball", "LocalFootaball", NULL),
			new Category("International Football", "InternationalFootball", NULL),
			new Category("Other", "Other", NULL));
		array_push($this->allCategorys, new Category("Sport", "Sport", $tempsubcat));

		$tempsubcat == NULL;
		array_push($this->allCategorys, new Category("Interviews", "Interviews", NULL));
		array_push($this->allCategorys, new Category("TechScience", "TechScience", NULL));
		array_push($this->allCategorys, new Category("Economy", "Economy", NULL));

		return $this->allCategorys;
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
	function PrintLargeCategory(Category $Category) {
		echo '<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="Category.php?Category=' . $Category->Link . '">' . $Category->Name . ' <span class="caret"></span></a><ul class="dropdown-menu">';
		foreach ($Category->ArrSubCategorys as $SubCat) {
			echo '<li><a href="Category.php?CategoryID=' . $SubCat->Link . '">' . $SubCat->Name . '</a></li>';
		}
		echo '</ul></li>';
	}

	function PrintSmallCategory(Category $Category) {
		echo '<li><a href="Category.php?CategoryID=' . $Category->Link . '">' . $Category->Name . '</a></li>';
	}

	function PrintCategory(Category $Category) {
		if (isset($Category->ArrSubCategorys[0])) {
			PrintLargeCategory($Category);
		} else {
			PrintSmallCategory($Category);
		}
	}

	function PrintOptionLargeCategory(Category $Category) {
		echo "<optgroup label='{$Category->Name}'>";
		foreach ($Category->ArrSubCategorys as $SubCat) {
			echo "<option value='{$SubCat->Link}'>{$SubCat->Name}</option>";
		}
		echo "</optgroup>";
	}

	function PrintOptionSmallCategory(Category $Category) {
		echo "<option value='{$Category->Link}'>{$Category->Name}</option>";
	}

	function PrintOptionCategory(Category $Category) {
		if (isset($Category->ArrSubCategorys[0])) {
			PrintOptionLargeCategory($Category);
		} else {
			PrintOptionSmallCategory($Category);
		}
	}

}
