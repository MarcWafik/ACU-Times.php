<?php 
require_once("ControlSession.php");
require_once("ControlArticle.php");
Check_Admin();
DeleteArticle($_GET["ID"]);
header("Location: DeleteArticleSuccessfull.php");
?>