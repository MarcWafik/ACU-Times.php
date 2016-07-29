<?php require_once 'autoload.php';
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Article</title>
		<?php require_once("Header.php"); ?>
		<script type="text/javascript" src="js/Poll.js"></script>
		<script type="text/javascript" src="js/SocialMedia.js"></script>
	</head>
	<body>
		<?php include ("Navbar.php"); ?>
		<div class="container"> 

			<!-- Page Content -->
			<div class="container">
				<div class="row"> 

					<!-- Blog Post Content Column -->
					<div class="col-lg-8"> 

						<!-- Blog Post --> 

						<!-- Title -->
						<h1>Lorem ipsum dolor sit amet.</h1>
				<div class="dropdown pull-right">
					<button class="btn-setting btn btn-default " data-toggle="dropdown" aria-haspopup="true" > <i class="fa fa-bars" aria-hidden="true"></i> </button>
					<ul class="dropdown-menu" aria-labelledby="dLabel">
						<li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
						<li><a  href="#"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
					</ul>
				</div>
						<div class="container">
							<a href="#"> <img class="img-64x64 img-responsive img-circle pull-left " src="images/User.png"> </a>
							<div class="pull-left" style="padding-left:20px">
								<h5><strong>By <a href="#">Name of writer</a>, ACU Times</strong></h5>
								<h5> <span class="glyphicon glyphicon-time"></span> 3:00PM 10/10/2015 </h5>
							</div>
						</div>
						<hr>

						<!-- Preview Image --> 
						<img class="img-responsive" src="Data\Articles\3.jpg" alt="">
						<hr>

						<!-- Post Content -->

						<?php
						$ds = DIRECTORY_SEPARATOR;
						$loc = 'Data\Articles' . $ds . $article["ID"] . '.html';
						if (file_exists($loc)) {
							include( $loc );
						}
						?>
						<!---------------------------------------------- Socail Media ---------------------------------------------------------->
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







 <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="img-64x64 media-object img-circle" src="images/User.png" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">User Name
                            <small> August 25, 2014 at 9:30 PM</small>
                        </h4>
                       <p class="comment-text"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
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


						<div class="well affix" data-spy="affix" data-offset-top="80" data-offset-bottom="200">
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
		<?php include ("Footer.php"); ?>
	</body>
</html>