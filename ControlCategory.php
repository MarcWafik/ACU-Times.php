<?php
class SubCategory { 
    public $Name = 'aMemberVar Member Variable'; 
    public $Link = 'aMemberFunc'; 
	
    function __construct($AName , $ALink) {	
	$this->Name = $AName;
	$this->Link = $ALink;	
	}
    
    function aMemberFunc() { 
        print 'Inside `aMemberFunc()`'; 
    }
} 
class Category { 
    public $Name; 
    public $Link; 
	public $ArrSubCategorys = NULL;
	
    function __construct($AName , $ALink , $AArrSubCategorys) {	
	$this->Name = $AName;
	$this->Link = $ALink;
	$this->ArrSubCategorys = $AArrSubCategorys;
	}
    function aMemberFunc() { 
        print 'Inside `aMemberFunc()`'; 
    }
}

//=====================================================================================================================================================================
$CategoryList = array();


$tempsubcat = array (new SubCategory("Local News", "LocalNews"),
					new SubCategory("World News", "WorldNews"),
					new SubCategory("ACU College News","ACUCollegeNews"));
													 
array_push($CategoryList, new Category("News","News",$tempsubcat));


$tempsubcat =array (new SubCategory("Cinema", "Cinema"),
													 new SubCategory("Drama", "Drama"),
													 new SubCategory("Theater", "Theater"));
array_push($CategoryList, new Category("Art","Art",$tempsubcat));

$tempsubcat =array (new SubCategory("Local Footaball", "LocalFootaball"),
													 new SubCategory("International Football", "InternationalFootball"),
													 new SubCategory("Other", "Other"));									 
array_push($CategoryList, new Category("Sport","Sport",$tempsubcat));

array_push($CategoryList, new Category("Interviews","Interviews",NULL));
array_push($CategoryList, new Category("TechScience","TechScience",NULL));
array_push($CategoryList, new Category("Economy","Economy",NULL));
//array_push($CategoryList, new Category("Multimedia","Multimedia"));
//array_push($CategoryList, new Category("Gallery","Gallery"));
?>