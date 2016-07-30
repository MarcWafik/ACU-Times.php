<?php

require_once 'autoload.php';
User::CheckLogin();
if (isset($_GET["id"]) && isset($_GET["accessID"])) {

	$user = new User;
	$access = new Access;
	if (User::getSessionAccses()->hasAccsesUser(Access::FULL) && $user->read($_GET["id"])) {
		$user->setAccsesID($_GET["accessID"]);
		$user->update();
		header("Location: members.php");
		exit;
	}
}
header("Location: accses_denied.php");
exit;
