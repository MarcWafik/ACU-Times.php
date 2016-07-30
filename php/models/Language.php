<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Language
 *
 * @author marcw
 */
class Language {

	private function __construct() {
		
	}

//=================================================Const===================================================
	const ENGLISH = 0;
	const ARABIC = 1;
	const BOTH = 2;
	const COOKIE_NAME = "lang";

//===================================================SET===================================================
	public static function setArabic() {
		setcookie(self::COOKIE_NAME, self::ARABIC, time() + (86400 * 365), "/"); // 86400 = 1 day
	}

	public static function setEnglish() {
		setcookie(self::COOKIE_NAME, self::ENGLISH, time() + (86400 * 365), "/");
	}

	public static function setFromURL() {
		if (isset($_GET[self::COOKIE_NAME]) && self::isValidLang($_GET[self::COOKIE_NAME])) {
			setcookie(self::COOKIE_NAME, $_GET[self::COOKIE_NAME], time() + (86400 * 365), "/");
		}
	}

	public static function setLang($lang) {
		if (isset($lang) && self::isValidLang($lang)) {
			setcookie(self::COOKIE_NAME, $lang, time() + (86400 * 365), "/");
		}
	}

//===================================================GET===================================================
	public static function isValidLang($lang) {
		return (isset($lang) && Validation::isNumInRange($lang, 0, 2));
	}

	public static function isArabic() {
		self::setFromURL();
		return (isset($_COOKIE[self::COOKIE_NAME]) && $_COOKIE[self::COOKIE_NAME] == self::ARABIC) ||
				(isset($_GET[self::COOKIE_NAME]) && $_GET[self::COOKIE_NAME] == self::ARABIC);
	}

	public static function isEnglish() {
		self::setFromURL();
		return (isset($_COOKIE[self::COOKIE_NAME]) && $_COOKIE[self::COOKIE_NAME] == self::ENGLISH) ||
				(isset($_GET[self::COOKIE_NAME]) && $_GET[self::COOKIE_NAME] == self::ENGLISH);
	}

}
