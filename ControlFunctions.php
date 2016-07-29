<?php

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