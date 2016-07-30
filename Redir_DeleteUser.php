<?php

require_once 'autoload.php';
User::CheckLogin();
if (isset($_GET["ID"]) && User::getSessionAccses()->hasAccsesAdmin()) {
	DeleteUser($_GET["ID"]);
	header("Location: MangeUsers.php");
}


