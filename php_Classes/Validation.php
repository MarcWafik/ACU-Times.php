<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CustomFunction
 *
 * @author marcw
 */
class Validation {

	private function __construct() {
		
	}

	public static function isNumInRange($Imput, $min, $max) { //'/^[0-9]{8,13}$/',
		return isset($Imput) && is_numeric($Imput) && (int) $Imput >= $min && (int) $Imput <= $max;
	}

	public static function isNumMinMaxLenth($Imput, $mim, $max) {
		return isset($Imput) && is_numeric($Imput) && strlen($Imput) <= $max && strlen($Imput) >= $mim;
	}

	public static function isNumLagerThan($Imput, $mim) {
		return isset($Imput) && is_numeric($Imput) && strlen($Imput) >= $mim;
	}

	public static function isStringMinMaxLenth($Imput, $mim, $max) {
		return isset($Imput) && strlen($Imput) <= $max && strlen($Imput) >= $mim;
	}

	public static function Sanetize($Imput) {
		$Source = array("<script>", "</script>", "<?php", "<?", "?>");
		return str_ireplace($Source, "", $Imput);
	}

	public static function valAll($iscorrect) {
		foreach ($iscorrect as $key => $value) {
			if (FALSE === $value) {
				return FALSE;
			}
		}
		return TRUE;
	}

}
