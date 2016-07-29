<!DOCTYPE html>
<html lang="en">
<head>
<title>ACU Times | Title</title>
<?php require_once("Header.php");?>
</head>
<body>
<?php include ("Navbar.php");?>
<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
<div class="text-center center-block">
	<div class="error-code">404 <i class="fa fa-warning"></i></div>
	<h3>We couldn't find the page..</h3>
	<div class="text-muted"> Sorry, but the page you are looking for was either not found or does not exist. <br/>
		Try refreshing the page or click the button below to go back to the Homepage.
		<div> <a class="login-detail-panel-button btn" href="javascript:history.go(-1)"> <i class="fa fa-arrow-left"></i> Go back</a> 
				<a class=" login-detail-panel-button btn" href="index.php">Homepage <i class="fa fa-arrow-right"></i></a> </div>
	</div>
</div>
<?php 


function youtubeID($url){
     $res = explode("v",$url);
     if(isset($res[1])) {
        $res1 = explode('&',$res[1]);
        if(isset($res1[1])){
            $res[1] = $res1[0];
        }
        $res1 = explode('#',$res[1]);
        if(isset($res1[1])){
            $res[1] = $res1[0];
        }
     }
     return substr($res[1],1,12);
     return false;
 }
$url = "http://www.youtube.com/watch/v/y40ND8kXDlg";
echo youtubeID($url1);
?>
<?php include ("Footer.php");?>
</body>
</html>