<?php
require_once 'autoload.php';
$Youtube = new Youtube();
if (isset($_GET["id"])) {
	if ($Youtube->read($_GET["id"]) === FALSE) {
		header("Location: 404.php");
		exit;
	} else {
		$Data = array(
			"Youtubelink" => $Youtube->getyoutubeURLString(),
			"title_en" => $Youtube->getTitleEnglish(),
			"description_en" => $Youtube->getDescriptionEnglish(),
			"title_ar" => $Youtube->getTitleArabic(),
			"description_ar" => $Youtube->getDescriptionArabic()
		);
	}
}

if (valAllNotnull()) {
	$iscorrect = array(
		"Youtubelink" => (bool) $Youtube->setyoutubeID($_POST["Youtubelink"]),
		"title_en" => (bool) $Youtube->setTitleEnglish($_POST["title_en"]),
		"description_en" => (bool) $Youtube->setDescriptionEnglish($_POST["description_en"]),
		"title_ar" => (bool) $Youtube->setTitleArabic($_POST["title_ar"]),
		"description_ar" => (bool) $Youtube->setDescriptionArabic($_POST["description_ar"])
	);

	if (Validation::valAll($iscorrect)) {

		if (isset($_GET["id"])) {
			$passed = (bool) $Youtube->update();
		} else {
			$passed = (bool) $Youtube->create();
		}
		if ($passed) {
			header("Location: video.php?id=$Youtube->getId");
			exit;
		}
	} else {
		$Data = array(
			"Youtubelink" => $_POST["Youtubelink"],
			"title_en" => $_POST["title_en"],
			"description_en" => $_POST["description_en"],
			"title_ar" => $_POST["title_ar"],
			"description_ar" => $_POST["description_ar"]
		);
	}
}

function valAllNotnull() {
	return
			isset($_POST["Youtubelink"]) &&
			isset($_POST["title_en"]) &&
			isset($_POST["description_en"]) &&
			isset($_POST["title_ar"]) &&
			isset($_POST["description_ar"]);
}
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
					<li role="presentation" ><a href="creat_article.php"> Article </a></li>
					<li role="presentation"><a  href="creat_poll.php"> Poll </a></li>
					<li role="presentation" class="active"><a> Multimedia </a></li>
				</ul>
			</h3>
			<br>
			<form class="form-horizontal" role="form" method="post" action="creat_multimedia.php<?php if (isset($_GET["id"])) echo "?id=" . $_GET["id"] ?>">
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
							   value="<?php echo @$Data["Youtubelink"] ?>">
						<span class="help-block"><ul>
								<?php PrintHTML::validation("IDtaken", @$iscorrect["IDtaken"], "ID is Already Taken") ?>
							</ul></span> </div>
				</div>
				<!-- #################################################################### Title-EN #################################################################### -->
				<h3 class="text-center text-primary">English</h3>
				<hr>
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
				<!-- #################################################################### Breif-EN #################################################################### -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="description_en">Description :</label>
					<div class="controls col-sm-10">
						<input	type="text" 
							   name="description_en" 
							   id="description_en" 
							   value="<?php echo @$Data["description_en"]; ?>" 
							   placeholder="Enter 1 line description of the video in english" 
							   class="form-control" 
							   onBlur="valDescription(this)" 
							   maxlength="256" 
							   required 
							   autocomplete="on">
						<span class="help-block">
							<ul>
								<?php PrintHTML::validation("IDtaken", @$iscorrect["IDtaken"], "ID is Already Taken") ?>
							</ul>
						</span></div>
				</div>
				<!-- #################################################################### Title-AR #################################################################### -->
				<h3 class="text-center text-primary">Arabic</h3>
				<hr>
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
				<!-- #################################################################### Breif-AR #################################################################### -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="description_ar">Description :</label>
					<div class="controls col-sm-10">
						<input type="text" 
							   name="description_ar" 
							   id="description_ar" 
							   value="<?php echo @$_POST["description_ar"]; ?>" 
							   placeholder="Enter 1 line description of the video in arabic" 
							   class="form-control" 
							   onBlur="valDescription(this)" 
							   maxlength="256" 
							   required 
							   autocomplete="on">
						<span class="help-block">
							<ul>
								<?php PrintHTML::validation("IDtaken", @$iscorrect["IDtaken"], "ID is Already Taken") ?>
							</ul>
						</span></div>
				</div>
				<button type="submit" class="btn btn-primary pull-right">Submit</button>
			</form>
		</div>
		<?php include ("footer.php"); ?>
	</body>
</html>