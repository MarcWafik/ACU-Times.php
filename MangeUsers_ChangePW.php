<?php
require_once("ControlUsers.php");
require_once("ControlSession.php");
require_once("ControlFunctions.php");
Check_Login();
Check_Admin();
if(!isset($_GET["ID"]) || NULL == $_GET["ID"]){
		header("Location: 404.php");
}

$Passed = FALSE ;
$user = LoadUser($_GET["ID"]);
$iscorrect = Array();

if(!isset($user) || NULL == $user){
		header("Location: 404.php");
}

if(NULL != $user && valAllNotnull()){
	$iscorrect = valArrIscorrect();
	if(valAll($iscorrect)){
		$user["Password"]=Encrypt_And_Hash($_POST["Password"]);	
		UpdateUser($user);
		$Passed = TRUE ;
	}
}
//=========================================validate=========================================
function valAll($iscorrect) {
foreach ($iscorrect as $key => $value){
	if(FALSE == $value){
		return FALSE;	
		}
	}
	return TRUE;
}
function valArrIscorrect() {
	return Array( "Password"=>valPassword($_POST["Password"]) , "RePassword"=>valRePassword($_POST["RePassword"] , $_POST["Password"]));
}
function valAllNotnull() {
	return isset($_POST["Password"]) && isset($_POST["RePassword"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ACU Times | Title</title>
<?php require_once("Header.php");?>
</head>
<body>
<?php include ("Navbar.php");?>
<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
<div class="container">
<h3>
	<ul class="nav nav-pills">
		<li role="presentation" class="active"><a>Change PW</a></li>
		<li role="presentation" ><a>ID :</a></li>
		<li role="presentation" ><a><?php echo $_GET["ID"]  ?></a></li>
	</ul>
</h3>
<br>
<?php if($Passed) 
echo '<div class="alert alert-info alert-dismissable"> <a class="panel-close close" data-dismiss="alert">×</a> <i class="fa fa-check"></i> Password updated succsesfuly </div>' ?>
<form role="form" action="MangeUsers_ChangePW.php?ID=<?php echo $_GET["ID"]  ?>" method="post">
	<!-- #################################################################### Password #################################################################### -->
	<div class="form-group">
		<label for="Password">New password :</label>
		<input type="password" name="Password" id="Password" value="" class="form-control" onBlur="valPassword(this,Validate_Password)" required>
		<div id="Validate_Password" name = "Validate_Password" class="MyAlret">
			<?php if(isset($iscorrect["Password"])&&!$iscorrect["Password"]) echo "Must contain a number (0-9) ,upercase letter (A-Z) & lowercase letter (a-z)" ?>
		</div>
	</div>
	<!-- #################################################################### RePassword #################################################################### -->
	<div class="form-group">
		<label for="RePassword">Reenter password :</label>
		<input type="password" name="RePassword" id="RePassword" value="" class="form-control" onBlur="valRePassword(this,Validate_RePassword,Password)" required>
		<div id="Validate_RePassword" name = "Validate_RePassword" class="MyAlret">
			<?php if(isset($iscorrect["RePassword"])&&!$iscorrect["RePassword"]) echo "Password does not match" ?>
		</div>
	</div>
	<!-- #################################################################### Submit #################################################################### -->
	<div class="form-group pull-right">
		<a class="btn btn-default" href="MangeUsers.php">Go back</a>
		<span></span>
		<input class="btn btn-primary" value="Change Password" type="submit">
	</div>
	<!-- ####################################################################  #################################################################### -->
</form>
</div>
<?php include ("Footer.php");?>
</body>
</html>