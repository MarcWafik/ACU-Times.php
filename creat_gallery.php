<?php
require_once 'autoload.php';
// Check for accses
User::CheckLogin();
$Gallery = new Gallery();
$access = User::getSessionAccses();
if (!$Gallery->hasAccsesToModify($access)) {
	header("Location: accses_denied.php");
}

// Update
if (isset($_GET["id"])) {
	if ($Gallery->read($_GET["id"])) {
		$Data = array(
			"title_en" => $Gallery->getTitleEnglish(),
			"title_ar" => $Gallery->getTitleArabic()
		);
	} else {
		header("Location: 404.php");
		exit;
	}
}

if (valAllNotnull()) {

	// setting the data
	$iscorrect = array(
		"title_en" => (bool) $Gallery->setTitleEnglish($_POST["title_en"]),
		"title_ar" => (bool) $Gallery->setTitleArabic($_POST["title_ar"])
	);


	// set the publish or aprove or creat
	$Gallery->setDisplayFromSession($access);
	$passed = FALSE;
	// check if the imput is valid
	if (Validation::valAll($iscorrect)) {

		if (isset($_GET["id"])) {
			$passed = (bool) $Gallery->update();
			if ($passed) {
				$x = new Updates;
				$x->setEditorID(User::getSessionUserID());
				$x->setTargetType(Updates::TARGET_TYPE_GALLERY);
				$x->setTargetID($Gallery->getId());
				$x->setMessageType(Updates::MESSAGE_TYPE_UPDATE);
				$x->create();

				$y = new Notification;
				$y->setUserID($Gallery->getWriterID());
				$y->setSource(Notification::SOURCE_GALLERY);
				$y->setsourceID($Gallery->getId());
				$y->setMessage("Gallery was updated succsesfuly");
				$y->create();
			}
		} else {
			$Gallery->setWriterID(User::getSessionUserID());
			$passed = (bool) $Gallery->create();
		}
	}

	// check if every thing went right
	if ($passed) {
		header("Location: multimedia.php?id=" . $Gallery->getId());
		exit;
	} else {
		$Data = array(
			"title_en" => $_POST["title_en"],
			"title_ar" => $_POST["title_ar"]
		);
	}
}

function valAllNotnull() {
	return

			isset($_POST["title_en"]) &&
			isset($_POST["title_ar"]);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ACU Times | Creat Article</title>
		<?php require_once("header.php"); ?>
        <link rel="stylesheet" href="css/dropezone.css" type="text/css" media="all">
        <script src='js/tinymce/tinymce.min.js'></script>
        <script src="js/dropzone.js"></script>
        <script src="js/Validate.js"></script>
	</head>
	<body  onLoad="onLoad()">
		<?php include ("navbar.php"); ?>
		<div class="container">
			<h3>
				<ul class="nav nav-pills">
					<li role="presentation"><a href="creat_article.php"> Article </a></li>
					<li role="presentation"><a href="creat_poll.php"> Poll </a></li>
					<li role="presentation"><a href="creat_multimedia.php"> Multimedia </a></li>
					<li role="presentation" class="active"><a> Gallery </a></li>
				</ul>
			</h3>
			<br><br>
			<form class="form-horizontal" role="form" method="post" action="creat_article.php<?php if (isset($_GET["id"])) echo "?id=" . $_GET["id"] ?>">

				<!-- #################################################################### Title-EN #################################################################### -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="title_en">Title English :</label>
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
					<label class="control-label col-sm-2" for="title_ar">Title Arabic :</label>
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
				<!-- #################################################################### DropZone #################################################################### -->
				<br>
				<div class="form-group">
					<div  class="dropzone " id="upload-widget"> </div>
					<input type="hidden" name="IMG" id ="IMG">
				</div>
				<button type="submit" class="btn btn-primary pull-right">Submit</button>
			</form>
		</div>
		<?php include ("footer.php"); ?>
		<script>
			function ImageExist(url) {
				var img = new Image();
				img.src = url;
				return img.height != 0;
			}
			var cleanFilename = function (name) {
				$.ajax({
					url: 'Data\\Articles\\' + name,
					type: 'HEAD',
					error: function () {
						var MyID = document.getElementById('IMG').value;
						document.getElementById("IMG").value = name;
					},
					success: function () {

						//var rand = Math.floor((Math.random() * 10000000) + 1);
						//name = name.slice(0,name.length - 4);
						//name = name+rand+".jpg";
						var MyID = document.getElementById('IMG').value;
						document.getElementById("IMG").value = name;

					}
				});
			};

			var myDropzone = new Dropzone("div#upload-widget", {
				url: "CreatArticle.php",
				maxFilesize: 4,
				maxFiles: 1,
				parallelUploads: 1,
				acceptedFiles: "image/*",
				renameFilename: cleanFilename,
				autoProcessQueue: false
			});
		</script>
	</body>
</html>