<?php
require_once 'autoload.php';
// Check for accses
User::CheckLogin();
$poll = new Poll();
$access = User::getSessionAccses();
if (!$poll->hasAccsesToModify($access)) {
	header("Location: accses_denied.php");
}

$choises = $poll ->getArrChoices();
$choise = new PollChoice();
// Update
if (isset($_GET["id"])) {
	if ($poll->read($_GET["id"])) {
		$Data = array(
			"Question_en" => $poll->getTitleEnglish(),
			"Question_ar" => $poll->getTitleArabic(),
			"choice1_en" => $choises[1],
			"choice1_ar" => $choises['choice1_ar'],
			"choice2_en" => $choises['choice2_en'],
			"choice2_ar" => $choises['4'],
			"choice3_en" => $choises['5'],
			"choice3_ar" => $choises['6'],
			"choice4_en" => $choises['7'],
			"choice4_ar" => $choises['8']
		);
	} else {
		header("Location: 404.php");
		exit;
	}
}

if (valAllNotnull()) {

	// setting the data
	$iscorrect = array(
		"Question_en" => (bool) $poll->setCategoryID($_POST["Question_en"]),
		"Question_ar" => (bool) $poll->setImportance($_POST["Question_ar"]),
		"choice1_en" => (bool) $poll->setyoutubeID($_POST["choice1_en"]),
		"choice1_ar" => (bool) $poll->setLanguage($_POST["choice1_ar"]),
		"choice2_en" => (bool) $poll->setCategoryID($_POST["choice2_en"]),
		"choice2_ar" => (bool) $poll->setImportance($_POST["choice2_ar"]),
		"choice3_en" => (bool) $poll->setyoutubeID($_POST["choice3_en"]),
		"choice3_ar" => (bool) $poll->setLanguage($_POST["choice3_ar"]),
		"choice4_en" => (bool) $poll->setCategoryID($_POST["choice4_en"]),
		"choice4_ar" => (bool) $poll->setImportance($_POST["choice4_ar"]));

	

	// set the publish or aprove or creat
	$poll->setDisplayFromSession($access);
	$passed = FALSE;
	// check if the imput is valid
	if (Validation::valAll($iscorrect)) {

		if (isset($_GET["id"])) {
			$passed = (bool) $poll->update();
		} else {
			$poll->setWriterID(User::getSessionUserID());
			$passed = (bool) $poll->create();
		}
	}

	// check if every thing went right
	if ($passed) {
		uploadpic();
		header("Location: article.php?id=" . $poll->getId());
		exit;
	} else {
		$Data = array(
			"Question_en" => $_POST["Question_en"],
			"Question_ar" => $_POST["Question_ar"],
			"choice1_en" => $_POST["choice1_en"],
			"choice1_ar" => $_POST["choice1_ar"],
			"choice2_en" => $_POST["choice2_en"],
			"choice2_ar" => $_POST["choice2_ar"],
			"choice3_en" => $_POST["choice3_en"],
			"choice3_ar" => $_POST["choice3_ar"],
			"choice4_en" => $_POST["choice4_en"],
			"choice4_ar" => $_POST["choice4_ar"]
		);
	}
}

function uploadpic() {
	$ds = DIRECTORY_SEPARATOR;
	$storeFolder = '\images\article';

	if (!empty($_FILES)) {
		$tempFile = $_FILES['file']['tmp_name'];
		$targetPath = dirname(__FILE__) . $ds . $storeFolder . $ds;
		$targetFile = $targetPath . $_FILES['file']['name'];
		move_uploaded_file($tempFile, $targetFile);
	}
}

function valAllNotnull() {
	return
			isset($_POST["Question_en"]) &&
			isset($_POST["Question_ar"]) &&
			isset($_POST["choice1_en"]) &&
			isset($_POST["choice1_ar"]) &&
			isset($_POST["choice2_en"]) &&
			isset($_POST["choice2_ar"]) &&
			isset($_POST["choice3_en"]) &&
			isset($_POST["choice3_ar"]) &&
			isset($_POST["choice4_en"]) &&
			isset($_POST["choice4_ar"]);
}
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Creat Poll</title>
		<?php require_once("header.php"); ?>
		<script src="js/Validate.js"></script>
	</head>
	<body>
		<?php include ("navbar.php"); ?>
		<div class="container">
			<h3>
				<ul class="nav nav-pills">
					<li role="presentation" ><a href="creat_article.php"> Article </a></li>
					<li role="presentation" class="active"><a> Poll </a></li>
					<li role="presentation"><a href="creat_multimedia.php"> Multimedia </a></li>
					<li role="presentation"><a href="creat_gallery.php"> Gallery </a></li>
				</ul>
			</h3>
			<br><br>
			<form class="form-horizontal" role="form" method="post" action="creat_poll.php">

				<br>
				<!-- #################################################################### Question #################################################################### -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="Question_en">Question (English):</label>
					<div class="controls col-sm-10">
						<input type="text" 
							   name="Question_en" 
							   id="Question_en" 
							   value="<?php echo @$_POST[""]; ?>" 
							   placeholder="Enter a question in English" 
							   class="form-control" 
							   onBlur="valTitle(this)" 
							   maxlength="128" 
							   required 
							   autocomplete="on">
						<span class="help-block">
							<ul>
<?php PrintHTML::validation("Question_en", @$iscorrect["Question_en"], "Invalid Input") ?>
							</ul>
						</span></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="Question_ar">Question (Arabic):</label>
					<div class="controls col-sm-10">
						<input type="text" 
							   name="Question_ar" 
							   id="Question_ar" 
							   value="<?php echo @$_POST[""]; ?>" 
							   placeholder="Enter a question in Arabic" 
							   class="form-control" 
							   onBlur="valTitle(this)" 
							   maxlength="128" 
							   required 
							   autocomplete="on">
						<span class="help-block">
							<ul>
<?php PrintHTML::validation("Question_ar", @$iscorrect["Question_ar"], "Invalid Input") ?>
							</ul>
						</span></div>
				</div>
				<!-- #################################################################### Choice 1 #################################################################### -->
				<div>
					<hr>
					<div class="form-group">
						<label class="control-label col-sm-2" for="choice1_en">Choice 1 :</label>
						<div class="controls col-sm-5">
							<input type="text" 
								   name="choice1_en" 
								   id="choice1_en" 
								   value="<?php echo @$_POST[""]; ?>" 
								   placeholder="Choice 1 in English" 
								   class="form-control" 
								   onBlur="valOption(this, choice1_ar)" 
								   maxlength="32" 
								   required 
								   autocomplete="on">
							<span class="help-block">
								<ul>
<?php PrintHTML::validation("choice1_en", @$iscorrect["choice1_en"], "Invalid Input") ?>
							</ul>
							</span></div>
					</div>
					<div class="form-group">
						<div class="controls col-sm-offset-2 col-sm-5">
							<input type="text" 
								   name="choice1_ar" 
								   id="choice1_ar" 
								   value="<?php echo @$_POST[""]; ?>" 
								   placeholder="Choice 1 in Arabic" 
								   class="form-control" 
								   onBlur="valOption(this, choice1_en)" 
								   maxlength="32" 
								   required 
								   autocomplete="on">
							<span class="help-block">
								<ul>
<?php PrintHTML::validation("choice1_ar", @$iscorrect["choice1_ar"], "Invalid Input") ?>
							</ul>
							</span></div>
					</div>
				</div>
				<!-- #################################################################### Choice 2 #################################################################### -->
				<div>
					<hr>
					<div class="form-group">
						<label class="control-label col-sm-2" for="choice2_en">Choice 2 :</label>
						<div class="controls col-sm-5">
							<input type="text" 
								   name="choice2_en" 
								   id="choice1_en" 
								   value="<?php echo @$_POST[""]; ?>" 
								   placeholder="Choice 2 in English" 
								   class="form-control" 
								   onBlur="valOption(this, choice2_ar)" 
								   maxlength="32" 
								   required 
								   autocomplete="on">
							<span class="help-block">
								<ul>
<?php PrintHTML::validation("choice2_en", @$iscorrect["choice2_en"], "Invalid Input") ?>
							</ul>
							</span></div>
					</div>
					<div class="form-group">
						<div class="controls col-sm-offset-2 col-sm-5">
							<input type="text" 
								   name="choice2_ar" 
								   id="choice2_ar" 
								   value="<?php echo @$_POST[""]; ?>" 
								   placeholder="Choice 2 in Arabic" 
								   class="form-control" 
								   onBlur="valOption(this, choice2_en)" 
								   maxlength="32" 
								   required 
								   autocomplete="on">
							<span class="help-block">
								<ul>
<?php PrintHTML::validation("choice2_ar", @$iscorrect["choice2_ar"], "Invalid Input") ?>
							</ul>
							</span></div>
					</div>
				</div>
				<!-- #################################################################### Choice 3 #################################################################### -->
				<div>
					<hr>
					<div class="form-group">
						<label class="control-label col-sm-2" for="choice3_en">Choice 3 :</label>
						<div class="controls col-sm-5">
							<input type="text" 
								   name="choice3_en" 
								   id="choice1_en" 
								   value="<?php echo @$_POST[""]; ?>" 
								   placeholder="Choice 3 in English" 
								   class="form-control" 
								   onBlur="valOption(this, choice3_ar)" 
								   maxlength="32" 
								   autocomplete="on">
							<span class="help-block">
								<ul>
<?php PrintHTML::validation("choice3_en", @$iscorrect["choice3_en"], "Invalid Input") ?>
							</ul>
							</span></div>
					</div>
					<div class="form-group">
						<div class="controls col-sm-offset-2 col-sm-5">
							<input type="text" 
								   name="choice3_ar" 
								   id="choice3_ar" 
								   value="<?php echo @$_POST[""]; ?>" 
								   placeholder="Choice 3 in Arabic" 
								   class="form-control" 
								   onBlur="valOption(this, choice3_en)" 
								   maxlength="32" 
								   autocomplete="on">
							<span class="help-block">
								<ul>
<?php PrintHTML::validation("choice3_ar", @$iscorrect["choice3_ar"], "Invalid Input") ?>
							</ul>
							</span></div>
					</div>
				</div>
				<!-- #################################################################### Choice 3 #################################################################### -->
				<div>
					<hr>
					<div class="form-group">
						<label class="control-label col-sm-2" for="choice4_en">Choice 4 :</label>
						<div class="controls col-sm-5">
							<input type="text" 
								   name="choice4_en" 
								   id="choice1_en" 
								   value="<?php echo @$_POST[""]; ?>" 
								   placeholder="Choice 4 in English" 
								   class="form-control" 
								   onBlur="valOption(this, choice4_ar)" 
								   maxlength="32" 
								   autocomplete="on">
							<span class="help-block">
								<ul>
<?php PrintHTML::validation("choice4_en", @$iscorrect["choice4_en"], "Invalid Input") ?>
							</ul>
							</span></div>
					</div>
					<div class="form-group">
						<div class="controls col-sm-offset-2 col-sm-5">
							<input type="text" 
								   name="choice4_ar" 
								   id="choice4_ar" 
								   value="<?php echo @$_POST[""]; ?>" 
								   placeholder="Choice 4 in Arabic" 
								   class="form-control" 
								   onBlur="valOption(this, choice4_en)" 
								   maxlength="32" 
								   autocomplete="on">
							<span class="help-block">
								<ul>
<?php PrintHTML::validation("choice4_ar", @$iscorrect["choice4_ar"], "Invalid Input") ?>
							</ul>
							</span></div>
					</div>
				</div>
				<hr>
				<button type="submit" class="btn btn-primary pull-right">Submit</button>
			</form>
		</div>
		<?php include ("Footer.php"); ?>
	</body>
</html>