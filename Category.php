<?php 
require_once("PrintPortofolio.php");
require_once("ControlArticle.php");
require_once("ControlCategory.php");

function isValidCat($find ){
	global $CategoryList;
		foreach($CategoryList as $Category){
			if(isset($Category->ArrSubCategorys[0])){
				foreach($Category->ArrSubCategorys as $SubCat ){
					if($SubCat->Link === $Find){
						return TRUE;
					}
				}
			}else{
				if($Category->Link === $Find){
					return TRUE;
				}
			}
		}
	return FALSE;
}

$ArticleArr = Array();
if(!isset($_GET["Category"])){//||isValidCat($_GET["Category"]
	header("Location: 404.php");
	exit();
}
else{
	$ArticleArr = LoadArticleCategory($_GET["Category"]);
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

	<!-------------------------------- Articles -------------------------------->
	<div class="container">
	<h1><a><?php echo $_GET["Category"]?></a></h1>
	<hr>
		<?php 
		foreach ($ArticleArr as &$Article){
			if(isset($Article["ID"])&&$Article["ID"]!=""&&$Article["ID"]!=" "){
				echo
				 printPortofolio_1Line ( 
				 $Article["ID"]."-1.jpeg" , 
				 $Article["Name"], 
				 "Article.php?ID=".$Article["ID"], 
				 $Article["Brief"], 
				 $Article["ArticleDay"], 
				 $Article["ArticleMonth"],
				 $Article["ArticleYear"]);
			}
		}
		?>
	</div>
	<!-------------------------------- pagination -------------------------------->
	<div class="text-center center-block">
		<ul class = "pagination">
			<li><a href = "#">&laquo;</a></li>
			<li><a href = "?Page=1">1</a></li>
			<li><a href = "#">&raquo;</a></li>
		</ul>
	</div>
<?php include ("Footer.php");?>
</body>
</html>