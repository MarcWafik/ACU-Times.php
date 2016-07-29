<?php

use EntityArticle;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Poll
 *
 * @author marcw
 */
class Poll extends EntityArticle implements iCRUD {

	protected $options; // and array of options

//==================================================CRUD===================================================

	public function creat() {
		
	}

	public function delete() {
		
	}

	public function read($id) {
		
	}

	public function search($in) {
		
	}

	public function update() {
		
	}

//===================================================SET===================================================
	public function addOption($name, $clicked) {
		
	}

	public function incrementOption($order) {
		
	}

}

/**
 * Description of Option
 *
 * @author marcw
 */
class Option {

	Protected $name;
	Protected $clicked; //an int value that has how many times it got clicked

}
