<?php
        
$FileLoc = "Data\Vote\question.file.txt";
global $FileLoc;


$myfile = fopen($FileLoc, "r") or die("Unable to open file!");

$lines    = file($FileLoc);
$lastLine = array_pop($lines);
$filecontent = explode('~#*$%#', $lastLine);

//////////////////////////////////////

$choice1=0;
$choice2=0;
$total=0;
$yourchoice=$_POST["choice"];

if($yourchoice == 1){
    $choice1=$choice1+1;
    $total=$total+1;    
}else{
    $choice2=$choice2+1;
    $total=$total+1;    
}


$ffile = fopen("voting.txt", "r") or die("Unable to open file!");
$line    = file_get_contents('voting.txt');
$datacontent;
if($line!="")
{
    $lastLines;
   
    while(!feof($ffile))
    {
        $temp=fgets($ffile);
        if($temp!="")
        {
        $lastLines=$temp;
        }
        
    }
    $datacontent = explode('~#*$%#', $lastLines);
    $ch1=$datacontent[0]+$choice1;
    $ch2=$datacontent[1]+$choice2;
    $ch3=$datacontent[2]+$total;
    $datacontent[0]=$ch1;
    $datacontent[1]=$ch2;
    
    $datacontent[2]=$ch3;
    
    
    
}
else{
$datacontent[0]=$choice1;
$datacontent[1]=$choice2;
$datacontent[2]=$total;
$ch1=$choice1;
$ch2=$choice2;
$ch3=$total;
}



$data="";
$myfile = fopen("voting.txt", "a") or die("Unable to open file!");
$data=$ch1."~#*$%#".$ch2."~#*$%#".$ch3."\r\n";
fwrite($myfile,$data);
fclose($myfile);

?>
<!doctype html>
<html>
<html lang="en">
<head>
<title>ACU Times | Title</title>
<?php require_once("Header.php");?>
</head>
<body>
<?php include ("Navbar.php");?>
   <div class="text-center center-block">
	<div class="Succses-code"><i class="fa fa-check"></i></div>
	<h1>Thank you for the info you submited</h1>
	<div class="text-muted"> Here are the statistics</div>
</div>







<div class="container"> <br>
	<label><span><?php echo"<h2> $filecontent[0] </h2> ";?></span></label>
	<br>
	<label><span><?php echo"<h3> $filecontent[1] : </h3> ";?></span></label>
	<label><span><?php echo"<h3>$datacontent[0]  </h3> ";?></span></label>
	<br>
	<label><span><?php echo"<h3> $filecontent[2] : </h3> ";?></span></label>
	<label><span><?php echo"<h3>$datacontent[1]  </h3> ";?></span></label>
	<br>
	<br>
	<label><span><?php echo"<h3>TOTAL : $datacontent[2]  </h3> ";?></span></label>
	<br>
</div>
<br>
<br>
<br>
<br>
<?php include ("Footer.php");?>
</body>
</html>