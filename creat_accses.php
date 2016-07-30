<?php
require_once 'autoload.php';
$accses = new Article();
if (isset($_GET["id"]) && $accses->read($_GET["id"])) {
	
} else if (isset($_GET["id"])) {
	header("Location: 404.php");
	exit;
}
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Article</title>
		<?php require_once("header.php"); ?>
		<script type="text/javascript" src="js/Poll.js"></script>
		<script type="text/javascript" src="js/SocialMedia.js"></script>
	</head>
	<body>
		<?php include ("navbar.php"); ?>
		<div class="container"> 
			<br><br>
			<form class="form-horizontal" role="form" method="post" action="creat_article.php<?php if (isset($_GET["id"])) echo "?id=" . $_GET["id"] ?>">
				<div class="form-group">
					<label class="control-label col-sm-2" for="title_en">Title :</label>
					<div class="controls col-sm-10">
						<input type="text" 
							   name="title_en" 
							   id="title_en" 
							   value="<?php echo @$Data["title_en"]; ?>" 
							   placeholder="Enter title in English" 
							   class="form-control" 
							   onBlur="valTitle(this)" 
							   maxlength="128" 
							   required 
							   autocomplete="on">
						<span class="help-block">
							<ul>
								<?php PrintHTML::validation("IDtaken", @$iscorrect["IDtaken"], "ID is Already Taken") ?>
							</ul>
						</span></div>
				</div>
				<!-- #################################################################### Title-AR #################################################################### -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="title_ar">Title :</label>
					<div class="controls col-sm-10">
						<input type="text" 
							   name="title_ar" 
							   id="title_ar" 
							   value="<?php echo @$Data["title_ar"]; ?>" 
							   placeholder="Enter title in arabic" 
							   class="form-control" 
							   onBlur="valTitle(this)" 
							   maxlength="128" 
							   required 
							   autocomplete="on">
						<span class="help-block">
							<ul>
								<?php PrintHTML::validation("IDtaken", @$iscorrect["IDtaken"], "ID is Already Taken") ?>
							</ul>
						</span></div>
				</div>
				<br>
				<h4 class="text-center text-primary">Has accses to</h4>
				<hr>
				<div class="form-group">
					<label class="control-label col-sm-2" for="Article">Article:</label>
					<div class="col-sm-5">
						<select class="form-control" id="Article" name="Article">
							<option value="<?php Accses::READ ?>" selected>Read</option>
							<option value="<?php Accses::CREAT ?>">Creat</option>
							<option value="<?php Accses::APPROVE ?>">Approve</option>
							<option value="<?php Accses::PUBLISH ?>">Publish</option>
							<option value="<?php Accses::FULL ?>">Full</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="Poll">Poll:</label>
					<div class="col-sm-5">
						<select class="form-control" id="Poll" name="Poll">
							<option value="<?php Accses::READ ?>" selected>Read</option>
							<option value="<?php Accses::CREAT ?>">Creat</option>
							<option value="<?php Accses::APPROVE ?>">Approve</option>
							<option value="<?php Accses::PUBLISH ?>">Publish</option>
							<option value="<?php Accses::FULL ?>">Full</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="Galery">Gallery:</label>
					<div class="col-sm-5">
						<select class="form-control" id="Gallery" name="Gallery">
							<option value="<?php Accses::READ ?>" selected>Read</option>
							<option value="<?php Accses::CREAT ?>">Creat</option>
							<option value="<?php Accses::APPROVE ?>">Approve</option>
							<option value="<?php Accses::PUBLISH ?>">Publish</option>
							<option value="<?php Accses::FULL ?>">Full</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="Multimedia">Multimedia:</label>
					<div class="col-sm-5">
						<select class="form-control" id="Poll" name="Multimedia">
							<option value="<?php Accses::READ ?>" selected>Read</option>
							<option value="<?php Accses::CREAT ?>">Creat</option>
							<option value="<?php Accses::APPROVE ?>">Approve</option>
							<option value="<?php Accses::PUBLISH ?>">Publish</option>
							<option value="<?php Accses::FULL ?>">Full</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="User">User:</label>
					<div class="col-sm-5">
						<select class="form-control" id="User" name="User">
							<option value="<?php Accses::READ ?>" selected>Read</option>
							<option value="<?php Accses::CREAT ?>">Creat</option>
							<option value="<?php Accses::FULL ?>">Full</option>
						</select>
					</div>
				</div>
			</form>
		</div>
		<?php include ("footer.php"); ?>
	</body>
</html>