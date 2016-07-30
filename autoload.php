<?php

function __autoload($className) {
	$filename = "php_Classes" . DIRECTORY_SEPARATOR . $className . ".php";
	if (is_readable($filename)) {
		require_once( $filename );
	}
}

header('Content-Type: text/html; charset=UTF-8');
Session::startOnce();
date_default_timezone_set('Africa/Cairo');
Language::setFromURL();
