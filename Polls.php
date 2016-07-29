<?php require_once 'autoload.php';
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Title</title>
		<?php require_once("Header.php"); ?>
	</head>
	<body>
		<div class="container"> 
			<!-------------------------------- Search -------------------------------->
			<div class="col-md-6 col-md-offset-3">
				<form action="Members.php" method="get">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for..." id="Search" name="Search">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
						</span> </div>
				</form>
			</div>
			<!-------------------------------- content -------------------------------->
			<div class="clearfix"><br><br></div>
			<div class="row">


				<div>
					<div class="col-md-3"> hi</div>
					<div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: 2%;"> 2% </div>
					</div>
				</div>
			</div>
			<hr>

		</div>
		<?php include ("Footer.php"); ?>
	</body>
</html>