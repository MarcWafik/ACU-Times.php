<?php require_once 'autoload.php';
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Members</title>
		<?php require_once("header.php"); ?>
	</head>
	<body>
		<?php include ("navbar.php"); ?>
		<div class="container" style="padding-top:20px;"> 
			<!-------------------------------- Search -------------------------------->
			<div class="col-md-6 col-md-offset-3">
				<form action="members.php" method="get">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for..." id="Search" name="Search">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
						</span> </div>
				</form>
			</div>
			<!-------------------------------- content -------------------------------->
			<div class="clearfix"></div>



			<!-------			
			<hr>
			<div class="container">
				<div class=" col-xs-11">
					<div class="col-sm-2 text-center"><a href="Profile.php?ID={$ID}"><img src="images/User.png" class="img-80x80 img-circle"></a></div>
					<div class="col-sm-10">
						<h4><a href="Profile.php?ID={$ID}">Marc Wafik</a><br>
							<small>4141127<br>
								something@something.com</small></h4>
					</div>
				</div>
				<div class="dropdown col-xs-1">
					<button class="btn-setting btn btn-default " data-toggle="dropdown" aria-haspopup="true" > <i class="fa fa-bars" aria-hidden="true"></i> </button>
					<ul class="dropdown-menu" aria-labelledby="dLabel">
						<li><a href="#"><i class="fa fa-user"></i> Make Admin</a></li>
						<li><a  href="#"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
						<li><a  href="#"><i class="fa fa-key" aria-hidden="true"></i> Reset PW</a></li>
					</ul>
				</div>
			</div>
			<hr>--------->

			<?php
			$arr = User::readAll(0, 9999999);
			foreach ($arr as $value) {
				PrintHTML::Member($value->getId(), $value->getfullName(), $value->getEmail(), User::isAdmin(), "images/User.png");
			}
			?>
			<!-------------------------------- pagination -------------------------------->
			<button type="button" class="btn btn-primary center-block" onClick="">Load more <i class="fa fa-arrow-down" aria-hidden="true"></i></button>
		</div>
		<?php include ("footer.php"); ?>
	</body>
</html>