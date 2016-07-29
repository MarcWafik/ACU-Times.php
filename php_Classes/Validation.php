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

	public static function isNumInRange($Imput, $from, $to) { //'/^[0-9]{8,13}$/',
		return isset($Imput) && is_numeric($Imput) && (int) $Imput >= $from && (int) $Imput >= $to;
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

}
