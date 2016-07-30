<?php require_once 'autoload.php';
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Pools</title>
		<?php require_once("header.php"); ?>
		<script type="text/javascript" src="js/Poll.js"></script>
		<script type="text/javascript" src="js/SocialMedia.js"></script>
	</head>
	<body>
	<?php require_once("navbar.php"); ?>
		<div class="container" style="padding-top:20px;"> 
			<!-------------------------------- Search -------------------------------->
			<div class="col-md-6 col-md-offset-3">
				<form action="polls.php" method="get">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for..." id="Search" name="Search">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
						</span> </div>
				</form>
			</div>
			<!-------------------------------- content -------------------------------->
			<div class="clearfix"><br><br><br><br></div>



						<div class=" col-lg-4 col-sm-6 col-xs-12">
							<h3> Poll: Browser Statistics </h3>
							<div> 
								<a name="poll_bar" >Chrome </a> <span name="poll_val">50.1% </span><br/>
								<a name="poll_bar" >Firefox</a> <span name="poll_val">36.4% </span><br/>
								<a name="poll_bar">IE </a> <span name="poll_val">9.8% </span><br/>
								<a name="poll_bar" >Safari </a> <span name="poll_val">3.7% </span><br/>
								<a name="poll_bar" 	>Opera </a> <span name="poll_val">1.6% </span><br/>
							</div>
						</div>
						<div class=" col-lg-4 col-sm-6 col-xs-12">
							<h3> Poll: Browser Statistics </h3>
							<div> 
								<a name="poll_bar" >Chrome </a> <span name="poll_val">50.1% </span><br/>
								<a name="poll_bar" >Firefox</a> <span name="poll_val">36.4% </span><br/>

							</div>
						</div>
						<div class=" col-lg-4 col-sm-6 col-xs-12">
							<h3> Poll: Browser Statistics </h3>
							<div> 
								<a name="poll_bar" >Chrome </a> <span name="poll_val">50.1% </span><br/>
								<a name="poll_bar" >Firefox</a> <span name="poll_val">36.4% </span><br/>
								<a name="poll_bar">IE </a> <span name="poll_val">9.8% </span><br/>
								<a name="poll_bar" >Safari </a> <span name="poll_val">3.7% </span><br/>
								<a name="poll_bar" 	>Opera </a> <span name="poll_val">1.6% </span><br/>
							</div>
						</div>
						<div class=" col-lg-4 col-sm-6 col-xs-12">
							<h3> Poll: Browser Statistics </h3>
							<div> 
								<a name="poll_bar" >Chrome </a> <span name="poll_val">50.1% </span><br/>
								<a name="poll_bar" >Firefox</a> <span name="poll_val">36.4% </span><br/>
								<a name="poll_bar">IE </a> <span name="poll_val">9.8% </span><br/>
								<a name="poll_bar" >Safari </a> <span name="poll_val">3.7% </span><br/>
								<a name="poll_bar" 	>Opera </a> <span name="poll_val">1.6% </span><br/>
							</div>
						</div>
						<div class=" col-lg-4 col-sm-6 col-xs-12">
							<h3> Poll: Browser Statistics </h3>
							<div> 
								<a name="poll_bar" >Chrome </a> <span name="poll_val">50.1% </span><br/>
								<a name="poll_bar" >Firefox</a> <span name="poll_val">36.4% </span><br/>

							</div>
						</div>
						<div class=" col-lg-4 col-sm-6 col-xs-12">
							<h3> Poll: Browser Statistics </h3>
							<div> 
								<a name="poll_bar" >Chrome </a> <span name="poll_val">50.1% </span><br/>
								<a name="poll_bar" >Firefox</a> <span name="poll_val">36.4% </span><br/>
								<a name="poll_bar">IE </a> <span name="poll_val">9.8% </span><br/>
								<a name="poll_bar" >Safari </a> <span name="poll_val">3.7% </span><br/>
								<a name="poll_bar" 	>Opera </a> <span name="poll_val">1.6% </span><br/>
							</div>
						</div>

			<div class="clearfix"><br><br><br><br></div>
			<hr>
			<!-------------------------------- pagination -------------------------------->
			<button type="button" class="btn btn-primary center-block" onClick="">Load more <i class="fa fa-arrow-down" aria-hidden="true"></i></button>
		</div>
		<?php include ("footer.php"); ?>
	</body>
</html>