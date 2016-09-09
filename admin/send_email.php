<?php
require_once 'autoload.php';

function valAllNotnull() {
	return
			isset($_POST["Category"]) &&
			isset($_POST["Importance"]) &&
			isset($_POST["Youtubelink"]) &&
			isset($_POST["lang"]) &&
			isset($_POST["title_en"]) &&
			isset($_POST["description_en"]) &&
			isset($_POST["body_en"]) &&
			isset($_POST["title_ar"]) &&
			isset($_POST["description_ar"]) &&
			isset($_POST["body_ar"])
	;
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
			<br><br>
			<form class="form-horizontal" role="form" method="post" action="create_article.php<?php if (isset($_GET["id"])) echo "?id=" . $_GET["id"] ?>">
				<!-- #################################################################### Title-EN #################################################################### -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">To :</label>
					<div class="controls col-sm-10">
						<input type="email" 
							   name="email" 
							   id="email" 
							   value="<?php echo @$_POST["email"]; ?>" 
							   class="form-control" 
							   onBlur="valEmail(this)" 
							   required 
							   autocomplete="on" 
							   maxlength="256">
						<span class="help-block"><ul>
								<?php PrintHTML::validation("email", @$iscorrect["email"], "Enter a Valid E-mail") ?>
							</ul></span>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="title_en">Subject :</label>
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

				<!-- #################################################################### BODY-EN #################################################################### -->
				<div class="clearfix"></div>
				<div class="form-group">
					<textarea class="tinymce" id="body_en" name="body_en" ><?php echo @$Data["body_en"] ?></textarea>
				</div>

				<button type="submit" class="btn btn-primary pull-right">Submit</button>
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

