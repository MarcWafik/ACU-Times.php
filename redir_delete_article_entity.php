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
			header("Location: accses_denied.php");
			exit;
	}
	if ($temp->read($_GET["id"]) && $temp->hasAccsesToModify(User::getSessionAccses())) {
		$temp->delete();
		header("Location: index.php");
		exit;
	}
}
header("Location: accses_denied.php");
exit;
