<?php
$Seperator = "~#*$%#";
$fileName="Data\Multimedia\multimedia.txt";
$finishimgg;
$URLFINISH;
$IDVIDEO;
$URL;
$AllVid = loadAllVid();
$GLOBALS['URL']=$URL;
$GLOBALS['URLFINISH']=$URLFINISH;
$GLOBALS['finishimgg']=$finishimgg;
$GLOBALS['IDVIDEO']=$IDVIDEO;

function getYouTubeIdFromURL($URL)
{
  $IDVIDEO_string = parse_url($URL, PHP_URL_QUERY);
  parse_str($IDVIDEO_string, $args);
  $IDVIDEO=isset($args['v']) ? $args['v'] : false;
  return $IDVIDEO;
}
function embed($URL)
{
	$URLL =str_replace("watch?v=","embed/",$URL);
	$URLFINISH=chop($URLL,"&nohtml5=False");
	return $URLFINISH;
}

function image($URLFINISH)
{
	$img=str_replace("www","img",$URLFINISH);
	$imgg=str_replace("embed","vi",$img);
	$finishimgg="$imgg/0.jpg";
	return $finishimgg;
}

function addvideo($URL,$Title)
{
global $fileName;
$IDVIDEO=getYouTubeIdFromURL($URL);
$URLFINISH=embed($URL);
$finishimgg=image($URLFINISH);
$ID=getLastId($fileName,"~#*$%#")+1;
$record=$ID."~#*$%#".$Title."~#*$%#".$URL."~#*$%#".$IDVIDEO."~#*$%#".$URLFINISH."~#*$%#".$finishimgg;
//echo $record;
if (searchvideo($fileName,$ID)==FALSE)
{
StoreRecord($fileName,$record);	
return true;
}
else
{
	return FALSE;
}
}
function getLastId($fileName,$Seperator)
{
	
	if ( !file_exists($fileName) ) {
       return 0;}
	$myfile = fopen($fileName, "r+") or die("Unable to open file!");
	$LastId=0;
	while(!feof($myfile)) 
	{
  		$line= fgets($myfile);
  		$ArrayLine=explode($Seperator,$line);
  		
  		if ($ArrayLine[0]!=""&&$ArrayLine[0]==NULL)
  		{
		$LastId=$ArrayLine[0];	
		}
		
	}
	return $LastId;
	fclose($fileName);
}
function StoreRecord($fileName,$record)
{
	$myfile = fopen($fileName, "a+");
	fwrite($myfile, $record."\r\n");
	fclose($myfile);
	
}

function searchvideo($fileName,$Search)
{
	$myfile = fopen($fileName, "r+") or die("Unable to open file!");
	while(!feof($myfile)) 
	{
		$line=fgets($myfile);
		$i=strpos($line, $Search);
		
  		if ($i>=0 && $i !=null)
  		{
  			
			return $line;
		}
	}
	fclose($myfile);	
	return FALSE;
	
}
/*function load($fileName){
	      $myfile = fopen($fileName, "r+") or die("Unable to open file!");
		  global $check;
		 while(!feof($myfile)) 
		{
		$line=fgets($myfile);
		$check=explode("~#*$%#",$line);
  		if ( $check !=null)
  		{
			$check=$check[4];
			return $check;
		}
	}
	fclose($myfile);
		 
			//return $check[4];
}*/
function loadAllVid(){
    $AllVid = array();
    global $fileName ;
	$myfile = fopen($fileName, "r") or die("Unable to open file!");
    $i=0;
    while(!feof($myfile)) 
    {
		$line=fgets($myfile);
  		if ( $line !=null && $line !="" )
  		{
            $AllVid[$i]=explode("~#*$%#",$line);
            $i++; 
		}
		
	}
	fclose($myfile);
    return $AllVid;
}


	addvideo("https://www.youtube.com/watch?v=wMxh-26n5SQ","news egypt");
	addvideo("https://www.youtube.com/watch?v=sBwUqMRwQRw","cairo");
	addvideo("https://www.youtube.com/watch?v=NzC5Ai_kI0g","news");
	addvideo("https://www.youtube.com/watch?v=QkIcwNvupa0","How Powerful Is Egypt?");
	addvideo("https://www.youtube.com/watch?v=5oUUVnscTVw","Title");
	addvideo("https://www.youtube.com/watch?v=T0zBU_W-bDQ","can be change title");
	
?>
