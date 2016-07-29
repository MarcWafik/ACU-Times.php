<?php

require_once 'autoload.php';
Check_Admin();
DeleteUser($_GET["ID"]);
header("Location: MangeUsers.php");
