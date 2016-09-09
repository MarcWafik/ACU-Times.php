<?php
require_once 'autoload.php';
Session::startOnce();
//ArticleController::Create();
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Creat Article</title>
		<link rel="stylesheet" href="lib/dropzone-4.3.0/dist/dropzone.css" type="text/css" media="all">
		<?php require_once("header.php"); ?>
		<script src="lib/dropzone-4.3.0/dist/dropzone.js"></script>
		<script src='lib/tinymce/js/tinymce/tinymce.min.js'></script>
		<script src="js/Validate.js"></script>
	</head>
	<body  onload="onLoad()">
		<?php include ("navbar.php"); ?>
		<div class="container">
			<h3>
				<ul class="nav nav-pills">
					<li role="presentation" class="active"><a> Article </a></li>
					<li role="presentation"><a  href="create_poll.php"> Poll </a></li>
					<li role="presentation"><a href="create_multimedia.php"> Multimedia </a></li>
					<li role="presentation"><a href="create_gallery.php"> Gallery </a></li>
				</ul>
			</h3>
			<br>
			<form class="form-horizontal" role="form" method="post" action="create_article.php<?php if (isset($_GET["id"])) echo "?id=" . $_GET["id"] ?>">
				<!-- #################################################################### Category #################################################################### -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="Category">Category:</label>
					<div class="col-sm-10">
						<select class="form-control" id="Category" name="Category">
							<?php
							foreach (Category::readAll() as $Category) {
								$Category->PrintOptionCategory(@$_POST["Category"]);
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
							<?php PrintHTML::numericOption(0, 9, @$_POST["Importance"]) ?>
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
							   value="<?php echo @$_POST["Youtubelink"] ?>">
						<span class="help-block"><ul>
							</ul></span> </div>
				</div>
				<!-- #################################################################### Language #################################################################### -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="lang">Language:</label>
					<div class="col-sm-10">
						<select class="form-control" name="lang" id="lang" onBlur="changeLang(this)" onChange="changeLang(this)">
							<option value="<?php echo Language::ENGLISH ?>" <?php if (@$_POST[lang] == 0) echo ' selected="selected"'; ?>>English</option>
							<option value="<?php echo Language::ARABIC ?>" <?php if (@$_POST[lang] == 1) echo ' selected="selected"'; ?>>Arabic</option>
							<option value="<?php echo Language::BOTH ?>"<?php if (@$_POST[lang] == 2) echo ' selected="selected"'; ?>>English & Arabic</option>
						</select>
					</div>
				</div>
				<!-- #################################################################### DropZone #################################################################### -->
				<br>
				<div class="form-group">
					<div class="dropzone" id="dropzone"> </div>
				</div>
				<div id="en">
					<br>
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
								   autocomplete="on">
							<span class="help-block">
								<ul>
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
								   value="<?php echo @$_POST["description_en"]; ?>" 
								   placeholder="Enter 1 line description of the video in English" 
								   class="form-control" 
								   onBlur="valDescription(this)" 
								   maxlength="256" 
								   autocomplete="on">
							<span class="help-block">
								<ul>
								</ul>
							</span></div>
					</div>
					<!-- #################################################################### BODY-EN #################################################################### -->
					<div class="clearfix"></div>
					<div class="form-group">
						<textarea class="tinymce" id="body_en" name="body_en" ><?php echo @$_POST["body_en"] ?></textarea>
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
								   value="<?php echo @$_POST["title_ar"]; ?>" 
								   placeholder="Enter title in arabic" 
								   class="form-control" 
								   onBlur="valTitle(this)" 
								   maxlength="128"  
								   autocomplete="on">
							<span class="help-block">
								<ul>
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
								   autocomplete="on">
							<span class="help-block">
								<ul>
								</ul>
							</span></div>
					</div>
					<!-- #################################################################### BODY-AR #################################################################### -->
					<div class="clearfix"></div>
					<div class="form-group">
						<textarea class="tinymce" id="body_ar" name="body_ar" ><?php echo @$_POST["body_ar"] ?></textarea>
					</div>
				</div>

				<button type="button" class="btn btn-primary pull-right" name="submit" id="submit" onclick="myDropzone.processQueue()">Submit</button>
			</form>
		</div>
		<?php include ("footer.php"); ?>
		<script>
			tinymce.init({
				selector: '.tinymce',
				height: 500,
				theme: 'modern',
				plugins: [
					'advlist lists table directionality',
					'print preview visualblocks visualchars code charmap',
					'emoticons textcolor textpattern textcolor colorpicker ',
					'autosave contextmenu save paste wordcount searchreplace',
					'link autolink image imagetools media',
					'hr pagebreak insertdatetime'
				],
				contextmenu: "cut copy paste | bold italic underline strikethrough ",
				contextmenu_never_use_native: true,
				toolbar: 'undo redo | formatselect | forecolor backcolor | bold italic underline strikethrough | subscript superscript | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent | link image media | print preview searchreplace'
			});
		</script>
		<script>
			var imageCount = -1;
			var cleanFilename = function (name) {
				imageCount++;
				return imageCount + '.jpg';
			};
			var myDropzone = new Dropzone("div#dropzone", {
				url: "testdz.php",
				maxFilesize: 4,
				maxFiles: 10,
				parallelUploads: 50,
				acceptedFiles: "image/*",
				renameFilename: cleanFilename,
				autoProcessQueue: false,
				uploadMultiple: true

			});
			myDropzone.on('sending', function (file, xhr, formData) {
				formData.append('userName', 'bob');
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