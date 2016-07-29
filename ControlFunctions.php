<?php
//########################################### Validate ###########################################
//########################################### Validate ###########################################
//########################################### Validate ###########################################
//=========================================Title=========================================
 function valTitle($Check) {
	$pattern = '/^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/';
	return preg_match($pattern, $Check);
}
//=========================================Youtube=========================================
 function valYouTube($Check) {
	$pattern = '/(?:https?:\/\/)?(?:youtu\.be\/|(?:www\.)?youtube\.com\/watch(?:\.php)?\?.*v=)([a-zA-Z0-9\-_]+)/';
	return preg_match($pattern, $Check);
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
//########################################### Encrypt ###########################################
//########################################### Encrypt ###########################################
//########################################### Encrypt ###########################################
function Encrypt($Word,$Key = 5)
{
	$Result="";
	for ($i=0;$i<strlen($Word);$i++)
	{
		$c=chr(ord($Word[$i])+$Key-$i);
		$Result.=$c;
	}
	return $Result;
}
function Decrypt($Word,$Key = 5)
{
	$Result="";
	for ($i=0;$i<strlen($Word);$i++)
	{
		$c=chr(ord($Word[$i])-$Key+$i);
		$Result.=$c;
	}
	return $Result;
}
function Encrypt_And_Hash($imput){
	return hash("sha256", Encrypt($imput));
}
?>