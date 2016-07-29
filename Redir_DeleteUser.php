<?php 
require_once("ControlSession.php");
require_once("ControlUsers.php");
Check_Admin();
DeleteUser($_GET["ID"]);
header("Location: MangeUsers.php");
?>