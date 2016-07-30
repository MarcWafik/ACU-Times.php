<?php require_once 'autoload.php';
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Home</title>
		<?php require_once("header.php"); ?>
	</head>
	<body  style="<?php if (Language::isArabic()) echo 'direction: rtl'; ?>">
		<?php include ("navbar.php"); ?>

		<!-------------------------------- Slider -------------------------------->
		<header id="myCarousel" class="carousel slide"> 
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<a href="#"><div class="fill" style="background-image:url('images\1_b.jpg');"></div></a>
					<div class="carousel-caption">
						<h2>Caption 1</h2>
					</div>
				</div>
				<div class="item">
					<a href="#"><div class="fill" style="background-image:url('images\1_b.jpg');"></div></a>
					<div class="carousel-caption">
						<h2>Caption 2</h2>
					</div>
				</div>
				<div class="item">
					<a href="#"><div class="fill" style="background-image:url('Data/Articles/3.jpg');"></div></a>
					<div class="carousel-caption">
						<h2>Caption 3</h2>
					</div>
				</div>
			</div>

			<!-- Controls --> 
			<a class="left carousel-control" href="#myCarousel" data-slide="prev"> 
				<span class="icon-prev"></span> </a> 
			<a class="right carousel-control" href="#myCarousel" data-slide="next"> 
				<span class="icon-next"></span> </a> </header>
		<div class="container"> 

			<!-- Page Heading/Breadcrumbs -->
			<div class="row">
				<div class="col-lg-12">
					<h2 class="page-header">Latest News</h2>
				</div>
			</div>
			<!-- /.row -->

			<div class="row">
				<div class="col-md-8 img-portfolio"> <a href="portfolio-item.html"> 
						<div class="img-responsive img-rounded img-hover" style="background-image:url('images\4_b.jpg'); width: 100%; height: 200px; background-position: center; background-size: cover; "></div> </a> <a href="#">
						<h3>Sed ultrices turpis sed rhoncus semper</h3>
					</a>
					<h5>10/10/2015 <span class="glyphicon glyphicon-time"></span></h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque scelerisque mi, eu varius eros interdum sit amet. Maecenas at vulputate nisl. Aenean in varius purus. Praesent commodo fringilla euismod. In eu eros id arcu imperdiet rutrum.</p>
				</div>
				<div class="col-md-4 img-portfolio"> <a href="portfolio-item.html"> <img style="width: 100%" class="img-responsive img-rounded img-hover" src="images\4_b - Copy.jpg" alt=""> </a> <a href="#">
						<h3>Sed ultrices turpis sed rhoncus semper</h3>
					</a>
					<h5>10/10/2015 <span class="glyphicon glyphicon-time"></span></h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque scelerisque mi, eu varius eros interdum sit amet. Maecenas at vulputate nisl. Aenean in varius purus. Praesent commodo fringilla euismod. In eu eros id arcu imperdiet rutrum.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 img-portfolio"> <a href="portfolio-item.html"> <img class="img-responsive img-rounded img-hover" src="Data/Articles/1.jpg" alt=""> </a> <a href="#">
						<h3>Sed ultrices turpis sed rhoncus semper</h3>
					</a>
					<h5>10/10/2015 <span class="glyphicon glyphicon-time"></span></h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque scelerisque mi, eu varius eros interdum sit amet. Maecenas at vulputate nisl. Aenean in varius purus. Praesent commodo fringilla euismod. In eu eros id arcu imperdiet rutrum.</p>
				</div>
				<div class="col-md-4 img-portfolio"> <a href="portfolio-item.html"> <img class="img-responsive img-rounded img-hover" src="http://placehold.it/1920x1080" alt=""> </a> <a href="#">
						<h3>Sed ultrices turpis sed rhoncus semper</h3>
					</a>
					<h5>10/10/2015 <span class="glyphicon glyphicon-time"></span></h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque scelerisque mi, eu varius eros interdum sit amet. Maecenas at vulputate nisl. Aenean in varius purus. Praesent commodo fringilla euismod. In eu eros id arcu imperdiet rutrum.</p>
				</div>
				<div class="col-md-4 img-portfolio"> <a href="portfolio-item.html"> <img class="img-responsive img-rounded img-hover" src="http://placehold.it/1920x1080" alt=""> </a> <a href="#">
						<h3>Sed ultrices turpis sed rhoncus semper</h3>
					</a>
					<h5>10/10/2015 <span class="glyphicon glyphicon-time"></span></h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque scelerisque mi, eu varius eros interdum sit amet. Maecenas at vulputate nisl. Aenean in varius purus. Praesent commodo fringilla euismod. In eu eros id arcu imperdiet rutrum.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 img-portfolio"> <a href="portfolio-item.html"> <img class="img-responsive img-rounded img-hover" src="http://placehold.it/1920x1080" alt=""> </a> <a href="#">
						<h3>Sed ultrices turpis sed rhoncus semper</h3>
					</a>
					<h5>10/10/2015 <span class="glyphicon glyphicon-time"></span></h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque scelerisque mi, eu varius eros interdum sit amet. Maecenas at vulputate nisl. Aenean in varius purus. Praesent commodo fringilla euismod. In eu eros id arcu imperdiet rutrum.</p>
				</div>
				<div class="col-md-4 img-portfolio"> <a href="portfolio-item.html"> <img class="img-responsive img-rounded img-hover" src="http://placehold.it/1920x1080" alt=""> </a> <a href="#">
						<h3>Sed ultrices turpis sed rhoncus semper</h3>
					</a>
					<h5>10/10/2015 <span class="glyphicon glyphicon-time"></span></h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque scelerisque mi, eu varius eros interdum sit amet. Maecenas at vulputate nisl. Aenean in varius purus. Praesent commodo fringilla euismod. In eu eros id arcu imperdiet rutrum.</p>
				</div>
				<div class="col-md-4 img-portfolio"> <a href="portfolio-item.html"> <img class="img-responsive img-rounded img-hover" src="Data/Articles/3.jpg" alt="" > </a> <a href="#">
						<h3>Sed ultrices turpis sed rhoncus semper</h3>
					</a>
					<h5>10/10/2015 <span class="glyphicon glyphicon-time"></span></h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque scelerisque mi, eu varius eros interdum sit amet. Maecenas at vulputate nisl. Aenean in varius purus. Praesent commodo fringilla euismod. In eu eros id arcu imperdiet rutrum.</p>
				</div>
			</div>
		</div>
		<?php include ("footer.php"); ?>
	</body>
</html>