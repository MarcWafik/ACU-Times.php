<?php 
require_once("ControlArticle.php");
require_once("ControlUsers.php");
require_once("ControlSession.php");
require_once("ControlFunctions.php");
Check_Login();
$user =$_SESSION['user'];
//$ID = LastID()+1;
if (isset($_POST['submit-article'])) {
	$ID = LastID()+1;
	$AricleTime = getdate();
	$Article = array(	"ID"=>$ID,
					"Name"=>$_POST["Title"],
					"Category"=>$_POST["Category"],
					"Language"=>$_POST["lang"],
					"Youtubelink"=>$_POST["Youtubelink"],
					"Brief"=>$_POST["Brief"],
					"Rate"=>$_POST["Rate"],
					"ArticleDay"=>$AricleTime["mday"],
					"ArticleMonth"=>$AricleTime["mon"],
					"ArticleYear"=>$AricleTime["year"],
					"WriterID"=>$user["ID"],
					"EditorID"=>" ",
					"Rate"=>$_POST["TheLastIDinTheFile"])
					
					
					;
					
	SaveBodyHtml($ID ,$_POST["article"]);
	save_article_info($Article);
	header("Location: Article.php?ID=".$ID);
	exit();
}
//=========================================validate=========================================
function valAllnull() {
	return isset($_POST["Title"]) && isset($_POST["Brief"]) && isset($_POST["Youtube-link"]);
}
?>
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
		'emoticons template paste textcolor colorpicker textpattern imagetools'
	],
	toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
	toolbar2: 'print preview | forecolor backcolor',
	image_advtab: true,
	templates: [{
		title: 'Test template 1',
		content: 'Test 1'
	}, {
		title: 'Test template 2',
		content: 'Test 2'
	}],
	content_css: [
		'//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
		'//www.tinymce.com/css/codepen.min.css'
	]
});
<!-- change appearance-->
tinymce.init({
	selector: '#article',
	color_picker_callback: function(callback, value) {
		callback('#FF00FF');
	}
});
<!-- spell check-->
tinymce.init({
	selector: '#article',
	browser_spellcheck: true
});
<!-- color picker-->
tinymce.init({
	selector: "#article",
	plugins: "textcolor",
	toolbar4: "forecolor backcolor"

});
tinymce.init({
	selector: '#article',
	automatic_uploads: false,
	paste_data_images: true

});

tinymce.init({
	selector: "#article",
	plugins: "paste",
	menubar: "edit",
	toolbar: "paste",
	paste_data_images: true
});
  </script>
  </head>
  <body>
	<?php include ("Navbar.php");?>
	<div class="container">
	<h3>
			<ul class="nav nav-pills">
			<li role="presentation" class="active"><a>WriteArticle</a></li>
			<li role="presentation"><a href="#">Creat Vote</a></li>
			<li role="presentation"><a href="#">Multimedia</a></li>
		</ul>
		</h3>
	<br>
	<form class="form-horizontal" role="form" method="post" action="WriteArticle.php">
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
                      <?php foreach($CategoryList as $Category){ PrintOptionCategory($Category); }?>  
				</select>
				</div>
		</div>
			<div class="form-group">
			<label class="control-label col-sm-2" for="Youtube-link">Youtube Url:</label>
			<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="paste the youtube vedio link here"  name="Youtubelink" id="Youtubelink" onBlur="valYouTube(this,Validate_Youtubelink)">
					<div id="Validate_Youtubelink" name = "Validate_Youtubelink" class="MyAlret"></div>
				</div>
		</div>
			<div class="form-group">
			<label class="control-label col-sm-2" for="Rate">Rate:</label>
			<div class="col-sm-10">
					<input type="range" min="1" max="10" value="5" step="1" name="Rate" id="Rate">
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
			
        <div  class="dropzone" id="upload-widget">
			</div>
			<script>
			
					
						function ImageExist(url) 
						{
						   var img = new Image();
						   img.src = url;
						   return img.height != 0;
						}
					var cleanFilename = function (name) {
						$.ajax({
						url:'Data\\Articles\\'+name,
						type:'HEAD',
						error: function()
						{
							var MyID = document.getElementById('TheLastIDinTheFile').value;
						document.getElementById("TheLastIDinTheFile").value = name;
							
						},
						success: function()
						{
							
							var rand = Math.floor((Math.random() * 10000000) + 1);
												name = name.slice(0,name.length - 4);
							name = name+rand+".jpg";
							var MyID = document.getElementById('TheLastIDinTheFile').value;
						document.getElementById("TheLastIDinTheFile").value = name;
							
						}
					});
							
								
								
								
						
   						
						};
						
				var myDropzone = new Dropzone("div#upload-widget", { url: "http://localhost/Project-v6.08/upload.php", maxFilesize				: 8,maxFiles: 1,parallelUploads:1,acceptedFiles: "image/*", renameFilename: cleanFilename});

					</script> 
		</div>
			<div class="form-group">
			<textarea id="article" name="article"></textarea>
		</div>
			<div class="form-group">
			<button type="submit" class="btn btn-primary pull-right" name="submit-article"> Creat Article </button>
		</div>
        <input name="TheLastIDinTheFile" id ="TheLastIDinTheFile" >
		</form>
</div>
	<?php include ("Footer.php");?>
</body>
</html>