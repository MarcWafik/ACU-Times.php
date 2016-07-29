<!DOCTYPE html>

<html>
<head>
<title>RS-Fusion V.1</title>
<meta charset="iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="layout/styles/mediaqueries.css" type="text/css" media="all">
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery-mobilemenu.min.js"></script>
<!-- slider -->
<link rel="stylesheet" href="layout/scripts/flexslider/flexslider.css" type="text/css" media="all">
<script src="layout/scripts/flexslider/jquery-flexslider.min.js"></script>
<!-- / slider -->
</head>
<body>
<div class="wrapper row1" style="background-image:url(images/demo/Header%20Back.png); background-repeat:no-repeat; background-size:cover">
	<header id="header" class="clear">
		<div id="hgroup" class="pad">
			<h1><a style="background-color:transparent" href="layout/pages/index.html"><span style="color:rgba(241,128,2,1.00)">ACU</span> Times</a></h1>
			<h2>Ahram Canadien University</h2>
		</div>
		<form action="#" method="post">
			<fieldset>
				<legend>Search:</legend>
				<input type="text" value="Search Our Website&hellip;" onFocus="this.value=(this.value=='Search Our Website&hellip;')? '' : this.value ;">
				<input type="submit" id="Search" value="" style="background-image:url(images/demo/search.png)">
			</fieldset>
		</form>
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
				<li <?php if($sCategory=="News"||$sCategory=="LocalNews"||$sCategory=="WorldNews"||$sCategory=="ACUCollegeNews") echo 'class="active"' ?>> <a href="Category.php?Category=News">News</a>
					<ul>
						<li><a href="Category.php?Category=LocalNews">Local News</a></li>
						<li><a href="Category.php?Category=WorldNews">World News</a></li>
						<li><a href="Category.php?Category=ACUCollegeNews">ACU College News</a></li>
					</ul>
				</li>
				<li <?php if($sCategory=="Art"||$sCategory=="Cinema"||$sCategory=="Drama"||$sCategory=="Theater") echo 'class="active"' ?>><a href="Category.php?Category=Art">Art</a>
					<ul>
						<li><a href="Category.php?Category=Cinema">Cinema</a></li>
						<li><a href="Category.php?Category=Drama">Drama</a></li>
						<li><a href="Category.php?Category=Theater">Theater</a></li>
					</ul>
				</li>
				<li <?php if($sCategory=="Sport"||$sCategory=="LocalFootaball"||$sCategory=="InternationalFootball"||$sCategory=="Other") echo 'class="active"' ?>><a href="Category.php?Category=Sport">Sport</a>
					<ul>
						<li><a href="Category.php?Category=LocalFootaball">Local Footaball</a></li>
						<li><a href="Category.php?Category=InternationalFootball">International Football</a></li>
						<li><a href="Category.php?Category=Other">Other</a></li>
					</ul>
				</li>
				<li <?php if($sCategory=="Interviews") echo 'class="active"' ?>><a href="Category.php?Category=Interviews">Interviews</a></li>
				<li <?php if($sCategory=="TechScience") echo 'class="active"' ?>><a href="Category.php?Category=TechScience">Tech &amp; Science</a></li>
				<li <?php if($sCategory=="Economy") echo 'class="active"' ?>><a href="Category.php?Category=Economy">Economy</a></li>
				<li <?php if($sCategory=="Multimedia") echo 'class="active"' ?>><a href="Category.php?Category=Multimedia">Multimedia</a></li>
				<li <?php if($sCategory=="Gallery") echo 'class="active"' ?>><a href="Category.php?Category=Gallery">Gallery</a></li>
				<li><a href="">Editors</a>
					<ul>
						<li><a href="LogIn.php">Log in</a></li>
						<li><a href="Register.php">Sign up</a></li>
					</ul>
				</li>
			</ul>
			<!-- ################################################################################################ --> 
		</div>
		<!-- ################################################################################################ --> 
	</nav>
</div>

<!-- content -->
<div class="wrapper row3">
	<div id="container"> 
		<!-- ################################################################################################ -->
		<div class="pad"> 
			<!-- ################################################################################################ --> 
			<!-- Slider -->
			<div id="featured_slide">
				<section class="flexslider">
					<ul class="slides">
						<li>
							<figure><a href="#"><img src="images/demo/960x360.gif" alt=""></a>
								<figcaption class="flex-caption">
									<h2>Slide 1 Caption</h2>
									<p>Dapiensociis temper donec auctortortis cumsan et curabitur condis lorem .</p>
									<footer class="more"><a href="#">Read More Here &raquo;</a></footer>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure><a href="#"><img src="images/demo/960x360.gif" alt=""></a>
								<figcaption class="flex-caption">
									<h2>Slide 2 Caption</h2>
									<p>Dapiensociis temper donec auctortortis cumsan et curabitur condis lorem</p>
									<footer class="more"><a href="#">Read More Here &raquo;</a></footer>
								</figcaption>
							</figure>
						</li>
						<li class="last">
							<figure><a href="#"><img src="images/demo/960x360.gif" alt=""></a>
								<figcaption class="flex-caption">
									<h2>Slide 3 Caption</h2>
									<p>Dapiensociis temper donec auctortortis cumsan et curabitur condis lorem.</p>
									<footer class="more"><a href="#">Read More Here &raquo;</a></footer>
								</figcaption>
							</figure>
						</li>
					</ul>
				</section>
			</div>
			<!-- main content -->
			<div id="homepage"> 
				<!-- Introduction -->
				<section id="intro" class="clear">
					<article class="one_fifth first"><a href="#"><img src="images/demo/166x130.gif" alt=""></a>
						<h2>Indonectetus facilis</h2>
						<p>Nullamlacus dui ipsum conseque loborttis non euisque morbi penas dapibulum orna.</p>
						<footer class="more"><a href="#">Read More &raquo;</a></footer>
					</article>
					<article class="one_fifth"><a href="#"><img src="images/demo/166x130.gif" alt=""></a>
						<h2>Indonectetus facilis</h2>
						<p>Nullamlacus dui ipsum conseque loborttis non euisque morbi penas dapibulum orna.</p>
						<footer class="more"><a href="#">Read More &raquo;</a></footer>
					</article>
					<article class="one_fifth"><a href="#"><img src="images/demo/166x130.gif" alt=""></a>
						<h2>Indonectetus facilis</h2>
						<p>Nullamlacus dui ipsum conseque loborttis non euisque morbi penas dapibulum orna.</p>
						<footer class="more"><a href="#">Read More &raquo;</a></footer>
					</article>
					<article class="one_fifth"><a href="#"><img src="images/demo/166x130.gif" alt=""></a>
						<h2>Indonectetus facilis</h2>
						<p>Nullamlacus dui ipsum conseque loborttis non euisque morbi penas dapibulum orna.</p>
						<footer class="more"><a href="#">Read More &raquo;</a></footer>
					</article>
					<article class="one_fifth last"><a href="#"><img src="images/demo/166x130.gif" alt=""></a>
						<h2>Indonectetus facilis</h2>
						<p>Nullamlacus dui ipsum conseque loborttis non euisque morbi penas dapibulum orna.</p>
						<footer class="more"><a href="#">Read More &raquo;</a></footer>
					</article>
				</section>
				<!-- / Introduction --> 
				<!-- ########################################################################################## --> 
				<!-- Services -->
				<section id="services" class="last clear">
					<h1 class="hidden">Services We Offer</h1>
					<article class="one_third first">
						<figure class="clear"><img src="images/demo/48x48.gif" alt="">
							<figcaption>
								<h2>Indonectetus facilis</h2>
								<p>Proin quam etiam ultrices suspen disse in justo eu magna.</p>
							</figcaption>
						</figure>
					</article>
					<article class="one_third">
						<figure class="clear"><img src="images/demo/48x48.gif" alt="">
							<figcaption>
								<h2>Indonectetus facilis</h2>
								<p>Proin quam etiam ultrices suspen disse in justo eu magna.</p>
							</figcaption>
						</figure>
					</article>
					<article class="one_third">
						<figure class="clear"><img src="images/demo/48x48.gif" alt="">
							<figcaption>
								<h2>Indonectetus facilis</h2>
								<p>Proin quam etiam ultrices suspen disse in justo eu magna.</p>
							</figcaption>
						</figure>
					</article>
					<article class="one_third first">
						<figure class="clear"><img src="images/demo/48x48.gif" alt="">
							<figcaption>
								<h2>Indonectetus facilis</h2>
								<p>Proin quam etiam ultrices suspen disse in justo eu magna.</p>
							</figcaption>
						</figure>
					</article>
					<article class="one_third">
						<figure class="clear"><img src="images/demo/48x48.gif" alt="">
							<figcaption>
								<h2>Indonectetus facilis</h2>
								<p>Proin quam etiam ultrices suspen disse in justo eu magna.</p>
							</figcaption>
						</figure>
					</article>
					<article class="one_third last">
						<figure class="clear"><img src="images/demo/48x48.gif" alt="">
							<figcaption>
								<h2>Indonectetus facilis</h2>
								<p>Proin quam etiam ultrices suspen disse in justo eu magna.</p>
							</figcaption>
						</figure>
					</article>
				</section>
				<!-- / Services --> 
			</div>
			<!-- ################################################################################################ -->
			<div class="clear"></div>
		</div>
		<!-- ################################################################################################ --> 
	</div>
</div>
<!-- Footer -->
<div class="wrapper row4" style="background-color:#232323">
	<div id="footer"> 
		<!-- ################################################################################################ -->
		<div class="pad"> 
			<!-- ################################################################################################ -->
			<section class="one_quarter first">
				<h2 style="font-size:18px">Categorys</h2>
				<nav>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="Category.php">News</a></li>
						<li><a href="Category.php">Local News</a></li>
						<li><a href="Category.php">World News</a></li>
						<li><a href="Category.php">ACU College News</a></li>
						<li><a href="Category.php">Art</a></li>
						<li><a href="Category.php">Cinema</a></li>
						<li><a href="Category.php">Drama</a></li>
						<li><a href="Category.php">Theater</a></li>
					</ul>
				</nav>
			</section>
			<section class="one_quarter">
				<h2 style="font-size:18px">Quick Links</h2>
				<nav>
					<ul>
						<li><a href="Category.php">Sport</a></li>
						<li><a href="Category.php">Local Footaball</a></li>
						<li><a href="Category.php">International Football</a></li>
						<li><a href="Category.php">Interviews</a></li>
						<li><a href="Category.php">tech &amp; science</a></li>
						<li><a href="Category.php">Economy</a></li>
						<li><a href="Category.php">Multimedia</a></li>
						<li><a href="Category.php">Galery</a></li>
					</ul>
				</nav>
			</section>
			<section class="one_quarter">
				<h2 style="font-size:18px">Social Media</h2>
				<div class="ft_gallery clear">
					<ul>
						<li style="padding:10px" class="one_third first"><a href="#"><img src="images/demo/twitter-60x60.png" alt=""/></a></li>
						<li style="padding:10px" class="one_third"><a href="#"><img src="images/demo/facebook-60x60.png" alt=""/></a></li>
						<li style="padding:10px" class="one_third first"><a href="#"><img src="images/demo/Google+-60x60.png" alt=""/></a></li>
						<li style="padding:10px" class="one_third"><a href="#"><img src="images/demo/instgram-60x60.png" alt="" /></a></li>
						<li style="padding:10px" class="one_third first"><a href="#"><img src="images/demo/youtube-60x60.png" alt=""/></a></li>
					</ul>
				</div>
			</section>
			<section class="one_quarter last">
				<h2 style="font-size:18px">Contact us</h2>
				<div style="text-align:left;">
					<form class="rnd5" action="#" method="post">
						<div class="form-input clear">
							<label for="ft_author">Name <span class="required">*</span><br>
								<input style="width:95%" type="text" name="ft_author" id="ft_author" value="" size="22">
							</label>
							<label for="ft_email">Email <span class="required">*</span><br>
								<input style="width:95%" type="text" name="ft_email" id="ft_email" value="" size="22">
							</label>
						</div>
						<div class="form-message">
							<textarea  style="width:95%" name="ft_message" id="ft_message" cols="25" rows="10"></textarea>
						</div>
						<p style=" text-align:right ;">
							<input style=" padding:5px 18px ;
							 background-color:#FF9900; border:thin ; border-radius:5px" type="submit" value="Submit" class="button small">
						</p>
					</form>
				</div>
			</section>
			<!-- ################################################################################################ -->
			<div class="clear"></div>
		</div>
		<!-- ################################################################################################ --> 
	</div>
</div>
<!-- Copyright -->
<div class="wrapper row5">
	<footer id="copyright" class="clear">
		<div class="pad">
			<p class="fl_left">Copyright &copy; 2016 - All Rights Reserved - <a href="#"> ACU Times</a></p>
			<p class="fl_right">Thanks to <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a>&nbsp;&amp; Our <a href="#" title="Free Website Templates"> Developers</a></p>
		</div>
	</footer>
</div>
</body>
</html>