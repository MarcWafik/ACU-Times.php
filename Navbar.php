<?php
require_once ("ControlCategory.php");
require_once ("ControlSession.php");
session_start_once();
?>
<?php 
if(isset($_GET["Category"]))
	$sCategory = $_GET["Category"];
else
	$sCategory = "0" ;

function PrintLargeCategory(Category $Category)
{
	echo			'<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="Category.php?Category='.$Category->Link.'">'.$Category->Name.' <span class="caret"></span></a>
						<ul class="dropdown-menu">';
	foreach($Category->ArrSubCategorys as $SubCat ){
		echo '<li><a href="Category.php?Category='.$SubCat->Link.'">'.$SubCat->Name.'</a></li>' ;
							}					
	echo				'</ul></li>';	
}
function PrintSmallCategory (Category $Category){
	echo '<li><a href="Category.php?Category='.$Category->Link.'">'.$Category->Name.'</a></li>' ;
}
function PrintCategory(Category $Category){
	if(isset($Category->ArrSubCategorys[0])){
	PrintLargeCategory( $Category);
	}else{
	PrintSmallCategory ( $Category);
	}
}
?>
<nav class="navbar navbar-inverse"> <!--navbar-fixed-top-->
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<a class="navbar-brand" href="index.php">ACU Times</a> </div>
		<div class="collapse navbar-collapse" id="myNavbar">

			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
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
				<li><a href="Multimedia.php">Multimedia</a></li>
				<li><a href="Gallery.php">Gallery</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<!--<li><a href="SignUp.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
<?php
if(isset($_SESSION['user'])){
echo "
<li class='dropdown'> <a class='dropdown-toggle' data-toggle='dropdown' href=''><span class='glyphicon glyphicon-user'></span> {$_SESSION['user']['name']}<span class='caret'></span></a>
	<ul class='dropdown-menu'>
		<li><a href='Profile.php'>Profile</a></li>
		<li><a href='WriteArticle.php'>Write Article</a></li>
		<li><a href='MangeUsers.php'>Mange Users</a></li>
		<li><a href='Logout.php'>Logout</a></li>
	</ul>
</li>";
} else {
echo"<li><a href='LogIn.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
}

?>
				
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