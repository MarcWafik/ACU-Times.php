<?php 
if (isset($_POST['submit-article'])) {

	$Order = array("ID", "Name", "Category", "Language", "Youtube-link", "Brief", "Rate", "ArticleDay", "ArticleMonth", "ArticleYear", "Writer", "Editor");
	$OrderSize = 12;
	$Seperator = "~#*$%#";
	$FileLoc = "Data\Articles\Article-info.txt";

	echo "fuck";

	function save_article_info() {
		global $OrderSize, $Order, $Seperator, $FileLoc, $Article;
		$ID = 0;
		$file = fopen($FileLoc, "a+") or die("Unable to open file!");
		fwrite($file, ArticleToString($Article));
		fclose($file);
	}

	function ArrToArticle($arr) {
		global $OrderSize, $Order;
		for ($i = 0; $i < $OrderSize && isset($arr[$i]); $i++) {
			$Article[$Order[$i]] = $arr[$i];
		}
		return $Article;
	}

	function ArticleToString($Article) {
		global $OrderSize, $Order, $Seperator, $FileLoc;
		$txt = "";
		for ($i = 0; $i < $OrderSize; $i++) {
			if (isset($Article[$Order[$i]])) {
				$txt.= $Article[$Order[$i]].$Seperator;
			} else {
				$txt.= "".$Seperator;
			}
		}
		return "\r\n".$txt;
	}

	function id_count() {
		global $FileLoc, $ID;
		$file = fopen($FileLoc, "a+") or die("Unable to open file!");
		while ((!feof($file))) {
			$arr = explode("~#*$%#", fgets($file));

			$ID = $arr[0];
		}

		fclose($file);
	}
	id_count();
	$AricleTime = getdate();
	$arr = array(
		$ID + 1,
		$_POST["Title"],
		$_POST["Category"],
		$_POST["lang"],
		$_POST["Youtube-link"],
		$_POST["Brief"],
		$_POST["Rate"],
		$AricleTime["mday"],
		$AricleTime["mon"],
		$AricleTime["year"],
		" ",
		" "


	);


	$Article = ArrToArticle($arr);
	save_article_info($Article);

	//=========================================validate=========================================

	function valAllnull() {
		return isset($_POST["Title"]) && isset($_POST["Brief"]) && isset($_POST["Youtube-link"]);
	}
	$ArticleBody = $_POST["article"];

	function Save_Article() {
		$ds = DIRECTORY_SEPARATOR;
		global $ID, $FileLoc, $ArticleBody;
		$destination = 'Data\Articles'.$ds.$ID.
		'.html';
		$file = fopen($destination, "x+") or die("Unable to open file!");
		fwrite($file, $ArticleBody);
		fclose($file);
	}




	function SearchTitle($Find) {
		global $FileLoc, $Seperator;
		$file = fopen($FileLoc, "a+") or die("Unable to open file!");
		$AllArticle = array();
		$i = 0;
		while ((!feof($file))) {
			$Article = ArrToArticle(explode($Seperator, fgets($file)));
			if (strpos($Article["Name"], $Find) !== FALSE) {
				$AllArticle[$i++] = $Article;
			}
		}
		return $AllArticle;
	}


	function SearchCategory($Find) {
		global $FileLoc, $Seperator;
		$file = fopen($FileLoc, "a+") or die("Unable to open file!");
		$AllArticle = array();
		$i = 0;
		while ((!feof($file))) {
			$Article = ArrToArticle(explode($Seperator, fgets($file)));
			if (strpos($Article["Category"], $Find) !== FALSE) {
				$AllArticle[$i++] = $Article;
			}
		}

		return $AllArticle;
	}


	function SearchID($Find) {
		global $FileLoc, $Seperator;
		$file = fopen($FileLoc, "a+") or die("Unable to open file!");
		$AllArticle = array();
		$i = 0;
		while ((!feof($file))) {
			$Article = ArrToArticle(explode($Seperator, fgets($file)));
			if ($Article["ID"] == $Find) {
				$AllArticle[$i++] = $Article;
			}
		}

		return $AllArticle;
	}

	$mark = SearchID(2);
	

	function UpdateRecord($Newrecord, $OldRecord) {
		global $OrderSize, $Order, $Seperator, $FileLoc;
		$contents = file_get_contents($FileLoc);
		$contents = str_replace($OldRecord, $Newrecord, $contents);
		file_put_contents($FileLoc, $contents);
	}

	function DeleteID($ID) {
		$ds = DIRECTORY_SEPARATOR;
		global $OrderSize, $Order, $Seperator, $FileLoc;
		$temp = SearchID($ID);
		$file = fopen($FileLoc, "a+") or die("Unable to open file!");
		$AllArticle = array();
		$i = 0;
		while ((!feof($file))) {
			$Article = ArrToArticle(explode($Seperator, fgets($file)));


		}
		echo $Article["2"];
		UpdateRecord("", $temp);
		//unlink("Data\Articles".$ds.$ID.".html");
	}

	function UpdateTitle($user) {
		global $OrderSize, $Order, $Seperator, $FileLoc;
		$temp = SearchTitle($Article["ID"]);

		$Article2STR = ArticleToString($Article);
		UpdateRecord($Article2STR, $temp);
	}

	DeleteID(2);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>ACU Times | Title</title>
  <?php require_once("Header.php");?>
  <!--<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>-->
  <script src='js/tinymce/tinymce.min.js'></script>
  <link rel="stylesheet" href="css/dropezone.css" type="text/css" media="all">
  <script src="js/dropzone.js"></script>
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
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
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
			<li role="presentation" class="active"><a href="WriteArticle.php">WriteArticle</a></li>
			<li role="presentation"><a href="#">Creat Vote</a></li>
			<li role="presentation"><a href="#">Multimedia</a></li>
		</ul>
		</h3>
	<br>
	<form class="form-horizontal" role="form" method="post" action="WriteArticle.php">
			<div class="form-group">
			<label class="control-label col-sm-2" for="email">Title:</label>
			<div class="col-sm-10">
					<input type="text" class="form-control" name="Title" id="Title">
				</div>
		</div>
			<div class="form-group">
			<label class="control-label col-sm-2" for="Breif">Breif:</label>
			<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="Enter 1 line description of the article" id="Brief" name="Brief">
				</div>
		</div>
			<div class="form-group">
			<label class="control-label col-sm-2" for="Category">Category:</label>
			<div class="col-sm-10">
					<select class="form-control" id="Category" name="Category">
					<optgroup label="News">
						<option value="WorldNews">World News</option>
						<option value=">ACUCollegeNews">ACU College News</option>
						</optgroup>
					<optgroup label="Art">
						<option value="Cinema">Cinema</option>
						<option value="Drama">Drama</option>
						<option value="Theater">Theater</option>
						</optgroup>
					<optgroup label="Sport">
						<option value="Local Footaball">Local Footaball</option>
						<option value="International Football">International Football</option>
						<option value="Other">Other</option>
						</optgroup>
					<option value="Interviews">Interviews</option>
					<option value="TechandScience">Tech &amp; Science</option>
					<option value="Economy">Economy</option>
				</select>
				</div>
		</div>
			<div class="form-group">
			<label class="control-label col-sm-2" for="Youtube-link">Youtube Url:</label>
			<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="paste the youtube vedio link here"  name="Youtube-link" id="Youtube-link">
				</div>
		</div>
			<div class="form-group">
			<label class="control-label col-sm-2" for="Rate">Rate:</label>
			<div class="col-sm-10">
					<input type="range" class="" min="1" max="10" value="5" step="1" name="Rate" id="Rate">
				</div>
		</div>
			<div class="form-group">
			<label class="control-label col-sm-2" for="lang">Language:</label>
			<div class="col-sm-10">
					<label class="radio-inline">
					<input type="radio" value="Arabic" name="lang" id="lang">
					Arabic</label>
					<label class="radio-inline">
					<input type="radio" value="English" name="lang" id="lang">
					English</label>
				</div>
		</div>
			<div class="form-group">
			<div  class="dropzone" id="upload-widget"> </div>
		</div>
			<div class="form-group">
			<textarea id="article" name="article"></textarea>
		</div>
			<div class="form-group">
			<button type="submit" class="btn btn-primary pull-right" name="submit-article">Submit</button>
		</div>
		</form>
</div>
	<?php include ("Footer.php");?>
	<script>
var cleanFilename = function (name) {
   return name.toLowerCase().replace(/^[\w.]+$/i, 'a.jpg');
};
var myDropzone = new Dropzone("div#upload-widget", { url: "http://localhost/Project-v6.04/upload.php", maxFilesize: 8,maxFiles: 1,parallelUploads:1,acceptedFiles: "image/*",renameFilename: cleanFilename, addRemoveLinks: true});
</script>
</body>
</html>