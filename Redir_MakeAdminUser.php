<?php require_once 'autoload.php';
Check_Admin();
MakeAdmin($_GET["ID"]);
header("Location: MangeUsers.php");
exit();