<?php require ("ControlUsers.php");?>
<?php require ("Session.php");?>
<?php
Check_Login();
if(isset($_GET["ID"])){
	$user = LoadUser($_GET["ID"]);
	if($user==null){
		header("Location: 404.php");
	}
}else{
$user = $_SESSION['user'];
}
?>
<!DOCTYPE html>
<html>
<head>
<title>ACU Times | Profile</title>
<meta charset="iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="layout/styles/mediaqueries.css" type="text/css" media="all">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery-mobilemenu.min.js"></script>
</head>
<style>
.MyLargeContainer { float: left; padding: 10px; }
.MyContainer { padding: 10px; clear: both; }
.MyLable { float: left; text-align: right; width: 120px; }
.MyOut { float: left; text-align: left; }
.MyIMG { padding: 10px; float: left; }
.MyPhoto { background-image: url(images/demo/User.png); height: 140px; width: 140px; background-size: contain; }
.MyChangePhoto { padding-right: 10px; padding-left: 10px; padding-top: 5px; padding-bottom: 5px; width: 140px; background-color: #FF9900; border: thin; }

@media screen and (min-width : 250px) and (max-width : 650px) {
.MyIMG { float: none; text-align: center; }
}
</style>
<body>
<?php include ("Header.php");?>
<!-- content -->
<div class="wrapper row3">
	<div id="container"> 
		<!-- ################################################################################################ --> 
		<!-- main content -->
		<div class="MyIMG"><img class="MyPhoto" src="<?php echo $user["Photo"]; ?>"> <br>
			<input class="MyChangePhoto" type="submit" value=" Change image " >
		</div>
		<div class="MyLargeContainer" style="margin:0 auto">
			<div class="MyContainer">
				<div class="MyLable">ID :&nbsp;&nbsp;&nbsp;</div>
				<div class="MyOut"><?php echo $user["ID"]; ?></div>
			</div>
			<br>
			<div class="MyContainer">
				<div class="MyLable">E-mail :&nbsp;&nbsp;&nbsp;</div>
				<div class="MyOut"><?php echo $user["email"]; ?></div>
			</div>
			<br>
			<div class="MyContainer">
				<div class="MyLable">Member Since :&nbsp;&nbsp;&nbsp;</div>
				<div class="MyOut"><?php echo $user["RegisterDay"]."/".$user["RegisterMonth"]."/".$user["RegisterYear"]; ?></div>
			</div>
			<br>
			<hr>
			<!-- ################################################################################################ -->
			<div style="float:right;"> <a><i class="fa fa-pencil append-icon"></i> Edit</a></div>
			<div class="MyContainer">
				<div class="MyLable">Name :&nbsp;&nbsp;&nbsp;</div>
				<div class="MyOut"><?php echo $user["name"]; ?></div>
			</div>
			<br>
			<div class="MyContainer">
				<div class="MyLable">Phone Number :&nbsp;&nbsp;&nbsp;</div>
				<div class="MyOut"><?php echo $user["PhoneNo"]; ?></div>
			</div>
			<br>
			<div class="MyContainer">
				<div class="MyLable">BirthDay :&nbsp;&nbsp;&nbsp;</div>
				<div class="MyOut"><?php echo $user["BirthdayDay"]."/".$user["BirthdayMonth"]."/".$user["BirthdayYear"]; ?></div>
			</div>
			<br>
			<div class="MyContainer">
				<div class="MyLable">Country :&nbsp;&nbsp;&nbsp;</div>
				<div class="MyOut">
					<?php  ?>
				</div>
			</div>
			<br>
			<div class="MyContainer">
				<div class="MyLable">Address :&nbsp;&nbsp;&nbsp;</div>
				<div class="MyOut">
					<?php  ?>
				</div>
			</div>
			<br>
			<hr>
			<!-- ################################################################################################ -->
			<div class="MyContainer">
				<div class="MyLable" style="text-align:left">About :<br>
				</div>
				<br>
				<div class="MyOut"><?php echo $user["About"]; ?></div>
			</div>
		</div>
		<div style="clear:both ; padding:20px;"></div>
	</div>
</div>
</div>
</div>
<!-- ################################################################################################ -->
<?php include ("Footer.html");?>
</body>
</html>
