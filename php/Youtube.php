<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Youtube
 *
 * @author marcw
 */
class Youtube implements iCRUD {

	protected $youtubeID;

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
	public function setyoutubeID($youtubeLink) {
		if (isset($youtubeLink) && strlen($youtubeLink) < 256 && preg_match('/(?:https?:\/\/)?(?:youtu\.be\/|(?:www\.)?youtube\.com\/watch(?:\.php)?\?.*v=)([a-zA-Z0-9\-_]+)/', $youtubeLink)) {
			$this->youtubeID = Youtube::ExtractYoutubeID($youtubeLink);
			return TRUE;
		}
		return FALSE;
	}

//===================================================GET===================================================
	public function getyoutubeID() {
		return $this->youtubeID;
	}
	static function ExtractYoutubeID($url) {
		parse_str(parse_url($url, PHP_URL_QUERY), $ID_youtube);
		return $ID_youtube['v'];
	}

}
