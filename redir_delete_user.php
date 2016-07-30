<?php

require_once 'autoload.php';
User::CheckLogin();
if (isset($_GET["id"])) {
	if (User::getSessionAccses()->hasAccsesUser(Access::FULL)) {
		User::delete_static($_GET["id"]);
		header("Location: index.php");
		exit;
	}
}
header("Location: accses_denied.php");
exit;
