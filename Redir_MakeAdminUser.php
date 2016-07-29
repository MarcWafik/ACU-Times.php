<?php 
Check_Admin();
require_once("ControlUsers.php");
MakeAdmin($_GET["ID"]);
header("Location: MangeUsers.php");
?>