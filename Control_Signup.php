<?php
require_once('Control_Users.php');
if(valAll()){
	$right_now = getdate();
	$arr = array( 
		$_POST["ID"],
		$_POST["Password"],
		$_POST["name"],
		$_POST["email"],
		$_POST["PhoneNo"],
		$_POST["Gender"],
		$_POST["BirthdayDay"],
		$_POST["BirthdayMonth"],
		$_POST["BirthdayYear"],
		$right_now["mday"],
		$right_now["mon"],
		$right_now["year"]);
		
	$User = ArrToUser($arr);
	appendUser($User);
	header("Location: SignupSuccessful.php");
}
else{
	header("Location: SignUp.php");
}
exit;
//=========================================All=========================================
function valAll() {
	return 	valName($_POST["name"]) && valID($_POST["ID"]) && valEmail($_POST["email"]) && valPassword($_POST["Password"]) && valRePassword($_POST["RePassword"] , $_POST["Password"]) && valBirthday ($_POST["BirthdayMonth"] , $_POST["BirthdayYear"] , $_POST["BirthdayDay"]) && valPhoneNo($_POST["PhoneNo"]);
}
?>