<?php
require_once("ControlFunctions.php");

$Order = array("ID", "Name", "Category", "Language", "Youtube-link", "Brief", "Rate", "ArticleDay", "ArticleMonth", "ArticleYear", "Writer", "Editor");
$OrderSize = 12;
$Seperator = "~#*$%#";
$FileLoc = "Data\Articles\Article-info.txt";

function save_article_info() {
	global $OrderSize, $Order, $Seperator, $FileLoc, $Article;
	$ID = 0;
	$file = fopen($FileLoc, "a+") or die("Unable to open file!");
	fwrite($file, ArticleToString($Article));
	fclose($file);
}

function ArrToArticle($arr) {
	global $OrderSize, $Order;
	for ($i = 0; $i < $OrderSize && isset($arr[$i]); $i++) {
		$Article[$Order[$i]] = $arr[$i];
	}
	return $Article;
}

function ArticleToString($Article) {
	global $OrderSize, $Order, $Seperator, $FileLoc;
	$txt = "";
	for ($i = 0; $i < $OrderSize; $i++) {
		if (isset($Article[$Order[$i]])) {
			$txt.= $Article[$Order[$i]].$Seperator;
		} else {
			$txt.= "".$Seperator;
		}
	}
	return "\r\n".$txt;
}
function id_count() {
	global $FileLoc, $ID;
	$file = fopen($FileLoc, "a+") or die("Unable to open file!");
	while ((!feof($file))) {
		$arr = explode("~#*$%#", fgets($file));

		$ID = $arr[0];
	}

	fclose($file);
}
function SearchTitle($Find) {
	global $FileLoc, $Seperator;
	$file = fopen($FileLoc, "a+") or die("Unable to open file!");
	$AllArticle = array();
	$i = 0;
	while ((!feof($file))) {
		$Article = ArrToArticle(explode($Seperator, fgets($file)));
		if (strpos($Article["Name"], $Find) !== FALSE) {
			$AllArticle[$i++] = $Article;
		}
	}
	return $AllArticle;
}
function SearchCategory($Find) {
	global $FileLoc, $Seperator;
	$file = fopen($FileLoc, "a+") or die("Unable to open file!");
	$AllArticle = array();
	$i = 0;
	while ((!feof($file))) {
		$Article = ArrToArticle(explode($Seperator, fgets($file)));
		if (strpos($Article["Category"], $Find) !== FALSE) {
			$AllArticle[$i++] = $Article;
		}
	}

	return $AllArticle;
}
function SearchID($Find) {
	global $FileLoc, $Seperator;
	$file = fopen($FileLoc, "a+") or die("Unable to open file!");
	$AllArticle = array();
	$i = 0;
	while ((!feof($file))) {
		$Article = ArrToArticle(explode($Seperator, fgets($file)));
		if ($Article["ID"] == $Find) {
			$AllArticle[$i++] = $Article;
		}
	}

	return $AllArticle;
}
function DeleteID($ID) {
	$ds = DIRECTORY_SEPARATOR;
	global $OrderSize, $Order, $Seperator, $FileLoc;
	$temp = SearchID($ID);
	$file = fopen($FileLoc, "a+") or die("Unable to open file!");
	$AllArticle = array();
	$i = 0;
	while ((!feof($file))) {
		$Article = ArrToArticle(explode($Seperator, fgets($file)));
	}
	echo $Article["2"];
	UpdateRecord("", $temp);
	//unlink("Data\Articles".$ds.$ID.".html");
}
function UpdateRecord($Newrecord, $OldRecord) {
	global $OrderSize, $Order, $Seperator, $FileLoc;
	$contents = file_get_contents($FileLoc);
	$contents = str_replace($OldRecord, $Newrecord, $contents);
	file_put_contents($FileLoc, $contents);
}
?>