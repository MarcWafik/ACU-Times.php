<?php

require_once 'autoload.php';
User::CheckLogin();
if (isset($_GET["id"])) {
	if (User::getSessionAccses()->hasAccsesUser(Access::FULL)) {
		User::delete_static($_GET["id"]);
		Header::Location(Header::REDIR_HOME);
		exit;
	}
}
Header::ResponseCode(Header::UNAUTHORIZED);
exit;
