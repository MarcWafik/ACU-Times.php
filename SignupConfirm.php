<?php
if(valAll()){
	$myfile = fopen("Data\Users\UsersList.txt", "a+") or die("Unable to open file!");
	echo fread($myfile,filesize("webdictionary.txt"));
	//ID ~#*$%# PassHash ~#*$%# Name ~#*$%# E-Mail ~#*$%# PhoneNumber ~#*$%# Gender[M][F][D] ~#*$%# Brithdate ~#*$%# Registration Date~#*$%#About
	$txt = $_POST["ID"]."~#*$%#".$_POST["Password"]."~#*$%#".$_POST["name"]."~#*$%#".$_POST["email"]."~#*$%#".$_POST["PhoneNo"]."~#*$%#"."~#*$%#"."~#*$%#"."\n";
	fwrite($myfile, $txt);
	fclose($myfile);
	header("Location: SignupSuccessful.php");
}
else
	header("Location: SignUp.php");
die();
exit;
//=========================================All=========================================
function valAll() {
	return valName($_POST["name"]) && valID($_POST["ID"]) && valEmail($_POST["email"]) && valPassword($_POST["Password"]) && valRePassword($_POST["RePassword"] , $_POST["Password"]) && valPhoneNo($_POST["PhoneNo"]);
}
//=========================================Name=========================================
 function valName($Check) {
	$pattern = '/^[A-Za-z\s]+$/';
	return preg_match($pattern, $Check);
}
//=========================================ID=========================================
 function valID($Check) {
	$pattern = '/^\d+$/';
	return preg_match($pattern, $Check);
}
//=========================================Email=========================================
 function valEmail($Check) {
	$pattern = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
	return preg_match($pattern, $Check);
}
//=========================================Password=========================================
 function valPassword($Check) {
	$pattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/';
	return preg_match($pattern, $Check);
}
//=========================================RePassword=========================================
 function valRePassword($Check , $PW) {
	return $Check==$PW;
}
//=========================================PhoneNo=========================================
 function valPhoneNo($Check) {
	$pattern = '/^\d+$/';
	return preg_match($pattern, $Check)||$Check="";
}
//=========================================Gender=========================================
//=========================================BrithDay=========================================
?>