<?php
require_once 'autoload.php';
$article = new Article();
if (isset($_GET["id"])) {
	if ($article->read($_GET["id"])) {
		$Data = array(
			"Title" => $article->getTitleEnglish(),
			"Brief" => $article->getDescriptionEnglish(),
			"Youtubelink" => $article->getyoutubeURLString(),
			"Importance" => $article->getImportance(),
			"article" => $article->getBodyEnglish(),
			"Category" => $article->getCategoryID()
		);
	} else {
		header("Location: 404.php");
		exit;
	}
}

if (valAllNotnull()) {
	$iscorrect = array(
		"Title" => (bool) $article->setTitleEnglish($_POST["Title"]),
		"Brief" => (bool) $article->setDescriptionEnglish($_POST["Brief"]),
		//"Category" => (bool) $article->setCategoryID($_POST["Category"]),
		"Youtubelink" => (bool) $article->setyoutubeID($_POST["Youtubelink"]),
		"Importance" => (bool) $article->setImportance($_POST["Importance"]),
		"article" => (bool) $article->setBodyEnglish($_POST["article"]),
	);

	if (Validation::valAll($iscorrect)) {

		if (isset($_GET["id"])) {
			$passed = (bool) $article->update();
		} else {
			$passed = (bool) $article->create();
		}
		if ($passed) {
			uploadpic();
			header("Location: article.php?id=" . $article->getId);
			exit;
		}
	} else {
		$Data = array(
			"Title" => $_POST["Title"],
			"Brief" => $_POST["Brief"],
			"Youtubelink" => $_POST["Youtubelink"],
			"Importance" => $_POST["Importance"],
			"article" => $_POST["article"],
			//"Category" => $_POST["Category"]
		);
	}
}

function uploadpic() {
	$ds = DIRECTORY_SEPARATOR;
	$storeFolder = '\Data\Articles';

	if (!empty($_FILES)) {
		$tempFile = $_FILES['file']['tmp_name'];
		$targetPath = dirname(__FILE__) . $ds . $storeFolder . $ds;
		$targetFile = $targetPath . $_FILES['file']['name'];
		move_uploaded_file($tempFile, $targetFile);
	}
}

function valAllNotnull() {
	return
			isset($_POST["Title"]) &&
			isset($_POST["Brief"]) &&
			//isset($_POST["Category"]) &&
			isset($_POST["Youtubelink"]) &&
			isset($_POST["Importance"]);
}
?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>ACU Times | Creat Article</title>
		<?php require_once("header.php"); ?>
        <link rel="stylesheet" href="css/dropezone.css" type="text/css" media="all">
        <script src='js/tinymce/tinymce.min.js'></script>
        <script src="js/dropzone.js"></script>
        <script src="js/Validate.js"></script>
        <script>
			tinymce.init({
				selector: '#article',
				height: 500,
				theme: 'modern',
				plugins: [
					'advlist autolink lists link image charmap print preview hr anchor pagebreak',
					'searchreplace wordcount visualblocks visualchars code fullscreen',
					'insertdatetime media nonbreaking save table contextmenu directionality',
					'emoticons template paste textcolor colorpicker textpattern imagetools print code textcolor paste'
				],
				toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
				toolbar2: 'print preview media | forecolor backcolor emoticons',
			});

        </script>
	</head>
	<body>
		<?php include ("navbar.php"); ?>
		<div class="container">
			<h3>
				<ul class="nav nav-pills">
					<li role="presentation" class="active"><a> Article </a></li>
					<li role="presentation"><a  href="creat_poll.php"> Poll </a></li>
					<li role="presentation"><a href="creat_multimedia.php"> Multimedia </a></li>
				</ul>
			</h3>
			<br>
			<form class="form-horizontal" role="form" method="post" action="creat_article.php<?php if (isset($_GET["id"])) echo "?id=" . $_GET["id"] ?>">
				<div class="form-group">
					<label class="control-label col-sm-2" for="Title">Title:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Title" id="Title" onBlur="valTitle(this)" required autocomplete="on" value="<?php echo @$Data["Title"] ?>">
						<span class="help-block"><ul>
								<?php PrintHTML::validation("IDtaken", @$iscorrect["IDtaken"], "ID is Already Taken") ?>
							</ul></span> </div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="Breif">Description:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Enter 1 line description of the article" id="Brief" name="Brief"  onBlur="valDescription(this)" required autocomplete="on" value="<?php echo @$Data["Brief"] ?>">
						<span class="help-block"><ul>
								<?php PrintHTML::validation("IDtaken", @$iscorrect["IDtaken"], "ID is Already Taken") ?>
							</ul></span> </div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="Category">Category:</label>
					<div class="col-sm-10">
						<select class="form-control" id="Category" name="Category">
							<?php // foreach($CategoryList as $Category){ PrintOptionCategory($Category); }   ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="Youtube-link">Youtube Url:</label>
					<div class="controls col-sm-10">
						<input type="text" class="form-control" placeholder="paste the youtube vedio link here or leave it empty"  name="Youtubelink" id="Youtubelink" onBlur="valYouTube(this)" value="<?php echo @$Data["Youtubelink"] ?>">
						<span class="help-block"><ul>
								<?php PrintHTML::validation("IDtaken", @$iscorrect["IDtaken"], "ID is Already Taken") ?>
							</ul></span> </div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="Rate">Importance:</label>
					<div class="col-sm-10">
						<select class="form-control" id="Importance" name="Importance">
							<?php PrintHTML::numericOption(0, 9, @$Data["Importance"]) ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="lang">Language:</label>
					<div class="col-sm-10">
						<label class="radio-inline">
							<input type="radio" value="<?php Language::ENGLISH ?>" name="lang" id="lang" checked>
							English</label>
						<label class="radio-inline">
							<input type="radio" value="<?php Language::ARABIC ?>" name="lang" id="lang">
							Arabic</label>
					</div>
				</div>
				<div class="form-group">
					<div  class="dropzone" id="upload-widget"> </div>
				</div>
				<div class="clearfix"></div>
				<div class="form-group">
					<textarea id="article" name="article" ><?php echo @$Data["article"] ?></textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary pull-right" name="submit-article" id="submit-article" onClick="myDropzone.processQueue()"> Creat Article </button>
				</div>
				<input type="hidden" name="IMG" id ="IMG">
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