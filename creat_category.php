<?php
require_once 'autoload.php';
// Check for accses
User::CheckLogin();
$category = new Category();
$access = User::getSessionAccses();
if (!$access->hasAccsesAdmin()) {
	header("Location: accses_denied.php");
}

// Update
if (isset($_GET["id"])) {
	if ($category->read($_GET["id"])) {
		$Data = array(
			"title_en" => $category->getNameEnglish(),
			"title_ar" => $category->getNameArabic(),
			"Category" => $category->getParentID()
		);
	} else {
		header("Location: 404.php");
		exit;
	}
}

if (valAllNotnull()) {

	// setting the data
	$iscorrect = array(
		"title_en" => (bool) $category->setNameEnglish($_POST["title_en"]),
		"title_ar" => (bool) $category->setNameArabic($_POST["title_ar"]),
		"Category" => (bool) $category->setParentID($_POST["Category"])
	);

	$passed = FALSE;
	// check if the imput is valid
	if (Validation::valAll($iscorrect)) {
		if (isset($_GET["id"])) {
			$passed = (bool) $category->update();
		} else {
			$passed = (bool) $category->create();
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
			"Category" => $_POST["Category"]
		);
	}
}

function valAllNotnull() {
	return
			isset($_POST["title_en"]) &&
			isset($_POST["title_ar"]) &&
			isset($_POST["Category"]);
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
			<form class="form-horizontal" role="form" method="post" action="creat_category.php<?php if (isset($_GET["id"])) echo "?id=" . $_GET["id"] ?>">
				<div class="form-group">
					<label class="control-label col-sm-2" for="title_en">Category name:</label>
					<div class="controls col-sm-10">
						<input type="text" 
							   name="title_en" 
							   id="title_en" 
							   value="<?php echo @$Data["title_en"]; ?>" 
							   placeholder="Enter category name in English" 
							   class="form-control" 
							   onBlur="valTitle(this)" 
							   maxlength="32" 
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
					<label class="control-label col-sm-2" for="title_ar">Category name:</label>
					<div class="controls col-sm-10">
						<input type="text" 
							   name="title_ar" 
							   id="title_ar" 
							   value="<?php echo @$Data["title_ar"]; ?>" 
							   placeholder="Enter category name in arabic" 
							   class="form-control" 
							   onBlur="valTitle(this)" 
							   maxlength="32" 
							   required 
							   autocomplete="on">
						<span class="help-block">
							<ul>
								<?php PrintHTML::validation("title_ar", @$iscorrect["title_ar"], "Invalid Input") ?>
							</ul>
						</span></div>
				</div>
				<!-- #################################################################### Category #################################################################### -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="Category">Category:</label>
					<div class="col-sm-10">
						<select class="form-control" id="Category" name="Category">
							<option value="-1">Major category</option>
							<?php
							foreach (Category::readAll() as $Category) {
								$Category->PrintOptionMainCategory(@$Data["title_ar"]);
							}
							?>
						</select>
					</div>
				</div>
				<button type="submit" class="btn btn-primary pull-right" name="submit" id="submit" >Submit</button>
			</form>
		</div>
		<?php include ("footer.php"); ?>
	</body>
</html>