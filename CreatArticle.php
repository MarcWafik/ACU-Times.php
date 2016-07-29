<?php require_once 'autoload.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>ACU Times | Title</title>
  <?php require_once("Header.php");?>
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
  </script>
  </head>
  <body>
	<?php include ("Navbar.php");?>
	<div class="container">
	<h3>
			<ul class="nav nav-pills">
			<li role="presentation" class="active"><a>Write Article</a></li>
			<li role="presentation"><a href="CreatPoll.php">Creat Poll</a></li>
			<li role="presentation"><a href="#">Multimedia</a></li>
		</ul>
		</h3>
	<br>
	<form class="form-horizontal" role="form" method="post" action="CreatArticle.php">
			<div class="form-group">
			<label class="control-label col-sm-2" for="Title">Title:</label>
			<div class="col-sm-10">
					<input type="text" class="form-control" name="Title" id="Title" onBlur="valTitle(this,Validate_Title)" required autocomplete="on">
					<div id="Validate_Title" name = "Validate_Title" class="MyAlret"></div>
				</div>
		</div>
			<div class="form-group">
			<label class="control-label col-sm-2" for="Breif">Breif:</label>
			<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="Enter 1 line description of the article" id="Brief" name="Brief"  onBlur="valTitle(this,Validate_Breif)" required autocomplete="on">
					<div id="Validate_Breif" name = "Validate_Breifs" class="MyAlret"></div>
				</div>
		</div>
			<div class="form-group">
			<label class="control-label col-sm-2" for="Category">Category:</label>
			<div class="col-sm-10">
					<select class="form-control" id="Category" name="Category">
					<?php // foreach($CategoryList as $Category){ PrintOptionCategory($Category); }?>
				</select>
				</div>
		</div>
			<div class="form-group">
			<label class="control-label col-sm-2" for="Youtube-link">Youtube Url:</label>
			<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="paste the youtube vedio link here or leave it empty"  name="Youtubelink" id="Youtubelink" onBlur="valYouTube(this,Validate_Youtubelink)">
					<div id="Validate_Youtubelink" name = "Validate_Youtubelink" class="MyAlret"></div>
				</div>
		</div>
			<div class="form-group">
			<label class="control-label col-sm-2" for="Rate">Importance:</label>
			<div class="col-sm-10">
				<select class="form-control" id="Importance" name="Importance">
					<?php PrintHTML::numericOption(0,9) ?>
				</select>
				</div>
		</div>
			<div class="form-group">
			<label class="control-label col-sm-2" for="lang">Language:</label>
			<div class="col-sm-10">
					<label class="radio-inline">
					<input type="radio" value="English" name="lang" id="lang" checked>
					English</label>
					<label class="radio-inline">
					<input type="radio" value="Arabic" name="lang" id="lang">
					Arabic</label>
				</div>
		</div>
			<div class="form-group">
			<div  class="dropzone" id="upload-widget"> </div>
		</div>
			<div class="clearfix"></div>
			<div class="form-group">
			<textarea id="article" name="article"></textarea>
		</div>
			<div class="form-group">
			<button type="submit" class="btn btn-primary pull-right" name="submit-article" id="submit-article" onClick="myDropzone.processQueue()"> Creat Article </button>
		</div>
			<input type="hidden" name="IMG" id ="IMG">
		</form>
</div>
	<?php include ("Footer.php");?>
	<script>
function ImageExist(url) {
	var img = new Image();
	img.src = url;
	return img.height != 0;
}
var cleanFilename = function(name) {
	$.ajax({
		url: 'Data\\Articles\\' + name,
		type: 'HEAD',
		error: function() {
			var MyID = document.getElementById('IMG').value;
			document.getElementById("IMG").value = name;

		},
		success: function() {

			//var rand = Math.floor((Math.random() * 10000000) + 1);
			//name = name.slice(0,name.length - 4);
			//name = name+rand+".jpg";
			var MyID = document.getElementById('IMG').value;
			document.getElementById("IMG").value = name;

		}
	});
};

var myDropzone = new Dropzone("div#upload-widget", {
	url: "upload.php",
	maxFilesize: 4,
	maxFiles: 1,
	parallelUploads: 1,
	acceptedFiles: "image/*",
	renameFilename: cleanFilename,
	autoProcessQueue : false
});
</script>
</body>
</html>