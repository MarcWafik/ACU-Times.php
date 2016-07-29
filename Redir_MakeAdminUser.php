<?php 
require_once("ControlUsers.php");
require_once("ControlSession.php");
Check_Admin();
MakeAdmin($_GET["ID"]);
header("Location: MangeUsers.php");
exit();
?>