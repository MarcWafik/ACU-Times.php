<?php
class Category {

	public $Name;
	public $Link;
	public $ArrSubCategorys = NULL;

	function __construct($AName, $ALink, $AArrSubCategorys) {
		$this->Name = $AName;
		$this->Link = $ALink;
		$this->ArrSubCategorys = $AArrSubCategorys;
	}

	function aMemberFunc() {
		print 'Inside `aMemberFunc()`';
	}

}

//=====================================================================================================================================================================
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

//=====================================================================================================================================================================
function PrintLargeCategory(Category $Category) {
	echo '<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="Category.php?Category=' . $Category->Link . '">' . $Category->Name . ' <span class="caret"></span></a>
						<ul class="dropdown-menu">';
	foreach ($Category->ArrSubCategorys as $SubCat) {
		echo '<li><a href="Category.php?Category=' . $SubCat->Link . '">' . $SubCat->Name . '</a></li>';
	}
	echo '</ul></li>';
}

function PrintSmallCategory(Category $Category) {
	echo '<li><a href="Category.php?Category=' . $Category->Link . '">' . $Category->Name . '</a></li>';
}

function PrintCategory(Category $Category) {
	if (isset($Category->ArrSubCategorys[0])) {
		PrintLargeCategory($Category);
	} else {
		PrintSmallCategory($Category);
	}
}

//=====================================================================================================================================================================
//=====================================================================================================================================================================
function FillCategory(){
	

$CategoryList = array();

$tempsubcat = array(new Category("Local News", "LocalNews"),
	new Category("World News", "WorldNews"),
	new Category("ACU College News", "ACUCollegeNews"));

array_push($CategoryList, new Category("News", "News", $tempsubcat));


$tempsubcat = array(new Category("Cinema", "Cinema", NULL),
	new Category("Drama", "Drama", NULL),
	new Category("Theater", "Theater", NULL));
array_push($CategoryList, new Category("Art", "Art", $tempsubcat));

$tempsubcat = array(new Category("Local Footaball", "LocalFootaball", NULL),
	new Category("International Football", "InternationalFootball", NULL),
	new Category("Other", "Other", NULL));
array_push($CategoryList, new Category("Sport", "Sport", $tempsubcat));

$tempsubcat == NULL;
array_push($CategoryList, new Category("Interviews", "Interviews", NULL));
array_push($CategoryList, new Category("TechScience", "TechScience", NULL));
array_push($CategoryList, new Category("Economy", "Economy", NULL));
//array_push($CategoryList, new Category("Multimedia","Multimedia"));
//array_push($CategoryList, new Category("Gallery","Gallery"));

return $CategoryList;
}