<?php
require_once 'autoload.php';
// Check for accses
User::CheckLogin();
$Multimedia = new Youtube();
$access = User::getSessionAccses();
if (!$Multimedia->hasAccsesToModify($access)) {
	header("Location: accses_denied.php");
}

// Update
if (isset($_GET["id"])) {
	if ($Multimedia->read($_GET["id"])) {
		$Data = array(
			"Youtubelink" => $Multimedia->getyoutubeURLString(),
			"title_en" => $Multimedia->getTitleEnglish(),
			"description_en" => $Multimedia->getDescriptionEnglish(),
			"title_ar" => $Multimedia->getTitleArabic(),
			"description_ar" => $Multimedia->getDescriptionArabic()
		);
	} else {
		header("Location: 404.php");
		exit;
	}
}

if (valAllNotnull()) {

	// setting the data
	$iscorrect = array(
		"Youtubelink" => (bool) $Multimedia->setyoutubeID($_POST["Youtubelink"]),
		"title_en" => (bool) $Multimedia->setTitleEnglish($_POST["title_en"]),
		"description_en" => (bool) $Multimedia->setDescriptionEnglish($_POST["description_en"]),
		"title_ar" => (bool) $Multimedia->setTitleArabic($_POST["title_ar"]),
		"description_ar" => (bool) $Multimedia->setDescriptionEnglish($_POST["description_ar"]));


	// set the publish or aprove or creat
	$Multimedia->setDisplayFromSession($access);
	$passed = FALSE;
	// check if the imput is valid
	if (Validation::valAll($iscorrect)) {

		if (isset($_GET["id"])) {
			$passed = (bool) $Multimedia->update();
			if ($passed) {
				$x = new Updates;
				$x->setEditorID(User::getSessionUserID());
				$x->setTargetType(Updates::TARGET_TYPE_YOUTUBE);
				$x->setTargetID($Multimedia->getId());
				$x->setMessageType(Updates::MESSAGE_TYPE_UPDATE);
				$x->create();

				$y = new Notification;
				$y->setUserID($Multimedia->getWriterID());
				$y->setSource(Notification::SOURCE_MULTIMEDIA);
				$y->setsourceID($Multimedia->getId());
				$y->setMessage("Multimedia was updated by ".User::getSessionUserFullName());
				$y->create();
			}
		} else {
			$Multimedia->setWriterID(User::getSessionUserID());
			$passed = (bool) $Multimedia->create();
		}
	}

	// check if every thing went right
	if ($passed) {
		header("Location: multimedia.php?id=" . $Multimedia->getId());
		exit;
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
					<li role="presentation"><a href="creat_gallery.php"> Gallery </a></li>
				</ul>
			</h3>
			<br><br>
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
<?php PrintHTML::validation("Youtubelink", @$iscorrect["Youtubelink"], "Invalid Input") ?>
							</ul></span> </div>
				</div>
				<div id="en">
					<h3 class="text-center text-primary">English</h3>
					<hr>
					<!-- #################################################################### Title-EN #################################################################### -->
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
<?php PrintHTML::validation("title_en", @$iscorrect["title_en"], "Invalid Input") ?>
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
<?php PrintHTML::validation("description_en", @$iscorrect["description_en"], "Invalid Input") ?>
								</ul>
							</span></div>
					</div>
				</div>

				<div id="ar">
					<h3 class="text-center text-primary">Arabic</h3>
					<hr>
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
<?php PrintHTML::validation("title_ar", @$iscorrect["title_ar"], "Invalid Input") ?>
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
<?php PrintHTML::validation("description_ar", @$iscorrect["description_ar"], "Invalid Input") ?>
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