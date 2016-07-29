<?php require_once 'autoload.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Title</title>
		<?php require_once("Header.php"); ?>
	</head>
	<body>
		<?php include ("Navbar.php"); ?>

		<!-------------------------------- Articles -------------------------------->
		<div class="container">
			<h1 class="text-primary">Category Name</h1>
			<hr>
			<div class="row">
				<div class="col-md-7"> <a href="#"> <img class="img-responsive img-rounded img-hover" src="http://placehold.it/1920x1080"> </a> </div>
				<div class="col-md-5"> 
					<a href="#"><h3>Sed ultrices turpis sed rhoncus semper</h3></a>
					<h5>10/10/2015 <span class="glyphicon glyphicon-time"></span></h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque scelerisque mi, eu varius eros interdum sit amet. Maecenas at vulputate nisl. Aenean in varius purus. Praesent commodo fringilla euismod. In eu eros id arcu imperdiet rutrum. Curabitur malesuada tortor lobortis mauris pellentesque, et porttitor ligula porta. Morbi risus nulla, bibendum nec placerat id, finibus in eros. Sed eget massa vel eros lacinia dapibus id eu lorem.</p>
				</div>
			</div>
			<hr>

			<!------------------------------------------------------------------------------------------------------------------------------------>
			<div class="row">
				<div class="col-md-3"> <a href="#"> <img class="img-responsive img-rounded img-hover" src="http://placehold.it/1920x1080"> </a> </div>
				<div class="col-md-9">
					<a href="#">
						<h3>Sed ultrices turpis sed rhoncus semper</h3>
					</a>
					<h5>10/10/2015 <span class="glyphicon glyphicon-time"></span></h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque scelerisque mi, eu varius eros interdum sit amet. Maecenas at vulputate nisl. Aenean in varius purus. Praesent commodo fringilla euismod. In eu eros id arcu imperdiet rutrum. Curabitur malesuada tortor lobortis mauris pellentesque, et porttitor ligula porta. Morbi risus nulla, bibendum nec placerat id, finibus in eros. Sed eget massa vel eros lacinia dapibus id eu lorem.</p>
				</div>
			</div>
			<hr>
			<!------------------------------------------------------------------------------------------------------------------------------------> 
			<!------------------------------------------------------------------------------------------------------------------------------------>
			<div class="row">
				<div class="col-md-3"> <a href="#"> <img class="img-responsive img-rounded img-hover" src="http://placehold.it/1920x1080"> </a> </div>
				<div class="col-md-9">
					<h5 class="pull-right">10/10/2015 <span class="glyphicon glyphicon-time"></span></h5>
					<a href="#">
						<h3>Sed ultrices turpis sed rhoncus semper</h3>
					</a>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque scelerisque mi, eu varius eros interdum sit amet. Maecenas at vulputate nisl. Aenean in varius purus. Praesent commodo fringilla euismod. In eu eros id arcu imperdiet rutrum. Curabitur malesuada tortor lobortis mauris pellentesque, et porttitor ligula porta. Morbi risus nulla, bibendum nec placerat id, finibus in eros. Sed eget massa vel eros lacinia dapibus id eu lorem.</p>
				</div>
			</div>
			<hr>
			<!------------------------------------------------------------------------------------------------------------------------------------> 
			<!------------------------------------------------------------------------------------------------------------------------------------>
			<div class="row">
				<div class="col-md-3"> <a href="#"> <img class="img-responsive img-rounded img-hover" src="http://placehold.it/1920x1080"> </a> </div>
				<div class="col-md-9">
					<h5 class="pull-right">10/10/2015 <span class="glyphicon glyphicon-time"></span></h5>
					<a href="#">
						<h3>Sed ultrices turpis sed rhoncus semper</h3>
					</a>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque scelerisque mi, eu varius eros interdum sit amet. Maecenas at vulputate nisl. Aenean in varius purus. Praesent commodo fringilla euismod. In eu eros id arcu imperdiet rutrum. Curabitur malesuada tortor lobortis mauris pellentesque, et porttitor ligula porta. Morbi risus nulla, bibendum nec placerat id, finibus in eros. Sed eget massa vel eros lacinia dapibus id eu lorem.</p>
				</div>
			</div>
			<hr>
			<!------------------------------------------------------------------------------------------------------------------------------------> 
			<?php
			$title = "Sed ultrices turpis sed rhoncus semper";
			$link = "#";
			$description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque scelerisque mi, eu varius eros interdum sit amet. Maecenas at vulputate nisl. Aenean in varius purus. Praesent commodo fringilla euismod. In eu eros id arcu imperdiet rutrum.";
			$time = new DateTime;
			$time = $time->format('Y-m-d H:i:s');
			$img = "http://placehold.it/1920x1080";
			PrintHTML::portofolio_1row_large($title, $link, $description, $time, $img)
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
		<?php include ("Footer.php"); ?>
	</body>
</html>