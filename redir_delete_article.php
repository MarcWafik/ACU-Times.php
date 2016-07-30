<?php

require_once 'autoload.php';
Check_Admin();
DeleteArticle($_GET["ID"]);
header("Location: DeleteArticleSuccessfull.php");
