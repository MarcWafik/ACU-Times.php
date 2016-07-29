<!DOCTYPE html>
<html lang="en">
<head>
<title>Bootstrap Case</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="layout/styles/custom.css">
<style>
/*.footer { background-color: #1b1b1b; background-image: -moz-linear-gradient(top, #222222, #111111); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#222222), to(#111111)); background-image: -webkit-linear-gradient(top, #222222, #111111); background-image: -o-linear-gradient(top, #222222, #111111); background-image: linear-gradient(to bottom, #222222, #111111); background-repeat: repeat-x; border-color: #252525;  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff222222', endColorstr='#ff111111', GradientType=0);
}*/
/*==================================================== Social Media Buttons Footer ====================================================*/
.social:hover { -webkit-transform: scale(1.1); -moz-transform: scale(1.1); -o-transform: scale(1.1); }
.social { -webkit-transform: scale(0.8); /* Browser Variations: */ -moz-transform: scale(0.8); -o-transform: scale(0.8); -webkit-transition-duration: 0.5s; -moz-transition-duration: 0.5s; -o-transition-duration: 0.5s; }
/*Multi-Coloured*/
.social-fb:hover { color: #3B5998; }
.social-tw:hover { color: #33ffff; }
.social-gp:hover { color: #d34836; }
.social-em:hover { color: #f39c12; }
.social-is:hover { color: black; }
.social-yt:hover { color: red; }
/*==================================================== Social Media Buttons Footer ====================================================*/
</style>
</head>
<body>
<?php
require_once ("ControlCategory.php");
require_once ("ControlSession.php");
session_start_once();
$Links;
$Display;
if(isset($_SESSION['user'])){
	$Links   = array("MangeUsers.php","WriteArticle.php","Profile.php", "Logout.php");
	$Display = array("Mange Users"   ,"Creat Article"   ,"Profile"    , "Logout");
}
else{
	$Links   = array("Login.php", "SignUp.php");
	$Display = array("Login"    , "SignUp");
}
$LinksSize = count($Links);
?>
<?php 
if(isset($_GET["Category"]))
	$sCategory = $_GET["Category"];
else
	$sCategory = "0" ;
?>
<?php 
function PrintLargeCategory(Category $Category)
{
	echo			'<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="Category.php?Category='.$Category->Link.'">'.$Category->Name.' <span class="caret"></span></a>
						<ul class="dropdown-menu">';
	foreach($Category->ArrSubCategorys as $SubCat ){
		echo '<li><a href="'.$SubCat->Link.'">'.$SubCat->Name.'</a></li>' ;
							}					
	echo				'</ul></li>';	
}
function PrintSmallCategory (Category $Category){
	echo '<li><a href="'.$Category->Link.'">'.$Category->Name.'</a></li>' ;
}
function PrintCategory(Category $Category){
	if(isset($Category->ArrSubCategorys[0])){
	PrintLargeCategory( $Category);
	}else{
	PrintSmallCategory ( $Category);
	}
}
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<a class="navbar-brand" href="#">ACU Times</a> </div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<!--
				<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="Category.php?Category=News">News <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Page 1-1</a></li>
						<li><a href="#">Page 1-2</a></li>
						<li><a href="#">Page 1-3</a></li>
					</ul>
				</li> -->
				<?php 
				foreach($CategoryList as $Category){
				PrintCategory($Category);
				}
				?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
			<form class="navbar-form navbar-right" role="search" action="Search.php" method="get">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search" name="Search">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
					</div>
				</div>
			</form>
		</div>
	</div>
</nav>
<div class="container">
	<h3>Collapsible Navbar</h3>
	<p>
	<pre><?php print_r($CategoryList); ?></pre>
	</p>
</div>
<footer class="footer">
	<div class="container">
		<hr>
		<div class="row">
			<div class="col-xs-12">
				<div class="text-center"> 
					<a href=""><i class="social fa fa-facebook-square fa-3x social-fb"></i></a>
					<a href=""><i class="social fa fa-twitter-square fa-3x social-tw"></i></a>
					<a href=""><i class="social fa fa-google-plus-square fa-3x social-gp"></i></a>
					<a href=""><i class="social fa fa-instagram fa-3x social-is"></i></a>
					<a href=""><i class="social fa fa-youtube-play fa-3x social-yt"></i></a>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-xs-8">
				<ul class="list-unstyled list-inline pull-left">
					<li><a href="#">Terms of Service</a></li>
					<li><a href="#">Contact Us</a></li>
					<li><a href="#">Privacy</a></li>
				</ul>
			</div>
			<div class="col-xs-4">
				<p class="text-muted pull-right">© 2016 ACU Times. All rights reserved</p>
			</div>
		</div>
	</div>
</footer>
</body>
</html>
