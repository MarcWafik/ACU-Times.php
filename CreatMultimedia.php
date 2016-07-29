<?php require_once 'autoload.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Creat Multimedia</title>
		<?php require_once("Header.php"); ?>
		<script src="js/Validate.js"></script>
	</head>
	<body>
		<?php include ("Navbar.php"); ?>
		<div class="container">
			<h3>
				<ul class="nav nav-pills">
					<li role="presentation" ><a href="CreatArticle.php"> Article </a></li>
					<li role="presentation"><a  href="CreatPoll.php"> Poll </a></li>
					<li role="presentation" class="active"><a> Multimedia </a></li>
				</ul>
			</h3>
			<br>
			<form class="form-horizontal" role="form" method="post" action="CreatPoll.php">
				<!-- #################################################################### YoutubeUrl #################################################################### -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="youtube">Youtube URL:</label>
					<div class="controls col-sm-10">
						<input type="text" name="youtube_en" id="youtube_en" value="<?php echo @$_POST[""]; ?>" placeholder="Enter a youtube link" class="form-control" onBlur="valYouTube(this)" maxlength="256" required autocomplete="on">
						<span class="help-block"></span></div>
				</div>
				<!-- #################################################################### Title-EN #################################################################### -->
				<h3 class="text-center text-primary">English</h3>
				<hr>
				<div class="form-group">
					<label class="control-label col-sm-2" for="title_en">Title :</label>
					<div class="controls col-sm-10">
						<input type="text" name="title_en" id="title_en" value="<?php echo @$_POST[""]; ?>" placeholder="Enter question in English" class="form-control" onBlur="" maxlength="128" required autocomplete="on">
						<span class="help-block"></span></div>
				</div>
				<!-- #################################################################### Breif-EN #################################################################### -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="description_en">Description :</label>
					<div class="controls col-sm-10">
						<input	type="text" 
							   name="description_en" 
							   id="description_en" 
							   value="<?php echo @$_POST[""]; ?>" 
							   placeholder="Enter 1 line description of the video in english" 
							   class="form-control" 
							   onBlur="" 
							   maxlength="256" 
							   required 
							   autocomplete="on">
						<span class="help-block"></span></div>
				</div>
				<!-- #################################################################### Title-AR #################################################################### -->
				<h3 class="text-center text-primary">Arabic</h3>
				<hr>
				<div class="form-group">
					<label class="control-label col-sm-2" for="title_ar">Title :</label>
					<div class="controls col-sm-10">
						<input type="text" name="title_ar" id="title_ar" value="<?php echo @$_POST[""]; ?>" placeholder="Enter question in arabic" class="form-control" onBlur="valArabic(this)" maxlength="128" required autocomplete="on">
						<span class="help-block"></span></div>
				</div>
				<!-- #################################################################### Breif-AR #################################################################### -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="description_ar">Description :</label>
					<div class="controls col-sm-10">
						<input type="text" name="description_ar" id="description_ar" value="<?php echo @$_POST[""]; ?>" placeholder="Enter 1 line description of the video in arabic" class="form-control" onBlur="" maxlength="256" required autocomplete="on">
						<span class="help-block"></span></div>
				</div>
				<button type="submit" class="btn btn-primary pull-right">Submit</button>
			</form>
		</div>
		<?php include ("Footer.php"); ?>
	</body>
</html>