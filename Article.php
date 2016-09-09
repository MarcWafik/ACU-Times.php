<?php
require_once 'autoload.php';
$article = new Article();
if (isset($_GET["id"]) && $article->read($_GET["id"])) {
	
} else {
	Header::ResponseCode(Header::NOT_FOUND);
	exit;
}

$writer = new User();
$writer->read($article->getWriterID());
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Article</title>
		<?php require_once("header.php"); ?>
		<script type="text/javascript" src="js/Poll.js"></script>
		<script type="text/javascript" src="js/SocialMedia.js"></script>
	</head>
	<body>
		<?php include ("navbar.php"); ?>
		<div class="container"> 

			<!-- Page Content -->
			<div class="container">
				<div class="row"> 

					<!-- Blog Post Content Column -->
					<div class="col-lg-8"> 

						<!-- Blog Post --> 

						<!-- Title -->
						<h1><?php echo $article->getTitleEnglish() ?></h1>
















						<div class="dropdown pull-right <?php if (User::CheckLogin() && $article->hasAccsesToModify(User::getSessionAccses())) echo "hiden" ?>">
							<button class="btn-setting btn btn-default " data-toggle="dropdown" aria-haspopup="true" > <i class="fa fa-bars" aria-hidden="true"></i> </button>
							<ul class="dropdown-menu" aria-labelledby="dLabel">
								<li><a href="create_article.php?id=<?php echo $article->getId(); ?>"><i class="fa fa-pencil"></i> Edit</a></li>
								<li><a  href="redir_delete_article_entity.php?id=<?php echo $article->getId() . '&type=' . EntityArticle::TYPE_ARTICLE; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
							</ul>
						</div>












						<div class="container">
							<a href="#"> <img class="img-64x64 img-responsive img-circle pull-left " src="images/User.png"> </a>
							<div class="pull-left" style="padding-left:20px">
								<h5><strong>By <a href="profile.php?id=<?php echo $article->getWriterID; ?>"><?php echo $writer->getfullName(); ?></a>, ACU Times</strong></h5>
								<h5> <span class="glyphicon glyphicon-time"></span> <?php echo $article->getCreatDate_StringLong() ?> </h5>
							</div>
						</div>
						<hr>

						<!-- Preview Image --> 
						<img class="img-responsive" src="<?php echo Image::getMainImage($article->getId(), Image::ARTICLE) ?>" alt="">
						<hr>

						<!-- Post Content -->

						<?php echo $article->getBodyEnglish(); ?>
						<!---------------------------------------------- Social Media ---------------------------------------------------------->
						<?php
						$url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
						$url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
						?>
						<div class="clearfix"><br>
							<br>
						</div>
						<div id="fb-root"></div>
						<div class="row Social-container">
							<ul>
								<li>
									<div class="fb-like" data-href="<?php echo $url ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
								</li>
								<li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $url ?>" data-text="ACU Times" data-via="ACUTimes">Tweet</a> </li>
								<li>
									<div class="g-plusone" data-annotation="inline" data-width="120" data-href="<?php echo $url ?>"></div>
								</li>
							</ul>
						</div>
						<!---------------------------------------------- Posted Comments ----------------------------------------------------------> 
						<!-- Blog Comments --> 
						<!-- Comments Form -->
						<div class="well">
							<h4>Leave a Comment:</h4>
							<form role="form">
								<div class="form-group">
									<textarea class="form-control" rows="3"></textarea>
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
						<hr>

						<!-- Comment -->
						<div class="media"> <a class="pull-left" href="#"> <img style="width:64px; height:64px" class="media-object" src="images/User.png" alt=""> </a>
							<div class="media-body">
								<h4 class="media-heading">Start Bootstrap <small>August 25, 2014 at 9:30 PM</small> </h4>
								Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. </div>
						</div>

						<!-- Comment -->
						<div class="media"> <a class="pull-left" href="#"> <img style="width:64px; height:64px" class="media-object" src="images/User.png" alt=""> </a>
							<div class="media-body">
								<h4 class="media-heading">Start Bootstrap <small>August 25, 2014 at 9:30 PM</small> </h4>
								Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. 
								<!-- Nested Comment -->
								<div class="media"> <a class="pull-left" href="#"> <img style="width:64px; height:64px" class="media-object" src="images/User.png" alt=""> </a>
									<div class="media-body">
										<h4 class="media-heading">Nested Start Bootstrap <small>August 25, 2014 at 9:30 PM</small> </h4>
										Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. </div>
								</div>
								<!-- End Nested Comment --> 
							</div>
						</div>
					</div>

					<!-- Blog Sidebar Widgets Column -->

					<div class="col-md-4" style="padding-top:20px;">
						<div class="well">
							<h4>RELATED STORIES</h4>
						</div>
						<div class="well">
							<h4>TOP STORIES</h4>
						</div>


						<div class="well">
							<h3> Poll: Browser Statistics </h3>
							<div> 
								<a name="poll_bar" href="#">Chrome </a> <span name="poll_val">50.1% </span><br/>
								<a name="poll_bar" href="#">Firefox</a> <span name="poll_val">36.4% </span><br/>
								<a name="poll_bar" href="#">IE </a> <span name="poll_val">9.8% </span><br/>
								<a name="poll_bar" href="#">Safari </a> <span name="poll_val">3.7% </span><br/>
								<a name="poll_bar" href="#">Opera </a> <span name="poll_val">1.6% </span><br/>
							</div>
						</div>
					</div>
				</div>
				<!-- /.row -->
				<hr>
			</div>
		</div>
		<?php include ("footer.php"); ?>
	</body>
</html>