<?php
require_once 'autoload.php';
$iscorrect = YoutubeController::Create();
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Creat Multimedia</title>
		<?php require_once("header.php"); ?>
		<script src="js/Validate.js"></script>
	</head>
	<body>
		<?php include ("navbar.php"); ?>
		<div class="container">
			<h3>
				<ul class="nav nav-pills">
					<li role="presentation" ><a href="create_article.php"> Article </a></li>
					<li role="presentation"><a  href="create_poll.php"> Poll </a></li>
					<li role="presentation" class="active"><a> Multimedia </a></li>
					<li role="presentation"><a href="create_gallery.php"> Gallery </a></li>
				</ul>
			</h3>
			<br><br>
			<form class="form-horizontal" role="form" method="post" action="create_multimedia.php<?php if (isset($_GET["id"])) echo "?id=" . $_GET["id"] ?>">
				<!-- #################################################################### YoutubeUrl #################################################################### -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="Youtubelink">Youtube Url:</label>
					<div class="controls col-sm-10">
						<input type="text" 
							   class="form-control" 
							   placeholder="paste the youtube vedio link here "  
							   name="Youtubelink" 
							   id="Youtubelink" 
							   maxlength="256" 
							   required 
							   onBlur="valYouTube(this)" 
							   value="<?php echo @$_POST["Youtubelink"] ?>">
						<span class="help-block"><ul>
							</ul></span> </div>
				</div>
				<div id="en">
					<h3 class="text-center text-primary">English</h3>
					<hr>
					<!-- #################################################################### Title-EN #################################################################### -->
					<div class="form-group">
						<label class="control-label col-sm-2" for="titleEnglish">Title :</label>
						<div class="controls col-sm-10">
							<input type="text" 
								   name="titleEnglish" 
								   id="titleEnglish" 
								   value="<?php echo @$_POST["titleEnglish"]; ?>" 
								   placeholder="Enter title in English" 
								   class="form-control" 
								   onBlur="valTitle(this)" 
								   maxlength="128" 
								   required 
								   autocomplete="on">
							<span class="help-block">
								<ul>
								</ul>
							</span></div>
					</div>

					<!-- #################################################################### Breif-EN #################################################################### -->
					<div class="form-group">
						<label class="control-label col-sm-2" for="descriptionEnglish">Description :</label>
						<div class="controls col-sm-10">
							<input	type="text" 
								   name="descriptionEnglish" 
								   id="descriptionEnglish" 
								   value="<?php echo @$_POST["descriptionEnglish"]; ?>" 
								   placeholder="Enter 1 line description of the video in english" 
								   class="form-control" 
								   onBlur="valDescription(this)" 
								   maxlength="256" 
								   required 
								   autocomplete="on">
							<span class="help-block">
								<ul>
								</ul>
							</span></div>
					</div>
				</div>

				<div id="ar">
					<h3 class="text-center text-primary">Arabic</h3>
					<hr>
					<!-- #################################################################### Title-AR #################################################################### -->
					<div class="form-group">
						<label class="control-label col-sm-2" for="titleArabic">Title :</label>
						<div class="controls col-sm-10">
							<input type="text" 
								   name="titleArabic" 
								   id="titleArabic" 
								   value="<?php echo @$_POST["titleArabic"]; ?>" 
								   placeholder="Enter title in arabic" 
								   class="form-control" 
								   onBlur="valTitle(this)" 
								   maxlength="128" 
								   required 
								   autocomplete="on">
							<span class="help-block">
								<ul>
								</ul>
							</span></div>
					</div>
					<!-- #################################################################### Breif-AR #################################################################### -->
					<div class="form-group">
						<label class="control-label col-sm-2" for="descriptionArabic">Description :</label>
						<div class="controls col-sm-10">
							<input type="text" 
								   name="descriptionArabic" 
								   id="descriptionArabic" 
								   value="<?php echo @$_POST["descriptionArabic"]; ?>" 
								   placeholder="Enter 1 line description of the video in arabic" 
								   class="form-control" 
								   onBlur="valDescription(this)" 
								   maxlength="256" 
								   required 
								   autocomplete="on">
							<span class="help-block">
								<ul>
								</ul>
							</span></div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary pull-right">Submit</button>
			</form>
		</div>
		<?php include ("footer.php"); ?>
	</body>
</html>