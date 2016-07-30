<?php require_once 'autoload.php';
?><!DOCTYPE html>
<html lang="en">
	<head>
		<script type="text/javascript" charset="utf-8">
			(function (G, o, O, g, L, e) {
				G[g] = G[g] || function () {
					(G[g]['q'] = G[g]['q'] || []).push(
							arguments)
				}, G[g]['t'] = 1 * new Date;
				L = o.createElement(O), e = o.getElementsByTagName(
						O)[0];
				L.async = 1;
				L.src = '//www.google.com/adsense/search/async-ads.js';
				e.parentNode.insertBefore(L, e)
			})(window, document, 'script', '_googCsa');
		</script>
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
					<a href="#"><div class="fill" style="background-image:url('images/demo/1.jpg');"></div></a>
					<div class="carousel-caption">
						<h2>Caption 1</h2>
					</div>
				</div>
				<div class="item">
					<a href="#"><div class="fill" style="background-image:url('images/demo/2.jpg');"></div></a>
					<div class="carousel-caption">
						<h2>Caption 2</h2>
					</div>
				</div>
				<div class="item">
					<a href="#"><div class="fill" style="background-image:url('images/demo/3.jpg');"></div></a>
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
				<div class="col-md-8 img-portfolio"> <a href="portfolio-item.html"> <img class="img-responsive img-rounded img-hover" src="images/demo/2.jpg" alt=""> </a> <a href="#">
						<h3>Sed ultrices turpis sed rhoncus semper</h3>
					</a>
					<h5>10/10/2015 <span class="glyphicon glyphicon-time"></span></h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque scelerisque mi, eu varius eros interdum sit amet. Maecenas at vulputate nisl. Aenean in varius purus. Praesent commodo fringilla euismod. In eu eros id arcu imperdiet rutrum.</p>
				</div>
				<div class="col-md-4 img-portfolio"> <a href="portfolio-item.html"> <img class="img-responsive img-rounded img-hover" src="images/demo/3.jpg" alt=""> </a> <a href="#">
						<h3>Sed ultrices turpis sed rhoncus semper</h3>
					</a>
					<h5>10/10/2015 <span class="glyphicon glyphicon-time"></span></h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque scelerisque mi, eu varius eros interdum sit amet. Maecenas at vulputate nisl. Aenean in varius purus. Praesent commodo fringilla euismod. In eu eros id arcu imperdiet rutrum.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 img-portfolio"> <a href="portfolio-item.html"> <img class="img-responsive img-rounded img-hover" src="images/demo/1.jpg" alt=""> </a> <a href="#">
						<h3>Sed ultrices turpis sed rhoncus semper</h3>
					</a>
					<h5>10/10/2015 <span class="glyphicon glyphicon-time"></span></h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque scelerisque mi, eu varius eros interdum sit amet. Maecenas at vulputate nisl. Aenean in varius purus. Praesent commodo fringilla euismod. In eu eros id arcu imperdiet rutrum.</p>
				</div>
				<div class="col-md-4 img-portfolio"> <a href="portfolio-item.html"> <img class="img-responsive img-rounded img-hover" src="images/demo/4.jpg" alt=""> </a> <a href="#">
						<h3>Sed ultrices turpis sed rhoncus semper</h3>
					</a>
					<h5>10/10/2015 <span class="glyphicon glyphicon-time"></span></h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque scelerisque mi, eu varius eros interdum sit amet. Maecenas at vulputate nisl. Aenean in varius purus. Praesent commodo fringilla euismod. In eu eros id arcu imperdiet rutrum.</p>
				</div>
				<div class="col-md-4 img-portfolio"> <a href="portfolio-item.html"> <img class="img-responsive img-rounded img-hover" src="images/demo/5.jpg" alt=""> </a> <a href="#">
						<h3>Sed ultrices turpis sed rhoncus semper</h3>
					</a>
					<h5>10/10/2015 <span class="glyphicon glyphicon-time"></span></h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque scelerisque mi, eu varius eros interdum sit amet. Maecenas at vulputate nisl. Aenean in varius purus. Praesent commodo fringilla euismod. In eu eros id arcu imperdiet rutrum.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 img-portfolio"> <a href="portfolio-item.html"> <img class="img-responsive img-rounded img-hover" src="images/demo/6.jpg" alt=""> </a> <a href="#">
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
				<div class="col-md-4 img-portfolio"> <a href="portfolio-item.html"> <img class="img-responsive img-rounded img-hover" src="images/demo/3.jpg" alt="" > </a> <a href="#">
						<h3>Sed ultrices turpis sed rhoncus semper</h3>
					</a>
					<h5>10/10/2015 <span class="glyphicon glyphicon-time"></span></h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque scelerisque mi, eu varius eros interdum sit amet. Maecenas at vulputate nisl. Aenean in varius purus. Praesent commodo fringilla euismod. In eu eros id arcu imperdiet rutrum.</p>
				</div>
			</div>
		</div>
	<center><div id="adcontainer1"></div></center>
	<script type="text/javascript" charset="utf-8">
		var pageOptions = {
			'pubId': 'pub-9616389000213823',
			'query': 'news',
			'hl': 'en',
			'adPage': 1
		};

		var adblock1 = {
			'container': 'adcontainer1',
			'width': '700px'
		};

		_googCsa('ads', pageOptions, adblock1);

	</script>

	<?php require_once("footer.php"); ?> 
</body>
</html>