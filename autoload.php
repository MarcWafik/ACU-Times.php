<?php

function __autoload($className) {
	$filename = "php_Classes" . DIRECTORY_SEPARATOR . $className . ".php";
	if (is_readable($filename)) {
		require_once( $filename );
	}
}
