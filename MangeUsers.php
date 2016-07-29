<?php 
require_once ("ControlUsers.php");
require_once ("Session.php");
Check_Login();
$user = $_SESSION['user'];
?>

<?php
if(Null===@$_GET["Search"]){
	$userArr = LoadAllUser();
}
else{
	$userArr= SearchAllUser($_GET["Search"]);
}
	

function printUser( $ID ,$name , $email , $Status , $ImgPath ){
	return	"<div class='MyLargeContainer'>
				<a href='Profile.php?ID={$ID}'><div class='MyIMG'><img src=''></div>
				<div class='MyContainer'>
					<div class='MyLable'>ID : </div>
					<div class='MyOut'>{$ID}</div>
					<br>
					<div class='MyLable'>Name : </div>
					<div class='MyOut'>{$name}</div>
					<br>
					<div class='MyLable'>E-mail : </div>
					<div class='MyOut'>{$email}</div>
				</div></a>
			</div>
			<div class='MyClear'><span class='MyStatus'>{$Status}</span>
				<hr>
			</div>";
	}
?>
<!DOCTYPE html>

<html>
<head>
<title>ACU Times | Users</title>
<meta charset="iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="layout/styles/mediaqueries.css" type="text/css" media="all">
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery-mobilemenu.min.js"></script>
<style>
.MyLargeContainer { margin-left: inherit; margin-top: inherit; padding: 10px; clear: both; }
.MyContainer { line-height: 1.5em; padding: 10px; float: left; color:#333333}
.MyLable { float: left; text-align: right; width: 80px; padding: 0 15px;  }
.MyOut { float: left; text-align: left; }
.MyIMG { margin: 5px; float: left; width: 80px; height: 80px; background-image:url(images/demo/User.png) ; background-size:cover;  }
.MyClear { clear: both; padding: 0px; text-align: right; }
.MyStatus { color:#E88C06 ;}
@media screen and (min-width : 250px) and (max-width : 550px) {
.MyLable { padding: 0 5px ; width: 50px; }
}
</style>
</head>
<body>
<?php include ("Header.php");?>
<!-- content -->
<div class="wrapper row3">
	<div id="container"> 
			<!-- ################################################################################################ -->
	
		<div id="advSearchBarDiv" class="pad">
			<form action="MangeUsers.php" method="get">
				<fieldset>
					<div style="width:100%">
						<div style="height:35px; width:100% ;border:1px solid #686868;border-radius:3px; margin:0; position:relative;">
							<input id="Search" name="Search" type="text" value="Search for a user &hellip;" class="MySearchBar" onFocus="this.value=(this.value=='Search for a user &hellip;')? '' : this.value ;">
							<input type="submit" value="&#xf002;" class="  MySearchButton" >
						</div>
						<div class="clear"></div>
					</div>
				</fieldset>
			</form>
			<div class="clear"><br><br></div>
		</div>
		
		<!-- ################################################################################################ --> 
		<!-- ################################################################################################ -->
		
		<div style="padding-bottom:20px;"> 
		<?php 
		foreach ($userArr as &$user){
		echo printUser( $user["ID"],$user["name"] , $user["email"] , $user["Status"] ,$user["Photo"]  ); 
		}
		?>
		</div>
		<!-- ####################################################################################################### -->
		<div class="pagination">
			<ul>
				<li class="prev"><a href="#">&laquo; Previous</a></li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li class="splitter"><strong>&hellip;</strong></li>
				<li><a href="#">6</a></li>
				<li class="current"><strong>7</strong></li>
				<li><a href="#">8</a></li>
				<li class="splitter"><strong>&hellip;</strong></li>
				<li><a href="#">14</a></li>
				<li><a href="#">15</a></li>
				<li class="next"><a href="#">Next &raquo;</a></li>
			</ul>
		</div>
		<!-- / content body --> 
		<!-- ################################################################################################ -->
		<div class="clear"></div>
	</div>
	<!-- ################################################################################################ --> 
</div>
</div>
<?php include ("Footer.html");?>
</body>
</html>