<?php
require_once ("Session.php");
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

<div class="wrapper row1" style="background-image:url(images/demo/Header%20Back.png); background-repeat:no-repeat; background-size:cover">
	<header id="header" class="clear">
		<div id="hgroup" class="pad">
			<h1><a style="background-color:transparent" href="layout/pages/index.html"><span style="color:rgba(241,128,2,1.00)">ACU</span> Times</a></h1>
			<h2>Ahram Canadien University</h2>
		</div>
		<div id="SNAV" >
			<form action="Search.php" method="get">
				<fieldset>
					<legend>Search:</legend>
					<input id="NSearch" name="NSearch" type="text" value="Search Our Website&hellip;" onFocus="this.value=(this.value=='Search Our Website&hellip;')? '' : this.value ;">
					<input type="submit" id="Search" value="&#xf002;">
				</fieldset>
			</form>
		</div>
	</header>
</div>
<?php 
$Active = 'class="active"';
if(isset( $_GET["Category"]))
	$sCategory = $_GET["Category"];
else
$sCategory = "0" ;
?>
<div class="wrapper row2">
	<nav id="topnav"> 
		<!-- ################################################################################################ -->
		<div class="pad"> 
			<!-- ################################################################################################ -->
			<ul class="topnav clear">
				<li><a href="index.php">Home</a></li>
				<li <?php if($sCategory=="News"||$sCategory=="LocalNews"||$sCategory=="WorldNews"||$sCategory=="ACUCollegeNews") echo $Active ?>> <a href="Category.php?Category=News">News</a>
					<ul>
						<li><a href="Category.php?Category=LocalNews">Local News</a></li>
						<li><a href="Category.php?Category=WorldNews">World News</a></li>
						<li><a href="Category.php?Category=ACUCollegeNews">ACU College News</a></li>
					</ul>
				</li>
				<li <?php if($sCategory=="Art"||$sCategory=="Cinema"||$sCategory=="Drama"||$sCategory=="Theater") echo $Active ?>><a href="Category.php?Category=Art">Art</a>
					<ul>
						<li><a href="Category.php?Category=Cinema">Cinema</a></li>
						<li><a href="Category.php?Category=Drama">Drama</a></li>
						<li><a href="Category.php?Category=Theater">Theater</a></li>
					</ul>
				</li>
				<li <?php if($sCategory=="Sport"||$sCategory=="LocalFootaball"||$sCategory=="InternationalFootball"||$sCategory=="Other") echo $Active ?>><a href="Category.php?Category=Sport">Sport</a>
					<ul>
						<li><a href="Category.php?Category=LocalFootaball">Local Footaball</a></li>
						<li><a href="Category.php?Category=InternationalFootball">International Football</a></li>
						<li><a href="Category.php?Category=Other">Other</a></li>
					</ul>
				</li>
				<li <?php if($sCategory=="Interviews") echo $Active ?>><a href="Category.php?Category=Interviews">Interviews</a></li>
				<li <?php if($sCategory=="TechScience") echo $Active ?>><a href="Category.php?Category=TechScience">Tech &amp; Science</a></li>
				<li <?php if($sCategory=="Economy") echo $Active ?>><a href="Category.php?Category=Economy">Economy</a></li>
				<li <?php if($sCategory=="Multimedia") echo $Active ?>><a href="Category.php?Category=Multimedia">Multimedia</a></li>
				<li <?php if($sCategory=="Gallery") echo $Active ?>><a href="Category.php?Category=Gallery">Gallery</a></li>
				<li><a href="">Editors</a>
					<ul>
					<?php
					for($i=0;$i<$LinksSize;$i++){
						echo '<li><a href="'.$Links[$i].'">'.$Display[$i].'</a></li>';
						}
					?>
					</ul>
				</li>
			</ul>
			<!-- ################################################################################################ --> 
		</div>
		<!-- ################################################################################################ --> 
	</nav>
</div>
