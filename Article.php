<?php require_once 'autoload.php';?>
<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ACU Times | Title</title>
<?php require_once("Header.php");?>
</head>
<body>
<?php include ("Navbar.php");?>
<div class="container">

<!-- Page Content -->
<div class="container">
<div class="row">

<!-- Blog Post Content Column -->
<div class="col-lg-8"> 
	
	<!-- Blog Post --> 
	
	<!-- Title -->
	<h1><?php echo $article["Name"]?></h1>
	
	<!-- Author -->
	<p class="lead"> by <a href="Profile.php?ID=<?php echo $article["WriterID"]?>"><?php echo $WriterName;?></a> ,ACU times </p>
	
	<!-- Date/Time -->
	<p><span class="glyphicon glyphicon-time"></span><?php echo $article["ArticleDay"]."/".$article["ArticleMonth"]."/".$article["ArticleYear"] ?></p>
	<hr>
	
	<!-- Preview Image --> 
	<img style="height:300px; width:900px;" class="img-responsive" src="Data\Articles\\<?php echo $article["IMG"] ?>" alt="">
	<hr>
	
	<!-- Post Content -->
	
	<?php 
				$ds = DIRECTORY_SEPARATOR;
				$loc = 'Data\Articles'.$ds.$article["ID"].'.html';
				if(file_exists ($loc )){
					include( $loc );
				}?>
	
	<!-- ############################################ Script ############################################ --> 
	<!---------------------------------------------------------- Facebook ---------------------------------------------------------->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> 
	<!---------------------------------------------------------- Twitter ----------------------------------------------------------> 
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script> 
	<!---------------------------------------------------------- Google + ----------------------------------------------------------> 
	<script type="text/javascript">
  (function() {
	var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	po.src = 'https://apis.google.com/js/platform.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script> 
	<!-- ############################################ /Socail Media ############################################ -->
	<?php 
$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
?>
	<div class="clearfix"><br>
		<br>
	</div>
	<div class="row Social-container">
		<ul>
			<!---------------------------------------------------------- Facebook ---------------------------------------------------------->
			<li>
				<div class="fb-like" data-href="<?php echo $url ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
			</li>
			<!---------------------------------------------------------- Twitter ---------------------------------------------------------->
			<li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $url ?>" data-text="ACU Times" data-via="ACUTimes">Tweet</a> </li>
			<!---------------------------------------------------------- Google + ---------------------------------------------------------->
			<li>
				<div class="g-plusone" data-annotation="inline" data-width="120" data-href="<?php echo $url ?>"></div>
			</li>
		</ul>
	</div>
	<!-- ############################################ /Socail Media ############################################ --> 
	<!---------------------------------------------- Posted Comments ----------------------------------------------------------> 
	
</div>

<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">
<!--
				<div class="well">
					<h4>RELATED STORIES</h4>
				</div>
				<div class="well">
					<h4>TOP STORIES</h4>
				</div>
				--> 
<!-- Side Widget Well -->
<div class="well">
<form role="form" action="SubmitYourPoll.php" method="post">
<label><span><?php echo"<h2> ".@$filecontent[0]." </h2> ";?></span></label>
<div class="radio">
	<label>
		<input type="radio" name="choice" value="1" required>
		<span><?php echo @$filecontent[1];?></span></label>
</div>
<div class="radio">
	<label>
		<input type="radio" name="choice" value="2">
		<span><?php echo @$filecontent[2];?></span></label>
</div>
<button type="submit" class="btn btn-primary">Send</button>
</div>
</div>
</div>
<!-- /.row -->
<hr>
</div>
</div>
<?php include ("Footer.php");?>
</body>
</html>