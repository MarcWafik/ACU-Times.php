<?php
require_once("ControlFunctions.php");

$UserOrder = array("ID", "Password", "name", "email", "PhoneNo", "Gender", "BirthdayDay", "BirthdayMonth", "BirthdayYear", "RegisterDay", "RegisterMonth", "RegisterYear", "Photo","Status", "About");
$UserOrderSize = 15;
$Seperator = "~#*$%#";
$UserFileLoc = "Data".DIRECTORY_SEPARATOR."Users".DIRECTORY_SEPARATOR."UsersList.txt";
//=========================================appendUser=========================================
function appendUser($User) {
	global $UserOrderSize , $UserOrder , $Seperator , $UserFileLoc;
		$file = fopen($UserFileLoc, "a+") or die("Unable to open file!");
		fwrite($file, UserToString($User));
		fclose($file);
	}
//=========================================ArrToUser=========================================	
function ArrToUser($arr) {
	global $UserOrderSize , $UserOrder ;
	for ($i = 0; $i < $UserOrderSize && isset($arr[$i]) ; $i++) {
		$User[$UserOrder[$i]] = $arr[$i];
	}
	return $User;
	}
//=========================================UserToString=========================================
function UserToString($User) {
	global $UserOrderSize , $UserOrder , $Seperator , $UserFileLoc;
		$txt = "";
		for ($i = 0; $i < $UserOrderSize; $i++) {
			if(isset($User[$UserOrder[$i]])&& NULL!=$User[$UserOrder[$i]]){
				$txt .= $User[$UserOrder[$i]].$Seperator;
			}
			else {
				$txt .= " ".$Seperator;
			}
		}
		return $txt."\r\n";
	}
//=========================================LoadUser=========================================
function LoadUser($ID) {
	global $UserOrderSize , $UserOrder , $Seperator , $UserFileLoc;
	$file = fopen($UserFileLoc, "a+") or die("Unable to open file!");
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
	global $UserOrderSize , $UserOrder , $Seperator , $UserFileLoc;
	$file = fopen($UserFileLoc, "a+") or die("Unable to open file!");
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
	global $UserOrderSize , $UserOrder , $Seperator , $UserFileLoc;
	$file = fopen($UserFileLoc, "a+") or die("Unable to open file!");
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
	global $UserOrderSize , $UserOrder , $Seperator , $UserFileLoc;
	$file = fopen($UserFileLoc, "a+") or die("Unable to open file!");
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
function DeleteUser($ID){
	global $UserOrderSize , $UserOrder , $Seperator , $UserFileLoc;
	$temp = SearchIDUserSTR($ID);
	UserUpdateRecord("",$temp);
}
function MakeAdmin($ID){
	global $UserOrderSize , $UserOrder , $Seperator , $UserFileLoc;
	$User = LoadUser($ID);
	$temp = SearchIDUserSTR($ID);
	$User["Status"]="A";
	UserUpdateRecord(UserToString($User),$temp);
}
function UpdateUser($user){
	global $UserOrderSize , $UserOrder , $Seperator , $UserFileLoc;
	$temp = SearchIDUserSTR($user["ID"]);
	$User2STR = UserToString($user);
	UserUpdateRecord($User2STR,$temp);
}
function AdminChangePW($ID , $PW){
	global $UserOrderSize , $UserOrder , $Seperator , $UserFileLoc;
	$temp = SearchIDUserSTR($ID);
	$arr = explode("~#*$%#", $temp);
	$User = ArrToUser($arr);
	$User["Password"]=Encrypt_And_Hash($PW);
	$User2STR = UserToString($User);
	UserUpdateRecord($User2STR,$temp);
}
function Login($ID , $PW ){
	global $UserOrderSize , $UserOrder , $Seperator , $UserFileLoc;
	$User=LoadUser($ID);
	if(isset($User)){
		if($User["Password"]==Encrypt_And_Hash($PW)){
			return $User;
		}
	}
}
function UserUpdateRecord($Newrecord,$OldRecord){
	global $OrderSize , $Order , $Seperator , $UserFileLoc;
//	$file = fopen($FileLoc, "a+") or die("Unable to open file!");
	$contents = file_get_contents($UserFileLoc);
	$contents = str_replace($OldRecord,$Newrecord, $contents);
	file_put_contents($UserFileLoc, $contents);
}
?>