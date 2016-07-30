<?php
require_once 'autoload.php';
// Check for accses
User::CheckLogin();
$access = new Access();
$UserAccess = User::getSessionAccses();
if (!$UserAccess->hasAccsesAdmin()) {
	header("Location: accses_denied.php");
}

// Update
if (isset($_GET["id"])) {
	if ($access->read($_GET["id"])) {
		$Data = array(
			"title_en" => $access->getTitleEnglish(),
			"title_ar" => $access->getTitleArabic(),
			"Article" => $access->getArticle(),
			"Poll" => $access->getPoll(),
			"Gallery" => $access->getGallery(),
			"Multimedia" => $access->getYoutube(),
			"User" => $access->getUser()
		);
	} else {
		header("Location: 404.php");
		exit;
	}
}

if (valAllNotnull()) {

	// setting the data
	$iscorrect = array(
		"title_en" => (bool) $access->setTitleEnglish($_POST["title_en"]),
		"title_ar" => (bool) $access->setTitleArabic($_POST["title_ar"]),
		"Article" => (bool) $access->setArticle($_POST["Article"]),
		"Poll" => (bool) $access->setPoll($_POST["Poll"]),
		"Gallery" => (bool) $access->setGallery($_POST["title_en"]),
		"Multimedia" => (bool) $access->setYoutube($_POST["Multimedia"]),
		"User" => (bool) $access->setUser($_POST["User"])
			);
	$passed = FALSE;

	// check if the imput is valid
	if (Validation::valAll($iscorrect)) {

		if (isset($_GET["id"])) {
			$passed = (bool) $access->update();
		} else {
			$passed = (bool) $access->create();
		}
	}

	// check if every thing went right
	if ($passed) {
		header("Location: index.php");
		exit;
	} else {
		$Data = array(
			"title_en" => $_POST["title_en"],
			"title_ar" => $_POST["title_ar"],
			"Article" => $_POST["Article"],
			"Poll" => $_POST["Poll"],
			"Gallery" => $_POST["Gallery"],
			"Multimedia" => $_POST["Multimedia"],
			"User" => $_POST["User"]
		);
	}
}

function valAllNotnull() {
	return
			isset($_POST["title_en"]) &&
			isset($_POST["title_ar"]) &&
			isset($_POST["Article"]) &&
			isset($_POST["Poll"]) &&
			isset($_POST["Gallery"]) &&
			isset($_POST["Multimedia"]) &&
			isset($_POST["User"]);
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
			<form class="form-horizontal" role="form" method="post" action="creat_access.php<?php if (isset($_GET["id"])) echo "?id=" . $_GET["id"] ?>">
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
				<br>
				<h4 class="text-center text-primary">Has access to</h4>
				<hr>
				<div class="form-group">
					<label class="control-label col-sm-2" for="Article">Article:</label>
					<div class="col-sm-5">
						<select class="form-control" id="Article" name="Article">
							<option value="<?php Access::READ ?>" <?php if (@$Data[Article] == 0) echo ' selected="selected"'; ?>>Read</option>
							<option value="<?php Access::CREATE ?>"<?php if (@$Data[Article] == 1) echo ' selected="selected"'; ?>>Create</option>
							<option value="<?php Access::APPROVE ?>"<?php if (@$Data[Article] == 2) echo ' selected="selected"'; ?>>Approve</option>
							<option value="<?php Access::PUBLISH ?>"<?php if (@$Data[Article] == 3) echo ' selected="selected"'; ?>>Publish</option>
							<option value="<?php Access::FULL ?>"<?php if (@$Data[Article] == 4) echo ' selected="selected"'; ?>>Full</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="Poll">Poll:</label>
					<div class="col-sm-5">
						<select class="form-control" id="Poll" name="Poll">
							<option value="<?php Access::READ ?>" <?php if (@$Data[Poll] == 0) echo ' selected="selected"'; ?>>Read</option>
							<option value="<?php Access::CREATE ?>"<?php if (@$Data[Poll] == 1) echo ' selected="selected"'; ?>>Create</option>
							<option value="<?php Access::APPROVE ?>"<?php if (@$Data[Poll] == 2) echo ' selected="selected"'; ?>>Approve</option>
							<option value="<?php Access::PUBLISH ?>"<?php if (@$Data[Poll] == 3) echo ' selected="selected"'; ?>>Publish</option>
							<option value="<?php Access::FULL ?>"<?php if (@$Data[Poll] == 4) echo ' selected="selected"'; ?>>Full</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="Gallery">Gallery:</label>
					<div class="col-sm-5">
						<select class="form-control" id="Gallery" name="Gallery">
							<option value="<?php Access::READ ?>" selected<?php if (@$Data[Gallery] == 0) echo ' selected="selected"'; ?>>Read</option>
							<option value="<?php Access::CREATE ?>"<?php if (@$Data[Gallery] == 1) echo ' selected="selected"'; ?>>Create</option>
							<option value="<?php Access::APPROVE ?>"<?php if (@$Data[Gallery] == 2) echo ' selected="selected"'; ?>>Approve</option>
							<option value="<?php Access::PUBLISH ?>"<?php if (@$Data[Gallery] == 3) echo ' selected="selected"'; ?>>Publish</option>
							<option value="<?php Access::FULL ?>"<?php if (@$Data[Gallery] == 4) echo ' selected="selected"'; ?>>Full</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="Multimedia">Multimedia:</label>
					<div class="col-sm-5">
						<select class="form-control" id="Multimedia" name="Multimedia">
							<option value="<?php Access::READ ?>" <?php if (@$Data[Multimedia] == 0) echo ' selected="selected"'; ?>>Read</option>
							<option value="<?php Access::CREATE ?>"<?php if (@$Data[Multimedia] == 1) echo ' selected="selected"'; ?>>Create</option>
							<option value="<?php Access::APPROVE ?>"<?php if (@$Data[Multimedia] == 2) echo ' selected="selected"'; ?>>Approve</option>
							<option value="<?php Access::PUBLISH ?>"<?php if (@$Data[Multimedia] == 3) echo ' selected="selected"'; ?>>Publish</option>
							<option value="<?php Access::FULL ?>"<?php if (@$Data[Multimedia] == 4) echo ' selected="selected"'; ?>>Full</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="User">User:</label>
					<div class="col-sm-5">
						<select class="form-control" id="User" name="User">
							<option value="<?php Access::READ ?>" <?php if (@$Data[User] == 0) echo ' selected="selected"'; ?>>Read</option>
							<option value="<?php Access::CREATE ?>"<?php if (@$Data[User] == 1) echo ' selected="selected"'; ?>>Create</option>
							<option value="<?php Access::FULL ?>"<?php if (@$Data[User] == 4) echo ' selected="selected"'; ?>>Full</option>
						</select>
					</div>
				</div>
				<button type="submit" class="btn btn-primary pull-right" name="submit" id="submit" >Submit</button>
			</form>
		</div>
		<?php include ("footer.php"); ?>
	</body>
</html>