<?php
require_once 'autoload.php';
User::CheckLogin();
$arr = User::readAll();
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
			<?php
			$arr = User::readAll(0, 9999999);
			$arrAccses = Access::readAll();
			foreach ($arr as $value) {
				UserView::Normal12($value->getId(), $value->getfullName(), $value->getEmail(), User::getSessionAccses()->hasAccsesUser(Access::FULL), "images/User.png", $arrAccses);
			}
			?>
			<!-------------------------------- pagination -------------------------------->
			<button type="button" class="btn btn-primary center-block" onClick="">Load more <i class="fa fa-arrow-down" aria-hidden="true"></i></button>
		</div>
		<?php include ("footer.php"); ?>
	</body>
</html>