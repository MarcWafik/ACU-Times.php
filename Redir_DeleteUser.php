<?php 
require_once("ControlUsers.php");
DeleteUser($_GET["ID"]);
header("Location: MangeUsers.php");
?>