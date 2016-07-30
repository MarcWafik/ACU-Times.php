<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Session
 *
 * @author marcw
 */
class Session {

	static function startOnce() {
		if (!isset($_SESSION)) {//session_status() == PHP_SESSION_NONE
			session_start();
		}
	}

	static function getSession() {
		self::startOnce();
		return $_SESSION;
	}

}
