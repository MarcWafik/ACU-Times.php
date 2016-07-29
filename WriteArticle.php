<!DOCTYPE html>

<html>
  <head>
  <title>ACU Times | Write Article</title>
  <meta charset="iso-8859-1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="layout/styles/layout.css" type="text/css" media="all">
  <link rel="stylesheet" href="layout/styles/mediaqueries.css" type="text/css" media="all">
  <script src="layout/scripts/jquery.min.js"></script>
  <script src="layout/scripts/jquery-mobilemenu.min.js"></script>
  <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
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
	<?php include ("Header.php");?>
	<!-- content -->

	<div class="wrapper row3">
	<div id="container"> 
			<!-- ################################################################################################ -->
			<div class="pad"> 
			<!-- ################################################################################################ --> 
			<!-- content body -->
			
			<form method="post" >
					<div style="position:relative;bottom:30px;margin:0 auto;">
					<p style="position:relative;top:32px">Language :</p>
					<input type="radio" value="Arabic" name="lang" style="margin:0 auto; position:relative;left:100px">
					<span style="position:relative;left:102px" >Arabic</span>
					<input type="radio" name="lang" style="margin:0 auto;position:relative;left:150px">
					<span style="position:relative;left:152px">English</span> <br>
					<label style="position:relative;">Write In :</label>
					<select required style="margin-top:20px">
							<optgroup label="News">
						<option>World News</option>
						<option>ACU College News</option>
						</optgroup>
							<optgroup label="Art">
						<option>Cinema</option>
						<option>Drama</option>
						<option>Theater</option>
						</optgroup>
							<optgroup label="Sport">
						<option>Local Footaball</option>
						<option>International Football</option>
						<option>Other</option>
						</optgroup>
							<option>Interviews</option>
							<option>Tech &amp; Science</option>
							<option>Economy</option>
							<option>Multimedia</option>
							<option>Gallery</option>
						</select>
					<br>
					<div style="margin-top:15px;">
							<label for="Title">Title</label>
							<input type="text" style="width:230px">
						</div>
					</select>
					<br>
					<div style="">
							<label for="Title">Brief</label>
							<input type="text" style="width:230px">
						</div>
					<iframe src="upload-pic.html" style="width:1000px;height:220px; border:none;margin-top:10px"></iframe>
					
					<!--<div id="drag_drop"   >
                <p style="text-align:center;font-size:24px;line-height:300px">Drop photos Here</p>
                </div>--> 
					
				</div>
					<textarea id="article"></textarea>
				</form>
			
			<!-- / content body --> 
			<!-- ################################################################################################ -->
			<div class="clear"></div>
		</div>
			<!-- ################################################################################################ --> 
		</div>
</div>
	<?php include ("Footer.html");?>
</body>
</html>