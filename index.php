<?php 
require_once("PrintPortofolio.php");
require_once("ControlArticle.php");

$ArticleArr = LoadAllArticle();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ACU Times | Home</title>
<?php require_once("Header.php");?>
</head>
<body>
<?php include ("Navbar.php");?>
<div class="container">

       <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Home</h2>
            </div>
        </div>
        <!-- Heading Row -->

       <?php 
	   $i=0;
		foreach ($ArticleArr as &$Article){
			if(isset($Article["ID"])&&$Article["ID"]!=""&&$Article["ID"]!=" "){
				echo
				 printPortofolio_1LineLarge( 
				 $Article["IMG"], 
				 $Article["Name"], 
				 "Article.php?ID=".$Article["ID"], 
				 $Article["Brief"], 
				 $Article["ArticleDay"], 
				 $Article["ArticleMonth"],
				 $Article["ArticleYear"]);
				 
				 break;			
			}
		}
		?>
  <!------------------------------------------------------------------------------------------------------------------------>
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Top Stories</h2>
            </div>
        </div>
        <div class="row">
       <?php 
	   $i=0;
				foreach ($ArticleArr as &$Article){
			 $Article = $ArticleArr[$i];
			if(isset($Article["ID"])&&$Article["ID"]!=""&&$Article["ID"]!=" "){
				echo
				 printPortofolio_3Line ( 
				 $Article["IMG"], 
				 $Article["Name"], 
				 "Article.php?ID=".$Article["ID"], 
				 $Article["Brief"], 
				 $Article["ArticleDay"], 
				 $Article["ArticleMonth"],
				 $Article["ArticleYear"]);
				 
				 if(10<$i++) break;			
			}
		}
		?>
        </div>
</div>
<?php include ("Footer.php");?>
</body>
</html>