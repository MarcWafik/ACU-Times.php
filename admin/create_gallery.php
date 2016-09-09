<?php
require_once 'autoload.php';
GalleryController::Creat();
?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>ACU Times | Create Article</title>
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
					<li role="presentation"><a href="create_article.php"> Article </a></li>
					<li role="presentation"><a href="create_poll.php"> Poll </a></li>
					<li role="presentation"><a href="create_multimedia.php"> Multimedia </a></li>
					<li role="presentation" class="active"><a> Gallery </a></li>
				</ul>
			</h3>
			<br><br>
			<form class="form-horizontal" role="form" method="post" action="create_gallery.php<?php if (isset($_GET["id"])) echo "?id=" . $_GET["id"] ?>">

				<!-- #################################################################### Title-EN #################################################################### -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="titleEnglish">Title English :</label>
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
				<!-- #################################################################### Title-AR #################################################################### -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="titleArabic">Title Arabic :</label>
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
			var cleanFilename = function (name) {
				//document.getElementById("IMG").value = name;
				return name.toLowerCase().replace(/^[\w.]+$/i, 'upload.jpg');

			};

			var myDropzone = new Dropzone("div#upload-widget", {
				url: "uploadGallery.php",
				maxFilesize: 4,
				maxFiles: 1,
				parallelUploads: 1,
				acceptedFiles: "image/*",
				renameFilename: cleanFilename

			});
		</script>
	</body>
</html>