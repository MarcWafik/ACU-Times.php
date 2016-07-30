<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PrintHTML
 *
 * @author marcw
 */
class PrintHTML {

	private function __construct() {
		
	}

//================================================OPTION===================================================
	static public function numericOption($start, $end, $selected = 0) {
		for ($i = $start; $i >= $end; $i--) {
			($selected == $i) ? $temp = "selected" : $temp = "";
			echo "<option value='{$i}' {$temp}>{$i}</option>";
		}
		for ($i = $start; $i <= $end; $i++) {
			($selected == $i) ? $temp = "selected" : $temp = "";
			echo "<option value='{$i}' {$temp}>{$i}</option>";
		}
	}

	static public function numericOptionMonth($selected = 0) {
		$MonthName = array("", "January", "February", "March", "April", "May", "June", "Jully", "August", "September", "October", "November", "December");
		for ($i = 1; $i <= 12; $i++) {
			($selected == ($i)) ? $temp = "selected" : $temp = "";
			echo "<option value='{$i}' {$temp}>{$MonthName[$i]}</option>";
		}
	}

	static public function OptionGender($selected = 0) {
		$Genders = array(
			"Leave Empty" => User::GENDER_NOTSET,
			"Male" => User::GENDER_MALE,
			"Female" => User::GENDER_FEMALE,
		);
		foreach ($Genders as $key => $value) {
			($selected == ($value)) ? $temp = "selected" : $temp = "";
			echo "<option value='{$value}' {$temp}>{$key}</option>";
		}
	}

//=================================================ALERT===================================================
	const ALERT_WARNING = " alert-warning ";
	const ALERT_DANGER = " alert-danger ";
	const ALERT_INFO = " alert-info ";
	const ALERT_SUCCESS = " alert-success ";

	static public function alert_dismissible($text, $type) {
		echo
		'<div class="alert ' . $type . ' alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
		. $text .
		'</div>';
	}

	static public function validation($ID, $isTrue, $text) {
		if (isset($isTrue) && !$isTrue) {
			echo'<li id="' . $ID . '">' . $text . '</li>';
		}
	}

}
