<?php
require_once 'autoload.php';
// Check for accses
User::CheckLogin();

$article = new Article();
$access = User::getSessionAccses();


// Update
if (isset($_GET["id"])) {
	if ($article->read($_GET["id"])) {
		$Data = ControlArticle::readArticleConvertToDataArr($article);
	} else {
		header("Location: 404.php");
		exit;
	}
}

if (!$article->hasAccsesToModify($access)) {
	header("Location: accses_denied.php");
}
if (valAllNotnull()) {

	ControlArticle::setData($article);
	
	$article->setImageNumber(1);///////////////////////////////////////
	// set the publish or aprove or creat
	$article->setDisplayFromSession($access);
	$passed = FALSE;
	// check if the imput is valid
	if (Validation::valAll($iscorrect)) {

		if (isset($_GET["id"])) {
			$passed = (bool) $article->update();
			if ($passed) {
				$x = new Updates;
				$x->setEditorID(User::getSessionUserID());
				$x->setTargetType(Updates::TARGET_TYPE_ARTICLE);
				$x->setTargetID($Gallery->getId());
				$x->setMessageType(Updates::MESSAGE_TYPE_UPDATE);
				$x->create();

				$y = new Notification;
				$y->setUserID($article->getWriterID());
				$y->setSource(Notification::SOURCE_ARTICLE);
				$y->setsourceID($article->getId());
				$y->setMessage("Article was updated by " . User::getSessionUserFullName());
				$y->create();
			}
		} else {
			$article->setWriterID(User::getSessionUserID());
			$passed = (bool) $article->create();
			rename("images\\article\\upload.jpg", "images\\article\\" . $article->getId() . "-0.jpg");
		}
	}

	// check if every thing went right
	if ($passed) {

		header("Location: article.php?id=" . $article->getId());
		exit;
	} else {
		$Data = array(
			"Category" => $_POST["Category"],
			"Importance" => $_POST["Importance"],
			"Youtubelink" => $_POST["Youtubelink"],
			"lang" => $_POST["lang"],
			"title_en" => $_POST["title_en"],
			"description_en" => $_POST["description_en"],
			"title_ar" => $_POST["title_ar"],
			"description_ar" => $_POST["description_ar"],
			"body_ar" => $_POST["body_ar"]
		);
	}
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
	</head>
	<body  onload="onLoad()">
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
				<!-- #################################################################### Category #################################################################### -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="Category">Category:</label>
					<div class="col-sm-10">
						<select class="form-control" id="Category" name="Category">
							<?php
							foreach (Category::readAll() as $Category) {
								$Category->PrintOptionCategory(@$Data["Category"]);
							}
							?>
						</select>
					</div>
				</div>
				<!-- #################################################################### Importance #################################################################### -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="Rate">Importance:</label>
					<div class="col-sm-10">
						<select class="form-control" id="Importance" name="Importance">
							<?php PrintHTML::numericOption(0, 9, @$Data["Importance"]) ?>
						</select>
					</div>
				</div>
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
							   onBlur="valYouTube(this)" 
							   value="<?php echo @$Data["Youtubelink"] ?>">
						<span class="help-block"><ul>
								<?php PrintHTML::validation("Youtubelink", @$iscorrect["Youtubelink"], "Please Check your input") ?>
							</ul></span> </div>
				</div>
				<!-- #################################################################### Language #################################################################### -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="lang">Language:</label>
					<div class="col-sm-10">
						<select class="form-control" name="lang" id="lang" onBlur="changeLang(this)" onChange="changeLang(this)">
							<option value="<?php echo Language::ENGLISH ?>" <?php if (@$Data[lang] == 0) echo ' selected="selected"'; ?>>English</option>
							<option value="<?php echo Language::ARABIC ?>" <?php if (@$Data[lang] == 1) echo ' selected="selected"'; ?>>Arabic</option>
							<option value="<?php echo Language::BOTH ?>"<?php if (@$Data[lang] == 2) echo ' selected="selected"'; ?>>English & Arabic</option>
						</select>
					</div>
				</div>
				<!-- #################################################################### DropZone #################################################################### -->
				<br>
				<div class="form-group">
					<div  class="dropzone " id="upload-widget"> </div>



				</div>
				<div id="en">
					<br>
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
								   autocomplete="on">
							<span class="help-block">
								<ul>
									<?php PrintHTML::validation("title_en", @$iscorrect["title_en"], "Please Check your input") ?>
								</ul>
							</span></div>
					</div>

					<!-- #################################################################### Description-EN #################################################################### -->
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
								   autocomplete="on">
							<span class="help-block">
								<ul>
									<?php PrintHTML::validation("description_en", @$iscorrect["description_en"], "Please Check your input") ?>
								</ul>
							</span></div>
					</div>
					<!-- #################################################################### BODY-EN #################################################################### -->
					<div class="clearfix"></div>
					<div class="form-group">
						<textarea class="tinymce" id="body_en" name="body_en" ><?php echo @$Data["body_en"] ?></textarea>
					</div>
				</div>

				<div id="ar">
					<br>
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
								   autocomplete="on">
							<span class="help-block">
								<ul>
									<?php PrintHTML::validation("title_ar", @$iscorrect["title_ar"], "Please Check your input") ?>
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
								   value="<?php echo @$Data["description_ar"]; ?>" 
								   placeholder="Enter 1 line description of the video in arabic" 
								   class="form-control" 
								   onBlur="valDescription(this)" 
								   maxlength="256" 
								   autocomplete="on">
							<span class="help-block">
								<ul>
									<?php PrintHTML::validation("description_ar", @$iscorrect["description_ar"], "Please Check your input") ?>
								</ul>
							</span></div>
					</div>
					<!-- #################################################################### BODY-AR #################################################################### -->
					<div class="clearfix"></div>
					<div class="form-group">
						<textarea class="tinymce" id="body_ar" name="body_ar" ><?php echo @$Data["body_ar"] ?></textarea>
					</div>
				</div>

				<button type="submit" class="btn btn-primary pull-right" name="submit" id="submit" >Submit</button>
			</form>
		</div>
		<?php include ("footer.php"); ?>
		<script>
			tinymce.init({
				selector: '.tinymce',
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
		<script>

			var cleanFilename = function (name) {
				//document.getElementById("IMG").value = name;

				return name.toLowerCase().replace(/^[\w.]+$/i, 'upload.jpg');

			};









			var myDropzone = new Dropzone("div#upload-widget", {
				url: "uploadArticle.php",
				maxFilesize: 4,
				maxFiles: 1,
				parallelUploads: 1,
				acceptedFiles: "image/*",
				renameFilename: cleanFilename

			});




		</script>
		<script>
			function onLoad() {
				changeLang(document.getElementById("lang"));
			}
			function changeLang(lang) {
				var animationSpeed = 1000;
				if (lang.value == 0) {
					$("#ar").hide(animationSpeed);
					$("#en").show(animationSpeed);
				} else if (lang.value == 1) {
					$("#ar").show(animationSpeed);
					$("#en").hide(animationSpeed);
				} else {
					$("#ar").show(animationSpeed);
					$("#en").show(animationSpeed);
				}
			}
		</script>
	</body>
</html>