<?php
require_once("ControlFunctions.php");
//########################################################################################## Validate ##########################################################################################
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
	return $Check===$PW;
}
//=========================================PhoneNo=========================================
 function valPhoneNo($Check) {
	$pattern = '/^[0-9]*$/';
	return preg_match($pattern, $Check)||$Check=="";
}
//=========================================Gender=========================================
//=========================================BrithDay=========================================
function valBirthday ( $Month , $Year , $Day) {
	$DaysInEatchMonth = array(0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	if (((int)$Year % 4 === 0) && ((int)$Year % 100 !== 0) || ((int)$Year % 400 === 0))
		$DaysInEatchMonth[2]=29;
	return ((int)$Day<=$DaysInEatchMonth[(int)$Month]);
}
//############################################################################# MangeUsers #############################################################################
$Order = array("ID", "Password", "name", "email", "PhoneNo", "Gender", "BirthdayDay", "BirthdayMonth", "BirthdayYear", "RegisterDay", "RegisterMonth", "RegisterYear", "Photo","Status", "About");
$OrderSize = 15;
$Seperator = "~#*$%#";
$FileLoc = "Data\Users\UsersList.txt";
//=========================================appendUser=========================================
function appendUser($User) {
	global $OrderSize , $Order , $Seperator , $FileLoc;
		$file = fopen($FileLoc, "a+") or die("Unable to open file!");
		fwrite($file, UserToString($User));
		fclose($file);
	}
//=========================================ArrToUser=========================================	
function ArrToUser($arr) {
	global $OrderSize , $Order ;
	for ($i = 0; $i < $OrderSize && isset($arr[$i]) ; $i++) {
		$User[$Order[$i]] = $arr[$i];
	}
	return $User;
	}
//=========================================UserToString=========================================
function UserToString($User) {
	global $OrderSize , $Order , $Seperator , $FileLoc;
		$txt = "";
		for ($i = 0; $i < $OrderSize; $i++) {
			if(isset($User[$Order[$i]])&& NULL!=$User[$Order[$i]]){
				$txt .= $User[$Order[$i]].$Seperator;
			}
			else {
				$txt .= " ".$Seperator;
			}
		}
		return $txt."\r\n";
	}
//=========================================LoadUser=========================================
function LoadUser($ID) {
	global $OrderSize , $Order , $Seperator , $FileLoc;
	$file = fopen($FileLoc, "a+") or die("Unable to open file!");
	while ((!feof($file))) {
		$arr = explode("~#*$%#", fgets($file));
		if ($arr[0] == $ID) {
			fclose($file);
			return ArrToUser($arr);
		}
	}
	fclose($file);
	return false;
}
// returns an array of Users
function LoadAllUser() {
	global $OrderSize , $Order , $Seperator , $FileLoc;
	$file = fopen($FileLoc, "a+") or die("Unable to open file!");
	$user=array();
	$i =0;
	while ((!feof($file))) {
		$user[$i++] = ArrToUser(explode("~#*$%#", fgets($file)));
	}
	fclose($file);
	return $user;
}
// returns a user
function SearchAllUser($find) {
	global $OrderSize , $Order , $Seperator , $FileLoc;
	$file = fopen($FileLoc, "a+") or die("Unable to open file!");
	$user=array();
	$i =0;
	while ((!feof($file))) {
		$temp = fgets($file);
		if(strpos($temp,$find)!==false){
			$user[$i++] = ArrToUser(explode("~#*$%#", $temp ));
		}
	}
	fclose($file);
	return $user;
}
// returns a sting with the exact match
function SearchIDUserSTR($find) {
	global $OrderSize , $Order , $Seperator , $FileLoc;
	$file = fopen($FileLoc, "a+") or die("Unable to open file!");
	$i =0;
	while ((!feof($file))) {
		$temp = fgets($file);
		$usertemp = explode("~#*$%#", $temp );
		$IDtemp = $usertemp[0];
		if($IDtemp==$find){
			fclose($file);
			return $temp;
		}
	}
	fclose($file);
	return NULL;
}

//=========================================UpdateRecord=========================================
function UpdateRecord($Newrecord,$OldRecord){
	global $OrderSize , $Order , $Seperator , $FileLoc;
//	$file = fopen($FileLoc, "a+") or die("Unable to open file!");
	$contents = file_get_contents($FileLoc);
	$contents = str_replace($OldRecord,$Newrecord, $contents);
	file_put_contents($FileLoc, $contents);
}

function DeleteUser($ID){
	global $OrderSize , $Order , $Seperator , $FileLoc;
	$temp = SearchIDUserSTR($ID);
	UpdateRecord("",$temp);
}
function UpdateUser($user){
	global $OrderSize , $Order , $Seperator , $FileLoc;
	$temp = SearchIDUserSTR($user["ID"]);
	$User2STR = UserToString($user);
	UpdateRecord($User2STR,$temp);
}
function AdminChangePW($ID , $PW){
	global $OrderSize , $Order , $Seperator , $FileLoc;
	$temp = SearchIDUserSTR($ID);
	$arr = explode("~#*$%#", $temp);
	$User = ArrToUser($arr);
	$User["Password"]=Encrypt_And_Hash($PW);
	$User2STR = UserToString($User);
	UpdateRecord($User2STR,$temp);
}
function Login($ID , $PW ){
	global $OrderSize , $Order , $Seperator , $FileLoc;
	$User=LoadUser($ID);
	if(isset($User)){
		if($User["Password"]==Encrypt_And_Hash($PW)){
			return $User;
		}
	}
}
?>