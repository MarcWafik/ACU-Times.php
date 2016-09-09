<?php

require_once 'autoload.php';
User::CheckLogin();
if (isset($_GET["id"]) && isset($_GET["type"])) {

	switch ($_GET["type"]) {
		case EntityArticle::TYPE_ARTICLE:
			$temp = new Article;
			break;
		case EntityArticle::TYPE_GALLERY:
			$temp = new Gallery;
			break;
		case EntityArticle::TYPE_POLL:
			$temp = new Poll;
			break;
		case EntityArticle::TYPE_YOUTUBE:
			$temp = new Youtube;
			break;
		default :
			Header::ResponseCode(Header::UNAUTHORIZED);
			exit;
	}
	if ($temp->read($_GET["id"]) && $temp->hasAccsesToModify(User::getSessionAccses())) {
		$temp->delete();
		Header::Location(Header::REDIR_HOME);
		exit;
	}
}
Header::ResponseCode(Header::UNAUTHORIZED);
exit;
