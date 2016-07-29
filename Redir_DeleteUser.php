<?php 
require_once("MangeUsers.php");
DeleteUser($_GET["ID"]);
header("Location: MangeUsers.php");
?>