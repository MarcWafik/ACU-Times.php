<?php
require_once 'autoload.php';
$youtube = new Youtube();
if (isset($_GET["id"]) && $youtube->read($_GET["id"])) {
	
} else {
	Header::ResponseCode(Header::NOT_FOUND);
	exit;
}
$writer = new User();
if (!$writer->read($youtube->getWriterID())) {
	$writer = new User();
}
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Title</title>
		<?php require_once("header.php"); ?>
	</head>
	<body>
		<?php include ("navbar.php"); ?>
		<br><br>
		<div class="container">
			<div class="col-md-8 ">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $youtube->getyoutubeID() ?>" frameborder="0" allowfullscreen></iframe>
				</div>
				<div class="row">
					<h2 class="text-primary"> <?php echo $youtube->getTitleEnglish(); ?></h2>
				</div>
				<div class="dropdown pull-right">
					<button class="btn-setting btn btn-default " data-toggle="dropdown" aria-haspopup="true" > <i class="fa fa-bars" aria-hidden="true"></i> </button>
					<ul class="dropdown-menu" aria-labelledby="dLabel">
						<li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
						<li><a  href="#"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
					</ul>
				</div>
				<div class="container">
					<a href="profile.php?id=<?php echo $youtube->getWriterID; ?>"> <img style="height:60px" class="img-responsive img-circle pull-left" src="images/User.png"> </a>
					<div class="pull-left" style="padding-left:10px">
						<h5><strong>By <a href="profile.php?id=<?php echo $youtube->getWriterID; ?>"><?php echo $writer->getfullName(); ?></a>, ACU Times</strong></h5>
						<h5> <span class="glyphicon glyphicon-time"></span> <?php echo $youtube->getCreatDate_StringLong(); ?> </h5>
					</div>
				</div>
				<hr>
				<div class="row">
					<p><?php echo $youtube->getDescriptionEnglish(); ?></p>
				</div>
				<hr>
			</div>
			<div class="col-md-4">
				<h4>Up next</h4>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6"> <a href="#"> <img class="img-responsive img-hover" src="http://img.youtube.com/vi/YQHsXMglC9A/mqdefault.jpg"> </a> </div>
					<div class="col-xs-6 col-sm-6 col-md-6"> 
						<a href="#"><h4>Sed ultrices turpis sed rhoncus semper</h4></a>
						<h6>10/10/2015 <span class="glyphicon glyphicon-time"></span></h6>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6"> <a href="#"> <img class="img-responsive img-hover" src="http://img.youtube.com/vi/YQHsXMglC9A/mqdefault.jpg"> </a> </div>
					<div class="col-xs-6 col-sm-6 col-md-6"> 
						<a href="#"><h4>Sed ultrices turpis sed rhoncus semper</h4></a>
						<h6>10/10/2015 <span class="glyphicon glyphicon-time"></span></h6>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6"> <a href="#"> <img class="img-responsive img-hover" src="http://img.youtube.com/vi/YQHsXMglC9A/mqdefault.jpg"> </a> </div>
					<div class="col-xs-6 col-sm-6 col-md-6"> 
						<a href="#"><h4>Sed ultrices turpis sed rhoncus semper</h4></a>
						<h6>10/10/2015 <span class="glyphicon glyphicon-time"></span></h6>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6"> <a href="#"> <img class="img-responsive img-hover" src="http://img.youtube.com/vi/YQHsXMglC9A/mqdefault.jpg"> </a> </div>
					<div class="col-xs-6 col-sm-6 col-md-6"> 
						<a href="#"><h4>Sed ultrices turpis sed rhoncus semper</h4></a>
						<h6>10/10/2015 <span class="glyphicon glyphicon-time"></span></h6>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6"> <a href="#"> <img class="img-responsive img-hover" src="http://img.youtube.com/vi/YQHsXMglC9A/mqdefault.jpg"> </a> </div>
					<div class="col-xs-6 col-sm-6 col-md-6"> 
						<a href="#"><h4>Sed ultrices turpis sed rhoncus semper</h4></a>
						<h6>10/10/2015 <span class="glyphicon glyphicon-time"></span></h6>
					</div>
				</div>
				<br>
			</div>
		</div>
	</div>
	<?php include ("footer.php"); ?>
</body>
</html>