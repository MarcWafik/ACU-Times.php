<?php

function __autoload($className) {
	if (is_readable("php/models/$className.php")) {
		require_once ("php/models/$className.php");
	} else if (is_readable("php/controllers/$className.php")) {
		require_once ("php/controllers/$className.php");
	} else if (is_readable("php/views/$className.php")) {
		require_once ("php/views/$className.php");
	}
}

header('Content-Type: text/html; charset=UTF-8');
Session::startOnce();
date_default_timezone_set('Africa/Cairo');
Language::setFromURL();
